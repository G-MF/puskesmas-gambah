<?php
require_once '../config/config.php';

$nama_bulan = [
    '01' => 'Januari',
    '02' => 'Februari',
    '03' =>'Maret',
    '04' =>'April',
    '05' =>'Mei',
    '06' =>'Juni',
    '07' =>'Juli',
    '08' =>'Agustus',
    '09' =>'September',
    '10' =>'Oktober',
    '11' =>'November',
    '12' =>'Desember'
];

if (isset($_POST['cetak'])) {
    $id_ibu_hamil = $_POST['id_ibu_hamil'];
    $bulan   = $_POST['bulan'];
    $tahun   = $_POST['tahun'];
    $data = $koneksi->query("SELECT * FROM kehadiran_ibu_hamil k LEFT JOIN ibu_hamil i ON k.id_ibu_hamil = i.id_ibu_hamil WHERE i.id_ibu_hamil = '$id_ibu_hamil' AND MONTH(tgl_kehadiran) = '$bulan' AND YEAR(tgl_kehadiran) = '$tahun'");
    
    $ibu_hamil = $koneksi->query("SELECT * FROM ibu_hamil WHERE id_ibu_hamil = '$id_ibu_hamil'")->fetch_array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Rekam Medis Ibu Hamil</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/logo.png') ?>">

    <style>
        .judul {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .alamat {
            font-size: 15px;
            text-align: center;
        }

        .gambar1 {
            width: 77px;
            height: 77px;
            margin-top: 6px;
        }

        .gambar2 {
            width: 77px;
            height: 77px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
        }
    </style>
</head>

<script>
    window.print();
</script>

<body>

    <img src="<?= base_url('assets/img/logo-puskes.png') ?>" align="left" class="gambar1">
    <img src="<?= base_url('assets/img/blank.jpg') ?>" align="right" class="gambar2">
    <div align="center">
        <span class="judul">PEMERINTAH KABUPATEN HULU SUNGAI SELATAN</span> <br>
        <span class="judul">DINAS KESEHATAN</span> <br>
        <span class="judul">UPTD PUSKESMAS GAMBAH</span> <br>
        <span class="alamat">Jl. Ahmad Yani, Gambah Luar, Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan Kode Pos 71291</span>
        <hr color="black">
        <hr style="margin-top: -7px;" color="black">
    </div>

    <h3 align="center">
        LAPORAN REKAM MEDIS IBU HAMIL
    </h3>

    <table width="50%">
        <tr>
            <th align="left" width="25%">Nama Ibu Hamil</th>
            <td width="2%" align="center">:</td>
            <td><?= $ibu_hamil['nama_ibu_hamil'] ?></td>
        </tr>
        <tr>
            <th align="left" width="12%">Bulan</th>
            <td width="2%" align="center">:</td>
            <td><?= $nama_bulan[$bulan] ?></td>
        </tr>
        <tr>
            <th align="left" width="12%">Tahun</th>
            <td width="2%" align="center">:</td>
            <td><?= $tahun ?></td>
        </tr>
    </table>

    <br>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th style="text-align: center; vertical-align: middle; width: 2%;">No</th>
                <th style="text-align: center; vertical-align: middle;">No. Rekam Medis</th>
                <th style="text-align: center; vertical-align: middle;">Tanggal</th>
                <th style="text-align: center; vertical-align: middle;">HPL</th>
                <th style="text-align: center; vertical-align: middle;">Usia Kehamilan</th>
                <th style="text-align: center; vertical-align: middle;">Berat Badan (Kg)</th>
                <th style="text-align: center; vertical-align: middle;">Tinggi Badan (Cm)</th>
                <th style="text-align: center; vertical-align: middle;">Tensi</th>
                <th style="text-align: center; vertical-align: middle;">Tinggi Fundus (Cm)</th>
                <th style="text-align: center; vertical-align: middle;">Letak Janin</th>
                <th style="text-align: center; vertical-align: middle;">Denyut Jantung (Bpm)</th>
                <th style="text-align: center; vertical-align: middle;">Keluhan</th>
                <th style="text-align: center; vertical-align: middle;">Saran</th>
                <th style="text-align: center; vertical-align: middle;">Pegawai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item) : ?>
                <tr align="center">
                    <td><?= $no++; ?></td>
                    <td><?= $item['no_rekam_medis'] ?></td>
                    <td><?= tgl_indo($item['tgl_kehadiran']) ?></td>
                    <td><?= tgl_indo($item['hpl']) ?></td>
                    <td><?= $item['usia_kehamilan'] ?></td>
                    <td><?= $item['berat_badan'] ?></td>
                    <td><?= $item['tinggi_badan'] ?></td>
                    <td><?= $item['tensi'] ?></td>
                    <td><?= $item['tinggi_fundus'] ?></td>
                    <td><?= $item['letak_janin'] ?></td>
                    <td><?= $item['denyut_jantung'] ?></td>
                    <td align="left"><?= $item['keluhan'] ?></td>
                    <td align="left"><?= $item['saran'] ?></td>
                    <td>
                        <?php
                            $pegawai = $koneksi->query("SELECT nama_pegawai FROM pegawai WHERE id_user = '$item[id_pegawai]'")->fetch_array();
                            echo $pegawai['nama_pegawai'];
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br><br>

    <table width="100%" border="0">
        <tr align="center">
            <td width="70%"></td>
            <td>
                <?php
                $hari = date('D');
                echo hari_ini($hari) . ', ' . tgl_indo(date('Y-m-d'));
                ?>
                <br> Gambah Luar
                <br><br><br><br><br><br>
                Kepala Puskesmas Gambah
            </td>
        </tr>
    </table>

</body>

</html>