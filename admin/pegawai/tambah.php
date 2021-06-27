<?php include_once '../../config/config.php' ?>

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
                            <h1 class="m-0 text-dark">Tambah Data Pegawai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Pegawai</li>
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
                                            <label class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="nik" onkeypress="return Angkasaja(event)" autofocus autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="nama_pegawai" maxlength="100" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10 form-valid">
                                                <select name="jk" class="form-control" required>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10 form-valid">
                                                <textarea class="form-control" name="alamat" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No. Hp</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="no_hp" onkeypress="return Angkasaja(event)" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="email" class="form-control" name="email" maxlength="50" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="username" maxlength="20" autocomplete="off" required>
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
                                        <a href="../pegawai/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    nik: {
                        required: true,
                        maxlength: 20
                    },
                    nama_pegawai: {
                        required: true,
                        maxlength: 100
                    },
                    jk: {
                        required: true
                    },
                    alamat: {
                        required: true,
                        maxlength: 500
                    },
                    no_hp: {
                        required: true,
                        maxlength: 20
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    username: {
                        required: true,
                        maxlength: 20
                    },
                    id_role: {
                        required: true
                    },
                },
                messages: {
                    nik: {
                        required: "NIK tidak boleh kosong!",
                        maxlength: "NIK maksimal 20 karakter"
                    },
                    nama_pegawai: {
                        required: "Nama Pegawai tidak boleh kosong!",
                        maxlength: "Nama Pegawai maksimal 100 karakter"
                    },
                    jk: {
                        required: "Jenis Kelamin tidak boleh kosong!",
                    },
                    alamat: {
                        required: "Alamat tidak boleh kosong!",
                        maxlength: "Alamat maksimal 500 karakter"
                    },
                    no_hp: {
                        required: "No. Hp tidak boleh kosong!",
                        maxlength: "No. Hp maksimal 20 karakter"
                    },
                    email: {
                        required: "Email tidak boleh kosong!",
                        email: "Format email salah"
                    },
                    username: {
                        required: "Username tidak boleh kosong!",
                        maxlength: "Username maksimal 20 karakter"
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

        // FORMAT ANGKA SAJA
        function Angkasaja(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

</body>

</html>