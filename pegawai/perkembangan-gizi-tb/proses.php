<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $tgl_cek       = strip_tags($_POST['tgl_cek']);
    $id_anak       = strip_tags($_POST['id_anak']);
    $tb_anak       = strip_tags($_POST['tb_anak']);
    $kategori_gizi = strip_tags($_POST['kategori_gizi']);
    $id_pegawai    = $_SESSION['id_user'];

    $cek_sama = $koneksi->query("SELECT * FROM perkembangan_gizi_tinggi_badan WHERE tgl_cek = '$tgl_cek' AND id_anak = '$id_anak'")->fetch_array();

    if ($cek_sama) {
        $_SESSION['alert'] = 'Data Perkembangan Gizi BB Anak Sudah Ada!';
        $_SESSION['valid'] = [
            'tgl_cek'       => $tgl_cek,
            'id_anak'       => $id_anak,
            'tb_anak'       => $tb_anak,
            'kategori_gizi' => $kategori_gizi
        ];
        header("location: tambah", true, 301);
    } else {
        $data_anak = $koneksi->query("SELECT * FROM anak WHERE id_anak = '$id_anak'")->fetch_array();
        $tgl1      = new DateTime($data_anak['tgl_lahir']);
        $tgl2      = new DateTime($tgl_cek);
        $diff      = $tgl2->diff($tgl1);
        $tahun     = $diff->y ? $diff->y . ' Tahun ' : '';
        $bulan     = $diff->m ? $diff->m . ' Bulan ' : '';
        $hari      = $diff->d ? $diff->d . ' Hari ' : '';
        $usia_anak = $tahun . $bulan . $hari;

        $submit = $koneksi->query("INSERT INTO perkembangan_gizi_tinggi_badan VALUES
            (NULL, '$id_anak', '$tgl_cek', '$tb_anak', '$usia_anak', '$kategori_gizi', '$id_pegawai')
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Perkembangan Gizi TB Ditambahkan";
            unset($_SESSION['valid']);
            header("location: ../perkembangan-gizi-tb", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_gizi_tb    = strip_tags($_POST['id_gizi_tb']);
        $tgl_cek       = strip_tags($_POST['tgl_cek']);
        $id_anak       = strip_tags($_POST['id_anak']);
        $tb_anak       = strip_tags($_POST['tb_anak']);
        $kategori_gizi = strip_tags($_POST['kategori_gizi']);
        $id_pegawai    = $_SESSION['id_user'];

        $data_anak = $koneksi->query("SELECT * FROM anak WHERE id_anak = '$id_anak'")->fetch_array();
        $tgl1      = new DateTime($data_anak['tgl_lahir']);
        $tgl2      = new DateTime($tgl_cek);
        $diff      = $tgl2->diff($tgl1);
        $tahun     = $diff->y ? $diff->y . ' Tahun ' : '';
        $bulan     = $diff->m ? $diff->m . ' Bulan ' : '';
        $hari      = $diff->d ? $diff->d . ' Hari ' : '';
        $usia_anak = $tahun . $bulan . $hari;

        $submit = $koneksi->query("UPDATE perkembangan_gizi_tinggi_badan SET
            tgl_cek       = '$tgl_cek',
            tb_anak       = '$tb_anak',
            usia_anak     = '$usia_anak',
            kategori_gizi = '$kategori_gizi',
            id_pegawai    = '$id_pegawai'
            WHERE id_gizi_tb = '$id_gizi_tb'
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Perkembangan Gizi TB Diubah";
            header("location: ../perkembangan-gizi-tb", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Diubah';
            header("location: edit?id=$id_gizi_tb", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM perkembangan_gizi_tinggi_badan WHERE id_gizi_tb = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Perkembangan Gizi TB Dihapus";
                header("location: ../perkembangan-gizi-tb", true, 301);
            }
        }
