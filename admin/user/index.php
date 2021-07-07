<?php
include_once '../../config/config.php';
include_once '../../config/auth-cek.php';
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
                            <h1 class="m-0 text-dark">Data User</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">User</li>
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
                                        <a href="tambah" class="btn bg-gradient-success"><i class="fas fa-plus"> Tambah Data</i></a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="bg-success">
                                            <tr>
                                                <th style="text-align: center; vertical-align: middle; width: 5%;">No</th>
                                                <th style="text-align: center; vertical-align: middle;">Nama User</th>
                                                <th style="text-align: center; vertical-align: middle;">Username</th>
                                                <th style="text-align: center; vertical-align: middle;">Role</th>
                                                <th style="text-align: center; vertical-align: middle;">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data = $koneksi->query('SELECT * FROM user u LEFT JOIN role r ON u.id_role = r.id_role ORDER BY id_user ASC');
                                            foreach ($data as $item) :
                                            ?>
                                                <tr align="center">
                                                    <td><?= $no++; ?></td>
                                                    <td align="left"><?= $item['nama_user'] ?></td>
                                                    <td align="left"><?= $item['username'] ?></td>
                                                    <td><?= $item['role'] ?></td>
                                                    <td>
                                                        <a href="edit?id=<?= $item['id_user'] ?>" class="btn bg-gradient-info btn-sm"><i class="fa fa-edit"> Edit</i></a>
                                                        <?php if ($item['role'] != 'admin') : ?>
                                                            <button type="button" class="btn bg-gradient-danger btn-sm delete" data-link="proses?id=<?= $item['id_user'] ?>" data-name="<?= $item['username'] ?>">
                                                                <i class="fa fa-trash"> Hapus</i>
                                                            </button>
                                                            <button type="button" class="btn bg-gradient-dark btn-sm reset" data-link="proses?resetid=<?= $item['id_user'] ?>" data-name="<?= $item['username'] ?>">
                                                                <i class="fa fa-sync-alt"> Reset Password</i>
                                                            </button>
                                                        <?php endif; ?>
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
        <?php include_once '../../templates/modal-reset-pass.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../../templates/admin/script.php'; ?>
    <script>
        $(".reset").click(function() {
            var data = $(this).data("link");
            var name = $(this).data("name");
            $('.tombol-reset').attr("href", data);
            $('#name1').empty();
            $('#name1').append(name);
            $('#modal-reset-pass').modal('show');
        });

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