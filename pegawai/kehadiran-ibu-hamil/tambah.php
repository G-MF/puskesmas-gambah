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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tambah Data Kehadiran Ibu Hamil</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Kehadiran Ibu Hamil</li>
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
                                            <label class="col-sm-2 col-form-label">Tanggal Kehadiran</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="tgl_kehadiran" autocomplete="off" required value="<?= isset($_SESSION['valid']) ? $_SESSION['valid']['tgl_kehadiran'] : date('Y-m-d') ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Ibu Hamil</label>
                                            <div class="col-sm-10 form-valid">
                                                <select name="id_ibu_hamil" class="form-control select2" data-placeholder="Pilih" style="width: 100%;" autofocus>
                                                    <option value=""></option>
                                                    <?php
                                                    $data_ibu = $koneksi->query("SELECT * FROM ibu_hamil ORDER BY nama_ibu_hamil ASC");
                                                    foreach ($data_ibu as $ibu) :
                                                    ?>
                                                        <option value="<?= $ibu['id_ibu_hamil'] ?>" <?= isset($_SESSION['valid']['id_ibu_hamil']) == $ibu['id_ibu_hamil'] ? 'selected' : '' ?>><?= $ibu['nama_ibu_hamil'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">HPL</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="hpl" autocomplete="off" required value="<?= isset($_SESSION['valid']) ? $_SESSION['valid']['hpl'] : date('Y-m-d') ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Usia Kehamilan</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="usia_kehamilan" autocomplete="off" required value="<?= isset($_SESSION['valid']) ? $_SESSION['valid']['usia_kehamilan'] : '' ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Berat Badan (Kg)</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="berat_badan" autocomplete="off" required onkeypress="return Angkasaja(event)" placeholder="Masukkan angka saja" value="<?= isset($_SESSION['valid']) ? $_SESSION['valid']['berat_badan'] : '' ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tinggi Badan (Cm)</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="tinggi_badan" autocomplete="off" required onkeypress="return Angkasaja(event)" placeholder="Masukkan angka saja" value="<?= isset($_SESSION['valid']) ? $_SESSION['valid']['tinggi_badan'] : '' ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tensi</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="tensi" autocomplete="off" required value="<?= isset($_SESSION['valid']) ? $_SESSION['valid']['tensi'] : '' ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keluhan Sekarang</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="keluhan" autocomplete="off" required value="<?= isset($_SESSION['valid']) ? $_SESSION['valid']['keluhan'] : '' ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Saran</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="saran" autocomplete="off" required value="<?= isset($_SESSION['valid']) ? $_SESSION['valid']['saran'] : '' ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="simpan" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../kehadiran-ibu-hamil/" class="btn bg-gradient-dark" onclick="<?php unset($_SESSION['valid']) ?>"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    id_ibu_hamil: {
                        required: true,
                    },
                    hpl: {
                        required: true,
                        maxlength: 10
                    },
                    usia_kehamilan: {
                        required: true,
                        maxlength: 10
                    },
                    berat_badan: {
                        required: true,
                        maxlength: 10
                    },
                    tinggi_badan: {
                        required: true,
                        maxlength: 10
                    },
                    tensi: {
                        required: true,
                        maxlength: 30
                    },
                    keluhan: {
                        required: true,
                        maxlength: 500
                    },
                    saran: {
                        required: true,
                        maxlength: 500
                    },
                },
                messages: {
                    tgl_kehadiran: {
                        required: "Tanggal Kehadiran tidak boleh kosong!"
                    },
                    id_ibu_hamil: {
                        required: "Nama Ibu Hamil tidak boleh kosong!"
                    },
                    hpl: {
                        required: "HPL tidak boleh kosong!",
                    },
                    usia_kehamilan: {
                        required: "Usia Kehamilan tidak boleh kosong!",
                        maxlength: "Usia Kehamilan maksimal 30 karakter"
                    },
                    berat_badan: {
                        required: "Berat Badan tidak boleh kosong!",
                        maxlength: "Berat Badan maksimal 10 karakter"
                    },
                    tinggi_badan: {
                        required: "Tinggi Badan tidak boleh kosong!",
                        maxlength: "Tinggi Badan maksimal 10 karakter"
                    },
                    tensi: {
                        required: "Tensi tidak boleh kosong!",
                        maxlength: "Tensi maksimal 30 karakter"
                    },
                    keluhan: {
                        required: "Keluhan tidak boleh kosong!",
                        maxlength: "Keluhan maksimal 500 karakter"
                    },
                    saran: {
                        required: "Saran tidak boleh kosong!",
                        maxlength: "Saran maksimal 500 karakter"
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