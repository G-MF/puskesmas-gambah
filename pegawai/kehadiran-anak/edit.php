<?php
include_once '../../config/config.php';
include_once '../../config/auth-cek-pegawai.php';
?>

<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM kehadiran_anak k LEFT JOIN anak a ON k.id_anak = a.id_anak WHERE id_kehadiran_anak = '$id'")->fetch_array();
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
                            <h1 class="m-0 text-dark">Edit Data Kehadiran Anak</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Kehadiran Anak</li>
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

                                        <input type="hidden" name="id_kehadiran_anak" readonly value="<?= $data['id_kehadiran_anak'] ?>">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Kehadiran</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="tgl_kehadiran" autocomplete="off" required value="<?= $data['tgl_kehadiran'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Anak</label>
                                            <div class="col-sm-10 form-valid">
                                                <select name="id_anak" class="form-control select2" data-placeholder="Pilih" style="width: 100%;" disabled>
                                                    <option value="<?= $data['id_anak'] ?>"><?= $data['nama_anak'] ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Berat Badan (Kg)</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="bb_anak" autocomplete="off" required onkeypress="return Angkasaja(event)" placeholder="Masukkan angka saja" value="<?= $data['bb_anak'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tinggi Badan (Cm)</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="tb_anak" autocomplete="off" required onkeypress="return Angkasaja(event)" placeholder="Masukkan angka saja" value="<?= $data['tb_anak'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Lingkar Kepala (Cm)</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="lingkar_kepala" autocomplete="off" required onkeypress="return Angkasaja(event)" placeholder="Masukkan angka saja" value="<?= $data['lingkar_kepala'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="edit" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../kehadiran-anak/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    tgl_kehadiran: {
                        required: true,
                    },
                    id_anak: {
                        required: true,
                    },
                    bb_anak: {
                        required: true,
                        maxlength: 10
                    },
                    tb_anak: {
                        required: true,
                        maxlength: 10
                    },
                    lingkar_kepala: {
                        required: true,
                        maxlength: 10
                    },
                },
                messages: {
                    tgl_kehadiran: {
                        required: "Tanggal Kehadiran tidak boleh kosong!"
                    },
                    id_anak: {
                        required: "Nama Anak tidak boleh kosong!"
                    },
                    bb_anak: {
                        required: "Berat Badan tidak boleh kosong!",
                        maxlength: "Berat Badan maksimal 10 karakter"
                    },
                    tb_anak: {
                        required: "Tinggi Badan tidak boleh kosong!",
                        maxlength: "Tinggi Badan maksimal 10 karakter"
                    },
                    lingkar_kepala: {
                        required: "Lingkar Kepala tidak boleh kosong!",
                        maxlength: "Lingkar Kepala maksimal 10 karakter"
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