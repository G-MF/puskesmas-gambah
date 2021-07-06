<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $tgl_kematian      = strip_tags($_POST['tgl_kematian']);
    $id_anak           = strip_tags($_POST['id_anak']);
    $penyebab_kematian = strip_tags($_POST['penyebab_kematian']);
    $tempat_kematian   = strip_tags($_POST['tempat_kematian']);
    $id_pegawai        = $_SESSION['id_user'];

    $cek_sama = $koneksi->query("SELECT * FROM kematian_anak WHERE tgl_kematian = '$tgl_kematian' AND id_anak = '$id_anak'")->fetch_array();

    if ($cek_sama) {
        $_SESSION['alert'] = 'Data Kematian Anak Sudah Ada!';
        $_SESSION['valid'] = [
            'tgl_kematian'      => $tgl_kematian,
            'id_anak'           => $id_anak,
            'penyebab_kematian' => $penyebab_kematian,
            'tempat_kematian'   => $tempat_kematian
        ];
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO kematian_anak VALUES
            (NULL, '$id_anak', '$tgl_kematian', '$penyebab_kematian', '$tempat_kematian', '$id_pegawai')
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Kematian Anak Ditambahkan";
            unset($_SESSION['valid']);
            header("location: ../kematian-anak", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_kematian_anak  = strip_tags($_POST['id_kematian_anak']);
        $tgl_kematian      = strip_tags($_POST['tgl_kematian']);
        $penyebab_kematian = strip_tags($_POST['penyebab_kematian']);
        $tempat_kematian   = strip_tags($_POST['tempat_kematian']);
        $id_pegawai        = $_SESSION['id_user'];

        $submit = $koneksi->query("UPDATE kematian_anak SET
                tgl_kematian      = '$tgl_kematian',
                penyebab_kematian = '$penyebab_kematian',
                tempat_kematian   = '$tempat_kematian',
                id_pegawai        = '$id_pegawai'
                WHERE id_kematian_anak = '$id_kematian_anak'
            ");

        if ($submit) {
            $_SESSION['alert'] = "Data Kematian Anak Diubah";
            unset($_SESSION['valid']);
            header("location: ../kematian-anak", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: edit?id=$id_kematian_anak", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM kematian_anak WHERE id_kematian_anak = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Kematian Anak Dihapus";
                header("location: ../kematian-anak", true, 301);
            }
        }
