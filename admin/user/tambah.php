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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tambah Data User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">User</li>
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <?php
            if (isset($_SESSION['alert'])) {
                echo "<script>toastr.error('$_SESSION[alert]')</script>";
                unset($_SESSION['alert']);
            }
            ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card card-outline card-success">
                                <form class="form-horizontal" action="proses" method="POST" id="form-input">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama User</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="nama_user" maxlength="50" autofocus autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="username" maxlength="20" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10 form-valid">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password" id="password" minlength="5" autocomplete="off" required>
                                                    <div class="input-group-append" id="btn_pass">
                                                        <button type="button" class="btn bg-gradient-dark" onclick="lihatpass();" title="Tampilkan Password"><i class="fas fa-eye-slash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10 form-valid">
                                                <select name="id_role" class="form-control select2" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $data = $koneksi->query('SELECT * FROM role WHERE role != "admin" ORDER BY id_role ASC');
                                                    foreach ($data as $item) :
                                                    ?>
                                                        <option value="<?= $item['id_role'] ?>"><?= $item['role'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="simpan" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../user/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include_once '../../templates/admin/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../../templates/admin/script.php'; ?>

    <script>
        $(document).ready(function() {

            // SELECT2
            $('.select2').select2({
                allowClear: true
            });

            // VALIDASI
            $('#form-input').validate({
                rules: {
                    nama_user: {
                        required: true,
                        maxlength: 50
                    },
                    username: {
                        required: true,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    id_role: {
                        required: true
                    },
                },
                messages: {
                    nama_user: {
                        required: "Nama User tidak boleh kosong!",
                        minlength: "Nama User maksimal 50 karakter"
                    },
                    username: {
                        required: "Username tidak boleh kosong!",
                        minlength: "Username maksimal 20 karakter"
                    },
                    password: {
                        required: "Password tidak boleh kosong!",
                        minlength: "Password minimal 5 karakter!"
                    },
                    id_role: {
                        required: "Role belum dipilih!"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-valid').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        // LIHAT PASSWORD
        function lihatpass() {
            let tipe = document.getElementById('password').type;

            if (tipe == 'password') {
                document.getElementById('password').type = 'text';
                document.getElementById('btn_pass').innerHTML =
                    '<button type="button" class="btn bg-gradient-success" onclick=lihatpass() title="Sembunyikan Password"><i class="fas fa-eye"></i></button>';
            } else {
                document.getElementById('password').type = 'password';
                document.getElementById('btn_pass').innerHTML =
                    '<button type="button" class="btn bg-gradient-dark" onclick=lihatpass(); title="Tampilkan Password"><i class="fas fa-eye-slash"></i></button>';
            }
        }
    </script>

</body>

</html>