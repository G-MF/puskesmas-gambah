<?php
include_once '../../config/config.php';
include_once '../../config/auth-cek-pegawai.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM jenis_imunisasi WHERE id_imunisasi = '$id'")->fetch_array();
?>

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
                            <h1 class="m-0 text-dark">Edit Data Imunisasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Imunisasi</li>
                                <li class="breadcrumb-item active">Edit</li>
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

                                        <input type="hidden" name="id_imunisasi" readonly value="<?= $data['id_imunisasi'] ?>">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Imunisaai</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="kode_imunisasi" autocomplete="off" required value="<?= $data['kode_imunisasi'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Imunisaai</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="jenis_imunisasi" autocomplete="off" required value="<?= $data['jenis_imunisasi'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Usia Wajib</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="usia_wajib" autocomplete="off" required value="<?= $data['usia_wajib'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="edit" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../jenis-imunisasi/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    kode_imunisasi: {
                        required: true,
                        maxlength: 30
                    },
                    jenis_imunisasi: {
                        required: true,
                        maxlength: 30
                    },
                    usia_wajib: {
                        required: true,
                        maxlength: 30
                    },
                },
                messages: {
                    kode_imunisasi: {
                        required: "Kode Imunisasi tidak boleh kosong!",
                        maxlength: "Kode Imunisasi maksimal 30 karakter"
                    },
                    jenis_imunisasi: {
                        required: "Jenis Imunisasi tidak boleh kosong!",
                        maxlength: "Jenis Imunisasi maksimal 30 karakter"
                    },
                    usia_wajib: {
                        required: "Usia Wajib tidak boleh kosong!",
                        maxlength: "Usia Wajib maksimal 30 karakter"
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
    </script>

</body>

</html>