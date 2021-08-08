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
    $id_anak = $_POST['id_anak'];
    $bulan   = $_POST['bulan'];
    $tahun   = $_POST['tahun'];
    $data    = $koneksi->query("SELECT * FROM kehadiran_anak k LEFT JOIN anak a ON k.id_anak = a.id_anak WHERE a.id_anak = '$id_anak' AND MONTH(tgl_kehadiran) = '$bulan' AND YEAR(tgl_kehadiran) = '$tahun'");

    $anak = $koneksi->query("SELECT * FROM anak WHERE id_anak = '$id_anak'")->fetch_array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Rekam Medis Anak</title>
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
        LAPORAN REKAM MEDIS ANAK
    </h3>

    <table width="50%">
        <tr>
            <th align="left" width="20%">Nama Anak</th>
            <td width="2%" align="center">:</td>
            <td><?= $anak['nama_anak'] ?></td>
        </tr>
        <tr>
            <th align="left" width="20%">Nama Ayah</th>
            <td width="2%" align="center">:</td>
            <td><?= $anak['nama_ayah'] ?></td>
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
                <th style="text-align: center; vertical-align: middle; width: 5%;">No</th>
                <th style="text-align: center; vertical-align: middle;">No. Rekam Medis</th>
                <th style="text-align: center; vertical-align: middle;">Tanggal</th>
                <th style="text-align: center; vertical-align: middle;">BB (Kg)</th>
                <th style="text-align: center; vertical-align: middle;">TB (Cm)</th>
                <th style="text-align: center; vertical-align: middle;">Lingkar Kepala (Cm)</th>
                <th style="text-align: center; vertical-align: middle;">Pegawai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item) : ?>
                <tr align="center">
                    <td><?= $no++; ?></td>
                    <td><?= $item['no_rekam_medis'] ?></td>
                    <td><?= tgl_indo($item['tgl_kehadiran']) ?></td>
                    <td><?= $item['bb_anak'] ?></td>
                    <td><?= $item['tb_anak'] ?></td>
                    <td><?= $item['lingkar_kepala'] ?></td>
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