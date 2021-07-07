<?php
include_once '../../config/config.php';
include_once '../../config/auth-cek-pegawai.php';
?>

<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM kematian_ibu_hamil m LEFT JOIN ibu_hamil i ON m.id_ibu_hamil = i.id_ibu_hamil WHERE id_kematian_ibu = '$id'")->fetch_array();
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
                            <h1 class="m-0 text-dark">Edit Data Kematian Ibu Hamil</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Kematian Ibu Hamil</li>
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

                                        <input type="hidden" name="id_kematian_ibu" readonly value="<?= $id ?>">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Kematian</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="tgl_kematian" autocomplete="off" required value="<?= $data['tgl_kematian'] ?>">
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
                                            <label class="col-sm-2 col-form-label">Penyebab Kematian</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="penyebab" autocomplete="off" required value="<?= $data['penyebab'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tempat Kematian</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="tempat_kematian" autocomplete="off" required value="<?= $data['tempat_kematian'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keadaan Janin</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="keadaan_janin" autocomplete="off" required value="<?= $data['keadaan_janin'] ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="edit" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../kematian-ibu-hamil/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    tgl_kematian: {
                        required: true,
                    },
                    id_ibu_hamil: {
                        required: true,
                    },
                    usia_kehamilan: {
                        required: true,
                        maxlength: 30
                    },
                    penyebab: {
                        required: true,
                        maxlength: 500
                    },
                    tempat_kematian: {
                        required: true,
                        maxlength: 100
                    },
                    keadaan_janin: {
                        required: true,
                        maxlength: 50
                    },
                },
                messages: {
                    tgl_kematian: {
                        required: "Tanggal Kematian tidak boleh kosong!"
                    },
                    id_ibu_hamil: {
                        required: "Nama Ibu Melahirkan tidak boleh kosong!"
                    },
                    usia_kehamilan: {
                        required: "Usia Kehamilan tidak boleh kosong!",
                        maxlength: "Usia Kehamilan maksimal 30 karakter"
                    },
                    tempat_kematian: {
                        required: "Tempat Kematian tidak boleh kosong!",
                        maxlength: "Tempat Kematian maksimal 10 karakter"
                    },
                    penyebab: {
                        required: "Penyebab Kematian tidak boleh kosong!",
                        maxlength: "Penyebab Kematian maksimal 10 karakter"
                    },
                    keadaan_janin: {
                        required: "Keadaan Janin tidak boleh kosong!",
                        maxlength: "Keadaan Janin maksimal 50 karakter"
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