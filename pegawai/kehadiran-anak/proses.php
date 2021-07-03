<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $tgl_kehadiran  = strip_tags($_POST['tgl_kehadiran']);
    $id_anak        = strip_tags($_POST['id_anak']);
    $bb_anak        = strip_tags($_POST['bb_anak']);
    $tb_anak        = strip_tags($_POST['tb_anak']);
    $lingkar_kepala = strip_tags($_POST['lingkar_kepala']);
    $id_pegawai     = $_SESSION['id_user'];

    $cek_sama = $koneksi->query("SELECT * FROM kehadiran_anak WHERE tgl_kehadiran = '$tgl_kehadiran' AND id_anak = '$id_anak'")->fetch_array();

    if ($cek_sama) {
        $_SESSION['alert'] = 'Data Kehadiran Anak Sudah Ada!';
        $_SESSION['valid'] = [
            'tgl_kehadiran'  => $tgl_kehadiran,
            'id_anak'        => $id_anak,
            'bb_anak'        => $bb_anak,
            'tb_anak'        => $tb_anak,
            'lingkar_kepala' => $lingkar_kepala
        ];
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO kehadiran_anak VALUES
            (NULL, '$tgl_kehadiran', '$id_anak', '$bb_anak', '$tb_anak', '$lingkar_kepala', '$id_pegawai')
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Kehadiran Anak Ditambahkan";
            unset($_SESSION['valid']);
            header("location: ../kehadiran-anak", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {

        $id_kehadiran_anak = strip_tags($_POST['id_kehadiran_anak']);
        $tgl_kehadiran     = strip_tags($_POST['tgl_kehadiran']);
        $bb_anak           = strip_tags($_POST['bb_anak']);
        $tb_anak           = strip_tags($_POST['tb_anak']);
        $lingkar_kepala    = strip_tags($_POST['lingkar_kepala']);
        $id_pegawai        = $_SESSION['id_user'];

        $submit = $koneksi->query("UPDATE kehadiran_anak SET
            tgl_kehadiran  = '$tgl_kehadiran',
            bb_anak        = '$bb_anak',
            tb_anak        = '$tb_anak',
            lingkar_kepala = '$lingkar_kepala',
            id_pegawai     = '$id_pegawai'
            WHERE id_kehadiran_anak = '$id_kehadiran_anak'
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Kehadiran Anak Diubah";
            header("location: ../kehadiran-anak", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: edit?id=$id_kehadiran_anak", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM kehadiran_anak WHERE id_kehadiran_anak = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Kehadiran Anak Dihapus";
                header("location: ../kehadiran-anak", true, 301);
            }
        }
