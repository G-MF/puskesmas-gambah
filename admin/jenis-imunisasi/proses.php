<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $kode_imunisasi  = strip_tags($_POST['kode_imunisasi']);
    $jenis_imunisasi = strip_tags($_POST['jenis_imunisasi']);
    $usia_wajib      = strip_tags($_POST['usia_wajib']);

    $cek_kode = $koneksi->query("SELECT * FROM jenis_imunisasi WHERE kode_imunisasi = '$kode_imunisasi'")->fetch_array();

    if ($cek_kode) {
        $_SESSION['alert'] = 'Kode Imunisasi Sudah Ada!';
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO jenis_imunisasi VALUES(NULL, '$kode_imunisasi' , '$jenis_imunisasi', '$usia_wajib')");

        if ($submit) {
            $_SESSION['alert'] = "Data Jenis Imunisasi Ditambahkan";
            header("location: ../jenis-imunisasi", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_imunisasi    = strip_tags($_POST['id_imunisasi']);
        $kode_imunisasi  = strip_tags($_POST['kode_imunisasi']);
        $jenis_imunisasi = strip_tags($_POST['jenis_imunisasi']);
        $usia_wajib      = strip_tags($_POST['usia_wajib']);

        $cek_kode = $koneksi->query("SELECT * FROM jenis_imunisasi WHERE id_imunisasi != '$id_imunisasi'");
        $sts = '';

        if ($cek_kode->fetch_array()) {
            foreach ($cek_kode as $cekkode) {
                if ($cekkode['kode_imunisasi'] == $kode_imunisasi) {
                    $sts .= 'error';
                    $_SESSION['alert'] = 'Kode Imunisasi Sudah Ada!';
                    header("location: edit?id=$id_imunisasi", true, 301);
                } else {
                    $sts .= 'next';
                }
            }
        }
        if ($sts == '' || $sts == 'next') {
            $submit = $koneksi->query("UPDATE jenis_imunisasi SET
                   kode_imunisasi  = '$kode_imunisasi', 
                   jenis_imunisasi = '$jenis_imunisasi',
                   usia_wajib      = '$usia_wajib'
                   WHERE id_imunisasi = '$id_imunisasi'
                ");

            if ($submit) {
                $_SESSION['alert'] = "Data Jenis Imunisasi Diubah";
                header("location: ../jenis-imunisasi", true, 301);
            } else {
                $_SESSION['alert'] = 'Data Gagal Diubah';
                header("location: edit?id=$id_imunisasi", true, 301);
            }
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM jenis_imunisasi WHERE id_imunisasi = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Jenis Imunisasi Dihapus";
                header("location: ../jenis-imunisasi", true, 301);
            }
        }
