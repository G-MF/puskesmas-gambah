<?php
include_once '../../config/config.php';
include_once '../../config/auth-cek-pegawai.php';
?>

<?php
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pemberian_vitamin p LEFT JOIN anak a ON p.id_anak = a.id_anak LEFT JOIN jenis_vitamin j ON p.id_vitamin = j.id_vitamin WHERE id_pemberian_vitamin = '$id'")->fetch_array();
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
                            <h1 class="m-0 text-dark">Edit Data Pemberian Vitamin</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Pemberian Vitamin</li>
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

                                        <input type="hidden" name="id_pemberian_vitamin" readonly value="<?= $id ?>">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="tgl_pemberian" autocomplete="off" required value="<?= $data['tgl_pemberian'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Anak</label>
                                            <div class="col-sm-10 form-valid">
                                                <select name="id_anak" class="form-control" autofocus>
                                                    <option value="<?= $data['id_anak'] ?>"><?= $data['nama_anak'] ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Vitamin</label>
                                            <div class="col-sm-10 form-valid">
                                                <select name="id_vitamin" class="form-control select2" data-placeholder="Pilih" style="width: 100%;" autofocus>
                                                    <option value=""></option>
                                                    <?php
                                                    $data_vitamin = $koneksi->query("SELECT * FROM jenis_vitamin ORDER BY id_vitamin ASC");
                                                    foreach ($data_vitamin as $vitamin) :
                                                    ?>
                                                        <option value="<?= $vitamin['id_vitamin'] ?>" <?= $data['id_vitamin'] == $vitamin['id_vitamin'] ? 'selected' : '' ?>><?= $vitamin['jenis_vitamin'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="edit" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../pemberian-vitamin/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    tgl_pemberian: {
                        required: true
                    },
                    id_anak: {
                        required: true
                    },
                    id_vitamin: {
                        required: true
                    },
                },
                messages: {
                    tgl_pemberian: {
                        required: "Tanggal Pemberian tidak boleh kosong!"
                    },
                    id_anak: {
                        required: "Nama Anak tidak boleh kosong!"
                    },
                    id_vitamin: {
                        required: "Jenis Vitamin tidak boleh kosong!"
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