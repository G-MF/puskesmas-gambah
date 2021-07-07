<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $tgl_kematian        = strip_tags($_POST['tgl_kematian']);
    $id_ibu_hamil        = strip_tags($_POST['id_ibu_hamil']);
    $usia_kehamilan      = strip_tags($_POST['usia_kehamilan']);
    $penyebab            = strip_tags($_POST['penyebab']);
    $tempat_kematian              = strip_tags($_POST['tempat_kematian']);
    $keadaan_janin       = strip_tags($_POST['keadaan_janin']);
    $id_pegawai          = $_SESSION['id_user'];

    $cek_sama = $koneksi->query("SELECT * FROM kematian_ibu_hamil WHERE tgl_kematian = '$tgl_kematian' AND id_ibu_hamil = '$id_ibu_hamil'")->fetch_array();

    if ($cek_sama) {
        $_SESSION['alert'] = 'Data Kematian Ibu Hamil Sudah Ada!';
        $_SESSION['valid'] = [
            'tgl_kematian'    => $tgl_kematian,
            'id_ibu_hamil'    => $id_ibu_hamil,
            'usia_kehamilan'  => $usia_kehamilan,
            'tempat_kematian' => $tempat_kematian,
            'penyebab'        => $penyebab,
            'keadaan_janin'   => $keadaan_janin
        ];
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO kematian_ibu_hamil VALUES
            (NULL, '$id_ibu_hamil', '$tgl_kematian', '$usia_kehamilan', '$penyebab', '$tempat_kematian',  '$keadaan_janin', '$id_pegawai')
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Kematian Ibu Hamil Ditambahkan";
            unset($_SESSION['valid']);
            header("location: ../kematian-ibu-hamil", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_kematian_ibu  = strip_tags($_POST['id_kematian_ibu']);
        $tgl_kematian     = strip_tags($_POST['tgl_kematian']);
        $usia_kehamilan   = strip_tags($_POST['usia_kehamilan']);
        $penyebab         = strip_tags($_POST['penyebab']);
        $tempat_kematian  = strip_tags($_POST['tempat_kematian']);
        $keadaan_janin    = strip_tags($_POST['keadaan_janin']);
        $id_pegawai       = $_SESSION['id_user'];

        $submit = $koneksi->query("UPDATE kematian_ibu_hamil SET
            tgl_kematian    = '$tgl_kematian',
            usia_kehamilan  = '$usia_kehamilan',
            penyebab        = '$penyebab',
            tempat_kematian = '$tempat_kematian',
            keadaan_janin   = '$keadaan_janin',
            id_pegawai      = '$id_pegawai'
            WHERE id_kematian_ibu = '$id_kematian_ibu'
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Kematian Ibu Hamil Diubah";
            header("location: ../kematian-ibu-hamil", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Diubah';
            header("location: edit?=$id_kematian_ibu", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM kematian_ibu_hamil WHERE id_kematian_ibu = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Kematian Ibu Hamil Dihapus";
                header("location: ../kematian-ibu-hamil", true, 301);
            }
        }
