<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $no_kia            = strip_tags($_POST['no_kia']);
    $nama_ibu_hamil    = strip_tags($_POST['nama_ibu_hamil']);
    $nama_suami        = strip_tags($_POST['nama_suami']);
    $alamat            = strip_tags($_POST['alamat']);
    $status_kehamilan  = strip_tags($_POST['status_kehamilan']);
    $hpht              = strip_tags($_POST['hpht']);
    $usia_kehamilan    = strip_tags($_POST['usia_kehamilan']);
    $hpl               = strip_tags($_POST['hpl']);

    $cek_kode = $koneksi->query("SELECT * FROM ibu_hamil WHERE no_kia = '$no_kia'")->fetch_array();

    if ($cek_kode) {
        $_SESSION['alert'] = 'Kode Registrasi KIA Sudah Ada!';
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO ibu_hamil VALUES(NULL, '$no_kia', '$nama_ibu_hamil', '$nama_suami', '$alamat', '$status_kehamilan', '$hpht', '$usia_kehamilan', '$hpl')");

        if ($submit) {
            $_SESSION['alert'] = "Data Ibu Hamil Ditambahkan";
            header("location: ../ibu-hamil", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_ibu_hamil      = strip_tags($_POST['id_ibu_hamil']);
        $no_kia            = strip_tags($_POST['no_kia']);
        $nama_ibu_hamil    = strip_tags($_POST['nama_ibu_hamil']);
        $nama_suami        = strip_tags($_POST['nama_suami']);
        $alamat            = strip_tags($_POST['alamat']);
        $status_kehamilan  = strip_tags($_POST['status_kehamilan']);
        $hpht              = strip_tags($_POST['hpht']);
        $usia_kehamilan    = strip_tags($_POST['usia_kehamilan']);
        $hpl               = strip_tags($_POST['hpl']);

        $cek_kode = $koneksi->query("SELECT * FROM ibu_hamil WHERE id_ibu_hamil != '$id_ibu_hamil'");
        $sts = '';

        if ($cek_kode->fetch_array()) {
            foreach ($cek_kode as $cekkode) {
                if ($cekkode['no_kia'] == $no_kia) {
                    $sts .= 'error';
                    $_SESSION['alert'] = 'Kode Registrasi KIA Sudah Ada!';
                    header("location: edit?id=$id_ibu_hamil", true, 301);
                } else {
                    $sts .= 'next';
                }
            }
        }
        if ($sts == '' || $sts == 'next') {
            $submit = $koneksi->query("UPDATE ibu_hamil SET
                    no_kia             = '$no_kia', 
                    nama_ibu_hamil     = '$nama_ibu_hamil', 
                    nama_suami         = '$nama_suami', 
                    alamat             = '$alamat', 
                    status_kehamilan   = '$status_kehamilan', 
                    hpht               = '$hpht', 
                    usia_kehamilan     = '$usia_kehamilan', 
                    hpl                = '$hpl'
                    WHERE id_ibu_hamil = '$id_ibu_hamil'
                ");

            if ($submit) {
                $_SESSION['alert'] = "Data Ibu Hamil Diubah";
                header("location: ../ibu-hamil", true, 301);
            } else {
                $_SESSION['alert'] = 'Data Gagal Disimpan';
                header("location: edit?id=$id_ibu_hamil", true, 301);
            }
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM ibu_hamil WHERE id_ibu_hamil = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Ibu Hamil Dihapus";
                header("location: ../ibu-hamil", true, 301);
            }
        }
