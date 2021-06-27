<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $nik          = strip_tags($_POST['nik']);
    $nama_pegawai = strip_tags($_POST['nama_pegawai']);
    $jk           = strip_tags($_POST['jk']);
    $alamat       = strip_tags($_POST['alamat']);
    $no_hp        = strip_tags($_POST['no_hp']);
    $email        = strip_tags($_POST['email']);

    $username  = strip_tags($_POST['username']);
    $password  = md5(12345);
    $id_role   = 2;

    $cek_nik  = $koneksi->query("SELECT * FROM pegawai WHERE nik = '$nik'")->fetch_array();
    $cek_user = $koneksi->query("SELECT * FROM user WHERE username = '$username'")->fetch_array();

    if ($cek_nik) {
        $_SESSION['alert'] = 'NIK Sudah Ada!';
        header("location: tambah", true, 301);
    } elseif ($cek_user) {
        $_SESSION['alert'] = 'Username Sudah Ada!';
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO user VALUES(NULL, '$nama_pegawai' , '$username', '$password', '$id_role')");

        if ($submit) {
            $ambil_id = $koneksi->query('SELECT * FROM user ORDER BY id_user DESC LIMIT 1')->fetch_array();
            $koneksi->query("INSERT INTO pegawai VALUES(NULL, '$nik' , '$nama_pegawai', '$jk', '$alamat', '$no_hp', '$email', '$ambil_id[id_user]')");

            $_SESSION['alert'] = "Data Pegawai Ditambahkan";
            header("location: ../pegawai", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_pegawai   = strip_tags($_POST['id_pegawai']);
        $nik          = strip_tags($_POST['nik']);
        $nama_pegawai = strip_tags($_POST['nama_pegawai']);
        $jk           = strip_tags($_POST['jk']);
        $alamat       = strip_tags($_POST['alamat']);
        $no_hp        = strip_tags($_POST['no_hp']);
        $email        = strip_tags($_POST['email']);

        $cek_nik  = $koneksi->query("SELECT * FROM pegawai WHERE id_pegawai != '$id_pegawai'");
        $sts = '';

        if ($cek_nik->fetch_array()) {
            foreach ($cek_nik as $ceknik) {
                if ($ceknik['nik'] == $nik) {
                    $sts .= 'error';
                    $_SESSION['alert'] = 'NIK Sudah Ada!';
                    header("location: edit?id=$id_pegawai", true, 301);
                } else {
                    $sts .= 'next';
                }
            }
        }
        if ($sts == '' || $sts == 'next') {
            $submit = $koneksi->query("UPDATE pegawai SET
                    nik          = '$nik',
                    nama_pegawai = '$nama_pegawai',
                    jk           = '$jk',
                    alamat       = '$alamat',
                    no_hp        = '$no_hp',
                    email        = '$email'
                    WHERE id_pegawai = '$id_pegawai'
                ");

            if ($submit) {
                $_SESSION['alert'] = "Data Pegawai Diubah";
                header("location: ../pegawai", true, 301);
            } else {
                $_SESSION['alert'] = 'Data Gagal Diubah';
                header("location: edit?id=$id_pegawai", true, 301);
            }
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $data = $koneksi->query("SELECT * FROM pegawai WHERE id_pegawai = '$_GET[id]'")->fetch_array();
            $$id_user = $data['id_user'];
            $hapus = $koneksi->query("DELETE FROM user WHERE id_user = '$id_user'");

            if ($hapus) {
                $koneksi->query("DELETE FROM pegawai WHERE id_pegawai = '$_GET[id]'");

                $_SESSION['alert'] = "Data Pegawai Dihapus";
                header("location: ../pegawai", true, 301);
            }
        }
