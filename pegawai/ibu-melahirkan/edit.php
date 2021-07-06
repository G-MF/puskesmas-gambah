<?php
include_once '../../config/config.php';
include_once '../../config/auth-cek-pegawai.php';
?>

<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM ibu_hamil_melahirkan m LEFT JOIN ibu_hamil i ON m.id_ibu_hamil = i.id_ibu_hamil WHERE id_kelahiran = '$id'")->fetch_array();
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
                            <h1 class="m-0 text-dark">Edit Data Ibu Melahirkan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Ibu Melahirkan</li>
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

                                        <input type="hidden" name="id_kelahiran" readonly value="<?= $id ?>">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Melahirkan</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="tgl_melahirkan" autocomplete="off" required value="<?= $data['tgl_melahirkan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Ibu Melahirkan</label>
                                            <div class="col-sm-10 form-valid">
                                                <select name="id_ibu_hamil" class="form-control">
                                                    <option value="<?= $data['id_ibu_hamil'] ?>"><?= $data['nama_ibu_hamil'] ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Usia Kehamilan</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="usia_kehamilan" autocomplete="off" required value="<?= $data['usia_kehamilan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tempat Persalinan</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="tempat_persalinan" autocomplete="off" required value="<?= $data['tempat_persalinan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Penolong Persalinan</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="penolong_persalinan" autocomplete="off" required value="<?= $data['penolong_persalinan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keadaan Ibu</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="keadaan_ibu" autocomplete="off" required value="<?= $data['keadaan_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keadaan Anak</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="keadaan_anak" autocomplete="off" required value="<?= $data['keadaan_anak'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="edit" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../ibu-melahirkan/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    tgl_melahirkan: {
                        required: true,
                    },
                    id_ibu_hamil: {
                        required: true,
                    },
                    usia_kehamilan: {
                        required: true,
                        maxlength: 30
                    },
                    tempat_persalinan: {
                        required: true,
                        maxlength: 100
                    },
                    penolong_persalinan: {
                        required: true,
                        maxlength: 50
                    },
                    keadaan_ibu: {
                        required: true,
                        maxlength: 50
                    },
                    keadaan_anak: {
                        required: true,
                        maxlength: 50
                    },
                },
                messages: {
                    tgl_melahirkan: {
                        required: "Tanggal Kehadiran tidak boleh kosong!"
                    },
                    id_ibu_hamil: {
                        required: "Nama Ibu Melahirkan tidak boleh kosong!"
                    },
                    usia_kehamilan: {
                        required: "Usia Kehamilan tidak boleh kosong!",
                        maxlength: "Usia Kehamilan maksimal 30 karakter"
                    },
                    tempat_persalinan: {
                        required: "Tempat Persalinan tidak boleh kosong!",
                        maxlength: "Tempat Persalinan maksimal 10 karakter"
                    },
                    penolong_persalinan: {
                        required: "Penolong Persalinan tidak boleh kosong!",
                        maxlength: "Penolong Persalinan maksimal 10 karakter"
                    },
                    keadaan_ibu: {
                        required: "Keadaan Ibu tidak boleh kosong!",
                        maxlength: "Keadaan Ibu maksimal 10 karakter"
                    },
                    keadaan_anak: {
                        required: "Keadaan Anak tidak boleh kosong!",
                        maxlength: "Keadaan Anak maksimal 10 karakter"
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