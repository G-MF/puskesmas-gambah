<?php
include_once '../../config/config.php';
include_once '../../config/auth-cek-pegawai.php';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include_once '../../templates/admin/head.php' ?>
<!-- /.Head -->

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once '../../templates/admin/nav.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once '../../templates/admin/sidebar.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data Kematian Anak</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Kematian Anak</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <?php
            if (isset($_SESSION['alert'])) {
                echo "<script>toastr.success('$_SESSION[alert]')</script>";
                unset($_SESSION['alert']);
            }
            ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">

                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <a href="tambah" class="btn bg-gradient-success" onclick="<?php unset($_SESSION['valid']) ?>"><i class="fas fa-plus"> Tambah Data</i></a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="bg-success">
                                            <tr>
                                                <th style="text-align: center; vertical-align: middle; width: 5%;">No</th>
                                                <th style="text-align: center; vertical-align: middle;">Tanggal</th>
                                                <th style="text-align: center; vertical-align: middle;">Nama Anak</th>
                                                <th style="text-align: center; vertical-align: middle;">Jenis Kelamin</th>
                                                <th style="text-align: center; vertical-align: middle;">Nama Orang Tua</th>
                                                <th style="text-align: center; vertical-align: middle;">Penyebab</th>
                                                <th style="text-align: center; vertical-align: middle;">Tempat</th>
                                                <th style="text-align: center; vertical-align: middle;">Pegawai</th>
                                                <th style="text-align: center; vertical-align: middle;">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data = $koneksi->query('SELECT * FROM kematian_anak k LEFT JOIN anak a ON k.id_anak = a.id_anak ORDER BY id_kematian_anak DESC');
                                            foreach ($data as $item) :
                                            ?>
                                                <tr align="center">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= tgl_indo($item['tgl_kematian']) ?></td>
                                                    <td align="left"><?= $item['nama_anak'] ?></td>
                                                    <td><?= $item['jk'] ?></td>
                                                    <td align="left">
                                                        Nama Ayah : <?= $item['nama_ayah'] ?> <br>
                                                        Nama Ibu : <?= $item['nama_ibu'] ?>
                                                    </td>
                                                    <td align="left"><?= $item['penyebab_kematian'] ?></td>
                                                    <td><?= $item['tempat_kematian'] ?></td>
                                                    <td><?= $_SESSION['nama_user'] ?></td>
                                                    <td>
                                                        <a href="edit?id=<?= $item['id_kematian_anak'] ?>" class="btn bg-gradient-info btn-sm"><i class="fa fa-edit"> Edit</i></a>
                                                        <button type="button" class="btn bg-gradient-danger btn-sm delete" data-link="proses?id=<?= $item['id_kematian_anak'] ?>" data-name="<?= $item['nama_anak'] ?>">
                                                            <i class="fa fa-trash"> Hapus</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include_once '../../templates/admin/footer.php'; ?>
        <?php include_once '../../templates/modal-hapus.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../../templates/admin/script.php'; ?>

    <script>
        $(".delete").click(function() {
            var data = $(this).data("link");
            var name = $(this).data("name");
            $('.tombol-delete').attr("href", data);
            $('#name').empty();
            $('#name').append(name);
            $('#modal-delete').modal('show');
        });
    </script>

</body>

</html>