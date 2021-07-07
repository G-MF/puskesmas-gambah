<?php
require_once '../config/config.php';

if (isset($_POST['cetak'])) {
    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];
    $data = $koneksi->query("SELECT * FROM kematian_ibu_hamil m LEFT JOIN ibu_hamil i ON m.id_ibu_hamil = i.id_ibu_hamil WHERE tgl_kematian BETWEEN '$tgl1' AND '$tgl2'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Kematian Ibu Hamil</title>
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
        LAPORAN DATA KEMATIAN IBU HAMIL <br>
        <small> Tanggal <?= tgl_indo($tgl1) ?> s/d <?= tgl_indo($tgl2) ?> </small>
    </h3>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th style="text-align: center; vertical-align: middle; width: 5%;">No</th>
                <th style="text-align: center; vertical-align: middle;">Tanggal</th>
                <th style="text-align: center; vertical-align: middle;">Nomor KIA</th>
                <th style="text-align: center; vertical-align: middle;">Nama Ibu</th>
                <th style="text-align: center; vertical-align: middle;">Nama Suami</th>
                <th style="text-align: center; vertical-align: middle;">Usia Kehamilan</th>
                <th style="text-align: center; vertical-align: middle;">Penyebab</th>
                <th style="text-align: center; vertical-align: middle;">Tempat</th>
                <th style="text-align: center; vertical-align: middle;">Keadaan Janin</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = $data->fetch_array()) : ?>
                <tr align="center">
                    <td><?= $no++; ?></td>
                    <td><?= tgl_indo($item['tgl_kematian']) ?></td>
                    <td><?= $item['no_kia'] ?></td>
                    <td align="left"><?= $item['nama_ibu_hamil'] ?></td>
                    <td align="left"><?= $item['nama_suami'] ?></td>
                    <td><?= $item[3] ?></td>
                    <td align="left"><?= $item['penyebab'] ?></td>
                    <td align="left"><?= $item['tempat_kematian'] ?></td>
                    <td align="left"><?= $item['keadaan_janin'] ?></td>
                </tr>
            <?php endwhile; ?>
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