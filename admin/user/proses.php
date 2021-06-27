<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $nama_user = strip_tags($_POST['nama_user']);
    $username  = strip_tags($_POST['username']);
    $password  = strip_tags($_POST['password']);
    $id_role   = strip_tags($_POST['id_role']);
    $password  = md5($_POST['password']);

    $cek_user = $koneksi->query("SELECT * FROM user WHERE username = '$username'")->fetch_array();
    if ($cek_user) {
        $_SESSION['alert'] = 'Username Sudah Ada!';
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO user VALUES(NULL, '$nama_user' , '$username', '$password', '$id_role')");

        if ($submit) {
            $ambil_id = $koneksi->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1")->fetch_array();
            $koneksi->query("INSERT INTO pegawai (nama_pegawai, id_user) VALUES('$nama_user' ,'$ambil_id[id_user]')");
            $_SESSION['alert'] = "Data User Ditambahkan";
            header("location: ../user", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_user   = strip_tags($_POST['id_user']);
        $nama_user = strip_tags($_POST['nama_user']);
        $username  = strip_tags($_POST['username']);
        $id_role   = strip_tags($_POST['id_role']);

        $cek_user = $koneksi->query("SELECT * FROM user WHERE id_user != '$id_user'");
        foreach ($cek_user as $user) {
            if ($username == $user['username']) {
                $_SESSION['alert'] = 'Username Sudah Ada!';
                header("location: tambah", true, 301);
            } else {
                if ($id_role == 1) {
                    if (!empty($_POST['pass_lama']) && !empty($_POST['pass_baru'])) {
                        $pass_lama = md5(strip_tags($_POST['pass_lama']));
                        $pass_baru = md5(strip_tags($_POST['pass_baru']));

                        $cek_pw = $koneksi->query("SELECT * FROM user WHERE password = '$pass_lama'")->fetch_array();
                        if ($cek_pw) {
                            $submit = $koneksi->query("UPDATE user SET 
                                nama_user = '$nama_user', 
                                username  = '$username', 
                                password  = '$pass_baru', 
                                id_role   = '$id_role'
                                WHERE id_user = '$id_user'
                            ");
                        } else {
                            $_SESSION['alert'] = 'Password Lama Yang Anda Masukkan Salah!';
                            header("location: edit?id=$id_user", true, 301);
                            exit;
                        }
                    } else {
                        $submit = $koneksi->query("UPDATE user SET 
                            nama_user = '$nama_user', 
                            username  = '$username',  
                            id_role   = '$id_role'
                            WHERE id_user = '$id_user'
                        ");
                    }
                } else {

                    $submit = $koneksi->query("UPDATE user SET 
                        nama_user = '$nama_user', 
                        username  = '$username',
                        id_role   = '$id_role'
                        WHERE id_user = '$id_user'
                    ");
                }

                if ($submit) {
                    $_SESSION['alert'] = "Data User Diubah";
                    header("location: ../user", true, 301);
                } else {
                    $_SESSION['alert'] = 'Data Gagal Diubah';
                    header("location: edit?id=$id_user", true, 301);
                }
            }
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM user WHERE id_user = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data user Dihapus";
                header("location: ../user", true, 301);
            }
        } else

            // Reset Password
            if (isset($_GET['resetid'])) {
                $id_user   = $_GET['resetid'];
                $pass      = md5('12345');

                $submit = $koneksi->query("UPDATE user SET password = '$pass' WHERE id_user = '$id_user'");
                if ($submit) {
                    $_SESSION['alert'] = "Password Telah Direset Menjadi 12345";
                    header("location: ../user", true, 301);
                }
            }
