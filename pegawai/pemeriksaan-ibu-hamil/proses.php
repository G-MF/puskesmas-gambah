<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $tgl_kehadiran  = strip_tags($_POST['tgl_kehadiran']);
    $id_ibu_hamil   = strip_tags($_POST['id_ibu_hamil']);
    $hpl            = strip_tags($_POST['hpl']);
    $usia_kehamilan = strip_tags($_POST['usia_kehamilan']);
    $berat_badan    = strip_tags($_POST['berat_badan']);
    $tinggi_badan   = strip_tags($_POST['tinggi_badan']);
    $tensi          = strip_tags($_POST['tensi']);
    $tinggi_fundus  = strip_tags($_POST['tinggi_fundus']);
    $letak_janin    = strip_tags($_POST['letak_janin']);
    $denyut_jantung = strip_tags($_POST['denyut_jantung']);
    $keluhan        = strip_tags($_POST['keluhan']);
    $saran          = strip_tags($_POST['saran']);
    $id_pegawai     = $_SESSION['id_user'];

    $cek_sama = $koneksi->query("SELECT * FROM kehadiran_ibu_hamil WHERE tgl_kehadiran = '$tgl_kehadiran' AND id_ibu_hamil = '$id_ibu_hamil'")->fetch_array();

    if ($cek_sama) {
        $_SESSION['alert'] = 'Data Kehadiran Ibu Hamil Sudah Ada!';
        $_SESSION['valid'] = [
            'tgl_kehadiran'  => $tgl_kehadiran,
            'id_ibu_hamil'   => $id_ibu_hamil,
            'hpl'            => $hpl,
            'usia_kehamilan' => $usia_kehamilan,
            'berat_badan'    => $berat_badan,
            'tinggi_badan'   => $tinggi_badan,
            'tensi'          => $tensi,
            'tinggi_fundus'  => $tinggi_fundus,
            'letak_janin'    => $letak_janin,
            'denyut_jantung' => $denyut_jantung,
            'keluhan'        => $keluhan,
            'saran'          => $saran
        ];
        header("location: tambah", true, 301);
    } else {

        $query1 = mysqli_query($koneksi, "SELECT max(no_rekam_medis) AS no FROM kehadiran_ibu_hamil");
        $data   = mysqli_fetch_array($query1);
        $no     = $data['no'];

        $nourut = (int) substr($no, 4, 5);
        $nourut++;

        $no_rekam_medis = "RKM.".sprintf('%05s', $nourut);

        $submit = $koneksi->query("INSERT INTO kehadiran_ibu_hamil VALUES
            (NULL, '$tgl_kehadiran', '$id_ibu_hamil', '$hpl', '$usia_kehamilan', '$berat_badan', '$tinggi_badan', '$tensi', '$tinggi_fundus', '$letak_janin', '$denyut_jantung', '$keluhan', '$saran', '$id_pegawai', '$no_rekam_medis')
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Pemeriksaan Ibu Hamil Ditambahkan";
            unset($_SESSION['valid']);
            header("location: ../pemeriksaan-ibu-hamil", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_kehadiran_ibu  = strip_tags($_POST['id_kehadiran_ibu']);
        $tgl_kehadiran     = strip_tags($_POST['tgl_kehadiran']);
        $hpl               = strip_tags($_POST['hpl']);
        $usia_kehamilan    = strip_tags($_POST['usia_kehamilan']);
        $berat_badan       = strip_tags($_POST['berat_badan']);
        $tinggi_badan      = strip_tags($_POST['tinggi_badan']);
        $tensi             = strip_tags($_POST['tensi']);
        $tinggi_fundus     = strip_tags($_POST['tinggi_fundus']);
        $letak_janin       = strip_tags($_POST['letak_janin']);
        $denyut_jantung    = strip_tags($_POST['denyut_jantung']);
        $keluhan           = strip_tags($_POST['keluhan']);
        $saran             = strip_tags($_POST['saran']);
        $id_pegawai        = $_SESSION['id_user'];

        $submit = $koneksi->query("UPDATE kehadiran_ibu_hamil SET
            tgl_kehadiran  = '$tgl_kehadiran',
            hpl            = '$hpl',
            usia_kehamilan = '$usia_kehamilan',
            berat_badan    = '$berat_badan',
            tinggi_badan   = '$tinggi_badan',
            tensi          = '$tensi',
            tinggi_fundus  = '$tinggi_fundus',
            letak_janin    = '$letak_janin',
            denyut_jantung = '$denyut_jantung',
            keluhan        = '$keluhan',
            saran          = '$saran',
            id_pegawai     = '$id_pegawai'
            WHERE id_kehadiran_ibu = '$id_kehadiran_ibu'
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Pemeriksaan Ibu Hamil Diubah";
            header("location: ../pemeriksaan-ibu-hamil", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Diubah';
            header("location: edit?id=$id_kehadiran_ibu", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM kehadiran_ibu_hamil WHERE id_kehadiran_ibu = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Pemeriksaan Ibu Hamil Dihapus";
                header("location: ../pemeriksaan-ibu-hamil", true, 301);
            }
        }
