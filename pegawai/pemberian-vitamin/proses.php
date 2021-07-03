<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $tgl_pemberian  = strip_tags($_POST['tgl_pemberian']);
    $id_anak        = strip_tags($_POST['id_anak']);
    $id_vitamin     = strip_tags($_POST['id_vitamin']);
    $id_pegawai     = $_SESSION['id_user'];

    $cek_sama = $koneksi->query("SELECT * FROM pemberian_vitamin WHERE tgl_pemberian = '$tgl_pemberian' AND id_anak = '$id_anak' AND id_vitamin = '$id_vitamin'")->fetch_array();

    if ($cek_sama) {
        $_SESSION['alert'] = 'Data Pemberian Vitamin Anak Sudah Ada!';
        $_SESSION['valid'] = [
            'tgl_pemberian' => $tgl_pemberian,
            'id_anak'       => $id_anak,
            'id_vitamin'    => $id_vitamin
        ];
        header("location: tambah", true, 301);
    } else {
        $data_anak = $koneksi->query("SELECT * FROM anak WHERE id_anak = '$id_anak'")->fetch_array();
        $tgl1      = new DateTime($data_anak['tgl_lahir']);
        $tgl2      = new DateTime($tgl_pemberian);
        $diff      = $tgl2->diff($tgl1);
        $tahun     = $diff->y ? $diff->y . ' Tahun ' : '';
        $bulan     = $diff->m ? $diff->m . ' Bulan ' : '';
        $hari      = $diff->d ? $diff->d . ' Hari ' : '';
        $usia_anak = $tahun . $bulan . $hari;

        $submit = $koneksi->query("INSERT INTO pemberian_vitamin VALUES
            (NULL, '$id_anak', '$usia_anak', '$tgl_pemberian', '$id_vitamin', '$id_pegawai')
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Pemberian Vitamin Ditambahkan";
            unset($_SESSION['valid']);
            header("location: ../pemberian-vitamin", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_pemberian_vitamin = strip_tags($_POST['id_pemberian_vitamin']);
        $tgl_pemberian          = strip_tags($_POST['tgl_pemberian']);
        $id_anak                = strip_tags($_POST['id_anak']);
        $id_vitamin           = strip_tags($_POST['id_vitamin']);
        $id_pegawai             = $_SESSION['id_user'];

        $cek_sama = $koneksi->query("SELECT * FROM pemberian_vitamin WHERE tgl_pemberian = '$tgl_pemberian' AND id_anak = '$id_anak' AND id_vitamin = '$id_vitamin'")->fetch_array();

        if ($cek_sama) {
            $_SESSION['alert'] = 'Data Pemberian Vitamin Anak Sudah Ada!';
            header("location: edit?id=$id_pemberian_vitamin", true, 301);
        } else {

            $data_anak = $koneksi->query("SELECT * FROM anak WHERE id_anak = '$id_anak'")->fetch_array();
            $tgl1      = new DateTime($data_anak['tgl_lahir']);
            $tgl2      = new DateTime($tgl_pemberian);
            $diff      = $tgl2->diff($tgl1);
            $tahun     = $diff->y ? $diff->y . ' Tahun ' : '';
            $bulan     = $diff->m ? $diff->m . ' Bulan ' : '';
            $hari      = $diff->d ? $diff->d . ' Hari ' : '';
            $usia_anak = $tahun . $bulan . $hari;

            $submit = $koneksi->query("UPDATE pemberian_vitamin SET
            usia_anak     = '$usia_anak',
            tgl_pemberian = '$tgl_pemberian',
            id_vitamin  = '$id_vitamin', 
            id_pegawai    = '$id_pegawai'
            WHERE id_pemberian_vitamin = '$id_pemberian_vitamin'
        ");

            if ($submit) {
                $_SESSION['alert'] = "Data Pemberian Vitamin Diubah";
                unset($_SESSION['valid']);
                header("location: ../pemberian-vitamin", true, 301);
            } else {
                $_SESSION['alert'] = 'Data Gagal Disimpan';
                header("location: edit?id=$id_pemberian_vitamin", true, 301);
            }
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM pemberian_vitamin WHERE id_pemberian_vitamin = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Pemberian Vitamin Dihapus";
                header("location: ../pemberian-vitamin", true, 301);
            }
        }
