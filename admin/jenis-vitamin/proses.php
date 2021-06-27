<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $kode_vitamin  = strip_tags($_POST['kode_vitamin']);
    $jenis_vitamin = strip_tags($_POST['jenis_vitamin']);
    $usia_wajib    = strip_tags($_POST['usia_wajib']);

    $cek_kode = $koneksi->query("SELECT * FROM jenis_vitamin WHERE kode_vitamin = '$kode_vitamin'")->fetch_array();

    if ($cek_kode) {
        $_SESSION['alert'] = 'Kode Vitamin Sudah Ada!';
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO jenis_vitamin VALUES(NULL, '$kode_vitamin' , '$jenis_vitamin', '$usia_wajib')");

        if ($submit) {
            $_SESSION['alert'] = "Data Jenis Vitamin Ditambahkan";
            header("location: ../jenis-vitamin", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_vitamin    = strip_tags($_POST['id_vitamin']);
        $kode_vitamin  = strip_tags($_POST['kode_vitamin']);
        $jenis_vitamin = strip_tags($_POST['jenis_vitamin']);
        $usia_wajib    = strip_tags($_POST['usia_wajib']);

        $cek_kode = $koneksi->query("SELECT * FROM jenis_vitamin WHERE id_vitamin != '$id_vitamin'");
        $sts = '';

        if ($cek_kode->fetch_array()) {
            foreach ($cek_kode as $cekkode) {
                if ($cekkode['kode_vitamin'] == $kode_vitamin) {
                    $sts .= 'error';
                    $_SESSION['alert'] = 'Kode Vitamin Sudah Ada!';
                    header("location: edit?id=$id_vitamin", true, 301);
                } else {
                    $sts .= 'next';
                }
            }
        }
        if ($sts == '' || $sts == 'next') {
            $submit = $koneksi->query("UPDATE jenis_vitamin SET
                   kode_vitamin     = '$kode_vitamin', 
                   jenis_vitamin    = '$jenis_vitamin',
                   usia_wajib       = '$usia_wajib'
                   WHERE id_vitamin = '$id_vitamin'
                ");

            if ($submit) {
                $_SESSION['alert'] = "Data Jenis Vitamin Diubah";
                header("location: ../jenis-vitamin", true, 301);
            } else {
                $_SESSION['alert'] = 'Data Gagal Diubah';
                header("location: edit?id=$id_vitamin", true, 301);
            }
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM jenis_vitamin WHERE id_vitamin = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Jenis Vitamin Dihapus";
                header("location: ../jenis-vitamin", true, 301);
            }
        }
