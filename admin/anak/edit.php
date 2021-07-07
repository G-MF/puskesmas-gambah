<?php
include_once '../../config/config.php';
include_once '../../config/auth-cek.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM anak WHERE id_anak = '$id'")->fetch_array();
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
                            <h1 class="m-0 text-dark">Tambah Data Anak</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Anak</li>
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

                                        <input type="hidden" name="id_anak" readonly value="<?= $data['id_anak'] ?>">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Anak</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="nama_anak" autofocus autocomplete="off" required value="<?= $data['nama_anak'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10 form-valid">
                                                <select name="jk" class="form-control" required>
                                                    <option value="Laki-laki" <?= $data['jk'] == "Laki-laki" ? 'selected' : '' ?>">Laki-laki</option>
                                                    <option value="Perempuan" <?= $data['jk'] == "Perempuan" ? 'selected' : '' ?>">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" required value="<?= $data['tempat_lahir'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="date" class="form-control" name="tgl_lahir" autocomplete="off" required value="<?= $data['tgl_lahir'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Berat Badan</label>
                                            <div class="col-sm-1 form-valid">
                                                <input type="text" class="form-control" name="berat_badan" onkeypress="return Angkasaja(event)" autocomplete="off" required value="<?= $data['berat_badan'] ?>">
                                            </div>
                                            <span>Kg</span>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tinggi Badan</label>
                                            <div class="col-sm-1 form-valid">
                                                <input type="text" class="form-control" name="tinggi_badan" onkeypress="return Angkasaja(event)" autocomplete="off" required value="<?= $data['tinggi_badan'] ?>">
                                            </div>
                                            <span>Cm</span>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Ayah</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="nama_ayah" autocomplete="off" required value="<?= $data['nama_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Ibu</label>
                                            <div class="col-sm-10 form-valid">
                                                <input type="text" class="form-control" name="nama_ibu" autocomplete="off" required value="<?= $data['nama_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10 form-valid">
                                                <textarea class="form-control" name="alamat" rows="3" required><?= $data['alamat'] ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" name="edit" class="btn bg-gradient-success"><i class="fa fa-save"> Simpan</i></button>
                                        <a href="../anak/" class="btn bg-gradient-dark"><i class="fa fa-arrow-alt-circle-left"> Batal</i></a>
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
                    nama_anak: {
                        required: true,
                        maxlength: 100
                    },
                    jk: {
                        required: true
                    },
                    tempat_lahir: {
                        required: true,
                        maxlength: 100
                    },
                    tgl_lahir: {
                        required: true,
                    },
                    berat_badan: {
                        required: true,
                        maxlength: 10
                    },
                    tinggi_badan: {
                        required: true,
                        maxlength: 10
                    },
                    nama_ayah: {
                        required: true,
                        maxlength: 100
                    },
                    nama_ibu: {
                        required: true,
                        maxlength: 100
                    },
                    alamat: {
                        required: true,
                        maxlength: 500
                    },
                },
                messages: {
                    nama_anak: {
                        required: "Nama Anak tidak boleh kosong!",
                        maxlength: "Nama Anak maksimal 100 karakter"
                    },
                    jk: {
                        required: "Jenis Kelamin tidak boleh kosong!",
                    },
                    tempat_lahir: {
                        required: "Tempat Lahir tidak boleh kosong!",
                        maxlength: "Tempat Lahir maksimal 100 karakter"
                    },
                    tgl_lahir: {
                        required: "Tanggal Lahir tidak boleh kosong!",
                    },
                    berat_badan: {
                        required: "Berat Badan tidak boleh kosong!",
                        maxlength: "Berat Badan maksimal 10 karakter"
                    },
                    tinggi_badan: {
                        required: "Tinggi Badan tidak boleh kosong!",
                        maxlength: "Tinggi Badan maksimal 10 karakter"
                    },
                    nama_ayah: {
                        required: "Nama Ayah tidak boleh kosong!",
                        maxlength: "Nama Ayah maksimal 10 karakter"
                    },
                    nama_ibu: {
                        required: "Nama Ibu tidak boleh kosong!",
                        maxlength: "Nama Ibu maksimal 10 karakter"
                    },
                    alamat: {
                        required: "Alamat tidak boleh kosong!",
                        maxlength: "Alamat maksimal 500 karakter"
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