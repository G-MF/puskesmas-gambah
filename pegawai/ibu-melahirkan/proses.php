<?php
include_once '../../config/config.php';

// Simpan
if (isset($_POST['simpan'])) {
    $tgl_melahirkan      = strip_tags($_POST['tgl_melahirkan']);
    $id_ibu_hamil        = strip_tags($_POST['id_ibu_hamil']);
    $usia_kehamilan      = strip_tags($_POST['usia_kehamilan']);
    $tempat_persalinan   = strip_tags($_POST['tempat_persalinan']);
    $penolong_persalinan = strip_tags($_POST['penolong_persalinan']);
    $keadaan_ibu         = strip_tags($_POST['keadaan_ibu']);
    $keadaan_anak        = strip_tags($_POST['keadaan_anak']);
    $id_pegawai          = $_SESSION['id_user'];

    $cek_sama = $koneksi->query("SELECT * FROM ibu_hamil_melahirkan WHERE tgl_melahirkan = '$tgl_melahirkan' AND id_ibu_hamil = '$id_ibu_hamil'")->fetch_array();

    if ($cek_sama) {
        $_SESSION['alert'] = 'Data Ibu Melahirkan Sudah Ada!';
        $_SESSION['valid'] = [
            'tgl_melahirkan'      => $tgl_melahirkan,
            'id_ibu_hamil'        => $id_ibu_hamil,
            'usia_kehamilan'      => $usia_kehamilan,
            'tempat_persalinan'   => $tempat_persalinan,
            'penolong_persalinan' => $penolong_persalinan,
            'keadaan_ibu'         => $keadaan_ibu,
            'keadaan_anak'        => $keadaan_anak
        ];
        header("location: tambah", true, 301);
    } else {

        $submit = $koneksi->query("INSERT INTO ibu_hamil_melahirkan VALUES
            (NULL, '$id_ibu_hamil', '$tgl_melahirkan', '$usia_kehamilan', '$tempat_persalinan', '$penolong_persalinan', '$keadaan_ibu', '$keadaan_anak', '$id_pegawai')
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Ibu Melahirkan Ditambahkan";
            unset($_SESSION['valid']);
            header("location: ../ibu-melahirkan", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: tambah", true, 301);
        }
    }
} else

    // Edit
    if (isset($_POST['edit'])) {
        $id_kelahiran        = strip_tags($_POST['id_kelahiran']);
        $tgl_melahirkan      = strip_tags($_POST['tgl_melahirkan']);
        $usia_kehamilan      = strip_tags($_POST['usia_kehamilan']);
        $tempat_persalinan   = strip_tags($_POST['tempat_persalinan']);
        $penolong_persalinan = strip_tags($_POST['penolong_persalinan']);
        $keadaan_ibu         = strip_tags($_POST['keadaan_ibu']);
        $keadaan_anak        = strip_tags($_POST['keadaan_anak']);
        $id_pegawai          = $_SESSION['id_user'];

        $submit = $koneksi->query("UPDATE ibu_hamil_melahirkan SET
             tgl_melahirkan      = '$tgl_melahirkan',
             usia_kehamilan      = '$usia_kehamilan',
             tempat_persalinan   = '$tempat_persalinan',
             penolong_persalinan = '$penolong_persalinan',
             keadaan_ibu         = '$keadaan_ibu',
             keadaan_anak        = '$keadaan_anak',
             id_pegawai          = '$id_pegawai'
             WHERE id_kelahiran  = '$id_kelahiran'
        ");

        if ($submit) {
            $_SESSION['alert'] = "Data Ibu Melahirkan Diubah";
            header("location: ../ibu-melahirkan", true, 301);
        } else {
            $_SESSION['alert'] = 'Data Gagal Disimpan';
            header("location: edit?id=$id_kelahiran", true, 301);
        }
    } else

        // Hapus
        if (isset($_GET['id'])) {
            $hapus = $koneksi->query("DELETE FROM ibu_hamil_melahirkan WHERE id_kelahiran = '$_GET[id]'");

            if ($hapus) {
                $_SESSION['alert'] = "Data Ibu Melahirkan Dihapus";
                header("location: ../ibu-melahirkan", true, 301);
            }
        }
