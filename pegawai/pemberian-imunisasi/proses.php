<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $tgl_pemberian  = strip_tags($_POST['tgl_pemberian']);
    $id_anak        = strip_tags($_POST['id_anak']);
    $id_imunisasi   = strip_tags($_POST['id_imunisasi']);
    $id_pegawai     = $_SESSION['id_user'];

    $cek_sama = $koneksi->query("SELECT * FROM pemberian_imunisasi WHERE tgl_pemberian = '$tgl_pemberian' AND id_anak = '$id_anak' AND id_imunisasi = '$id_imunisasi'")->fetch_array();

    if ($cek_sama) {
        $_SESSION['alert'] = 'Data Pemberian Imunisasi Anak Sudah Ada!';
        $_SESSION['valid'] = [
            'tgl_pemberian' => $tgl_pemberian,
            'id_anak'       => $id_anak,
            'id_imunisasi'  => $id_imunisasi
        ];
        header("location: tambah", true, 301);
    } else {
        $data_anak = $koneksi->query("SELECT * FROM anak WHERE id_anak = '$id_anak'")->fetch_array();
        $tgl1      = new DateTime($data_anak['tgl_lahir']);
        $tgl2      = new DateTime($tgl_pemberian);
        $diff      = $tgl2->diff($tgl1);
        $tahun     = $diff->y ? $diff->y . ' Tahun ' : '';
        $bulan     = $diff->m ? $diff->m . ' Bulan ' : '';
        $hari      = $diff->d ? $diff->d . ' Hari ' : '';
        $usia_anak = $tahun . $bulan . $hari;

        $submit = $koneksi->query("INSERT INTO pemberian_imunisasi VALUES
            (NULL, '$id_anak', '$usia_anak', '$tgl_pemberian', '$id_imunisasi', '$id_pegawai')
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Pemberian Imunisasi Ditambahkan";
            unset($_SESSION['valid']);
            header("location: ../pemberian-imunisasi", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_pemberian_imunisasi = strip_tags($_POST['id_pemberian_imunisasi']);
        $tgl_pemberian          = strip_tags($_POST['tgl_pemberian']);
        $id_anak                = strip_tags($_POST['id_anak']);
        $id_imunisasi           = strip_tags($_POST['id_imunisasi']);
        $id_pegawai             = $_SESSION['id_user'];

        $cek_sama = $koneksi->query("SELECT * FROM pemberian_imunisasi WHERE tgl_pemberian = '$tgl_pemberian' AND id_anak = '$id_anak' AND id_imunisasi = '$id_imunisasi'")->fetch_array();

        if ($cek_sama) {
            $_SESSION['alert'] = 'Data Pemberian Imunisasi Anak Sudah Ada!';
            header("location: edit?id=$id_pemberian_imunisasi", true, 301);
        } else {

            $data_anak = $koneksi->query("SELECT * FROM anak WHERE id_anak = '$id_anak'")->fetch_array();
            $tgl1      = new DateTime($data_anak['tgl_lahir']);
            $tgl2      = new DateTime($tgl_pemberian);
            $diff      = $tgl2->diff($tgl1);
            $tahun     = $diff->y ? $diff->y . ' Tahun ' : '';
            $bulan     = $diff->m ? $diff->m . ' Bulan ' : '';
            $hari      = $diff->d ? $diff->d . ' Hari ' : '';
            $usia_anak = $tahun . $bulan . $hari;

            $submit = $koneksi->query("UPDATE pemberian_imunisasi SET
            usia_anak     = '$usia_anak',
            tgl_pemberian = '$tgl_pemberian',
            id_imunisasi  = '$id_imunisasi', 
            id_pegawai    = '$id_pegawai'
            WHERE id_pemberian_imunisasi = '$id_pemberian_imunisasi'
        ");

            if ($submit) {
                $_SESSION['alert'] = "Data Pemberian Imunisasi Diubah";
                unset($_SESSION['valid']);
                header("location: ../pemberian-imunisasi", true, 301);
            } else {
                $_SESSION['alert'] = 'Data Gagal Disimpan';
                header("location: edit?id=$id_pemberian_imunisasi", true, 301);
            }
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM pemberian_imunisasi WHERE id_pemberian_imunisasi = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Pemberian Imunisasi Dihapus";
                header("location: ../pemberian-imunisasi", true, 301);
            }
        }
