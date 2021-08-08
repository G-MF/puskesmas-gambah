<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $nama_anak    = strip_tags($_POST['nama_anak']);
    $jk           = strip_tags($_POST['jk']);
    $tempat_lahir = strip_tags($_POST['tempat_lahir']);
    $tgl_lahir    = strip_tags($_POST['tgl_lahir']);
    $berat_badan  = strip_tags($_POST['berat_badan']);
    $tinggi_badan = strip_tags($_POST['tinggi_badan']);
    $nama_ayah    = strip_tags($_POST['nama_ayah']);
    $nama_ibu     = strip_tags($_POST['nama_ibu']);
    $alamat       = strip_tags($_POST['alamat']);

    $submit = $koneksi->query("INSERT INTO anak VALUES(NULL, '$nama_anak', '$jk', '$tempat_lahir', '$tgl_lahir', '$berat_badan', '$tinggi_badan', '$nama_ayah', '$nama_ibu', '$alamat')");

    if ($submit) {
        $_SESSION['alert'] = "Data Anak Ditambahkan";
        header("location: ../anak", true, 301);
    } else {
        $_SESSION['alert'] = 'Data Gagal Disimpan';
        header("location: tambah", true, 301);
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_anak      = strip_tags($_POST['id_anak']);
        $nama_anak    = strip_tags($_POST['nama_anak']);
        $jk           = strip_tags($_POST['jk']);
        $tempat_lahir = strip_tags($_POST['tempat_lahir']);
        $tgl_lahir    = strip_tags($_POST['tgl_lahir']);
        $berat_badan  = strip_tags($_POST['berat_badan']);
        $tinggi_badan = strip_tags($_POST['tinggi_badan']);
        $nama_ayah    = strip_tags($_POST['nama_ayah']);
        $nama_ibu     = strip_tags($_POST['nama_ibu']);
        $alamat       = strip_tags($_POST['alamat']);

        $submit = $koneksi->query("UPDATE anak SET
            nama_anak     = '$nama_anak', 
            jk            = '$jk', 
            tempat_lahir  = '$tempat_lahir', 
            tgl_lahir     = '$tgl_lahir', 
            berat_badan   = '$berat_badan', 
            tinggi_badan  = '$tinggi_badan', 
            nama_ayah     = '$nama_ayah', 
            nama_ibu      = '$nama_ibu', 
            alamat        = '$alamat'
            WHERE id_anak = '$id_anak'
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Anak Diubah";
            header("location: ../anak", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Diubah';
            header("location: edit?id=$id_anak", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM anak WHERE id_anak = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Anak Dihapus";
                header("location: ../anak", true, 301);
            }
        }
