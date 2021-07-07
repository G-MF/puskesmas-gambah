<?php
require_once '../config/config.php';

if (isset($_POST['cetak'])) {
    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];
    $data = $koneksi->query("SELECT * FROM pemberian_imunisasi p LEFT JOIN anak a ON p.id_anak = a.id_anak LEFT JOIN jenis_imunisasi j ON p.id_imunisasi = j.id_imunisasi WHERE tgl_pemberian BETWEEN '$tgl1' AND '$tgl2'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Pemberian Imunisasi</title>
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
        LAPORAN DATA PEMBERIAN IMUNISASI <br>
        <small> Tanggal <?= tgl_indo($tgl1) ?> s/d <?= tgl_indo($tgl2) ?> </small>
    </h3>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th style="text-align: center; vertical-align: middle; width: 5%;">No</th>
                <th style="text-align: center; vertical-align: middle;">Tanggal</th>
                <th style="text-align: center; vertical-align: middle;">Nama Anak</th>
                <th style="text-align: center; vertical-align: middle;">Usia Anak</th>
                <th style="text-align: center; vertical-align: middle;">Jenis Imunisasi</th>
                <th style="text-align: center; vertical-align: middle;">Usia Wajib</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item) : ?>
                <tr align="center">
                    <td><?= $no++; ?></td>
                    <td><?= tgl_indo($item['tgl_pemberian']) ?></td>
                    <td align="left"><?= $item['nama_anak'] ?></td>
                    <td align="left"><?= $item['usia_anak'] ?></td>
                    <td><?= $item['jenis_imunisasi'] ?></td>
                    <td><?= $item['usia_wajib'] ?></td>
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