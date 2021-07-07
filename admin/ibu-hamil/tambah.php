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
                            <h1 class="m-0 text-dark">Tambah Data Ibu Hamil</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Ibu Hamil</li>
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
                                            <label class="col-sm-2 col-form-label">No. Registrasi KIA</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="no_kia" onkeypress="return Angkasaja(event)" autofocus autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Ibu Hamil</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="nama_ibu_hamil" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Suami</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="nama_suami" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10 form-valid">
                                                <textarea class="form-control" name="alamat" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status Kehamilan</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="status_kehamilan" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">HPHT</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="hpht" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Usia Kehamilan</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="usia_kehamilan" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">HPL</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="hpl" autocomplete="off" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="simpan" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../ibu-hamil/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    no_kia: {
                        required: true,
                        maxlength: 20
                    },
                    nama_ibu_hamil: {
                        required: true,
                        maxlength: 50
                    },
                    nama_suami: {
                        required: true,
                        maxlength: 50
                    },
                    alamat: {
                        required: true,
                        maxlength: 500
                    },
                    status_kehamilan: {
                        required: true,
                        maxlength: 30
                    },
                    hpht: {
                        required: true
                    },
                    usia_kehamilan: {
                        required: true,
                        maxlength: 30
                    },
                    hpl: {
                        required: true
                    },
                },
                messages: {
                    no_kia: {
                        required: "No. Registrasi KIA tidak boleh kosong!",
                        maxlength: "No. Registrasi KIA maksimal 20 karakter"
                    },
                    nama_ibu_hamil: {
                        required: "Nama Ibu Hamil tidak boleh kosong!",
                        maxlength: "Nama Ibu Hamil maksimal 50 karakter"
                    },
                    nama_suami: {
                        required: "Nama Suami tidak boleh kosong!",
                        maxlength: "Nama Suami maksimal 50 karakter"
                    },
                    alamat: {
                        required: "Alamat tidak boleh kosong!",
                        maxlength: "Alamat maksimal 500 karakter"
                    },
                    status_kehamilan: {
                        required: "Status Kehamilan tidak boleh kosong!",
                        maxlength: "Status Kehamilan maksimal 30 karakter"
                    },
                    hpht: {
                        required: "HPHT tidak boleh kosong!",
                    },
                    usia_kehamilan: {
                        required: "Usia Kehamilan tidak boleh kosong!",
                        maxlength: "Usia Kehamilan maksimal 30 karakter"
                    },
                    hpl: {
                        required: "HPL tidak boleh kosong!",
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