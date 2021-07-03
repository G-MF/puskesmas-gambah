<?php
include_once '../config/config.php';
include_once '../config/auth-cek-pegawai.php';

$count_kehadiran_anak       = $koneksi->query("SELECT COUNT(*) as jml FROM kehadiran_anak")->fetch_array();
$count_pemberian_imunisasi  = $koneksi->query("SELECT COUNT(*) as jml FROM pemberian_imunisasi")->fetch_array();
$count_pemberian_vitamin    = $koneksi->query("SELECT COUNT(*) as jml FROM pemberian_vitamin")->fetch_array();
$count_pg_berat_badan       = $koneksi->query("SELECT COUNT(*) as jml FROM perkembangan_gizi_berat_badan")->fetch_array();
$count_pg_tinggi_badan      = $koneksi->query("SELECT COUNT(*) as jml FROM perkembangan_gizi_tinggi_badan")->fetch_array();
$count_kematian_anak        = $koneksi->query("SELECT COUNT(*) as jml FROM kematian_anak")->fetch_array();
$count_kehadiran_ibu_hamil  = $koneksi->query("SELECT COUNT(*) as jml FROM kehadiran_ibu_hamil")->fetch_array();
$count_ibu_hamil_melahirkan = $koneksi->query("SELECT COUNT(*) as jml FROM ibu_hamil_melahirkan")->fetch_array();
$count_kematian_ibu_hamil   = $koneksi->query("SELECT COUNT(*) as jml FROM kematian_ibu_hamil")->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include_once '../templates/admin/head.php' ?>
<!-- /.Head -->

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include_once '../templates/admin/nav.php' ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once '../templates/admin/sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="callout callout-success">
            <h5>Selamat Datang</h5>
            <p><?= $_SESSION['nama_user'] ?></p>
          </div>
          <!-- Info boxes -->
          <div class="row">

            <div class="col-md">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-portrait"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Kehadiran Anak</span>
                  <span class="info-box-number"><?= $count_kehadiran_anak['jml'] ?></span>
                </div>
              </div>
            </div>

            <div class="col-md">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-syringe"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Pemberian Imunisasi</span>
                  <span class="info-box-number"><?= $count_pemberian_imunisasi['jml'] ?></span>
                </div>
              </div>
            </div>

            <div class="col-md">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-pills"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Pemberian Vitamin</span>
                  <span class="info-box-number"><?= $count_pemberian_vitamin['jml'] ?></span>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-md">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-portrait"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Perkembangan Gizi Berat Badan</span>
                  <span class="info-box-number"><?= $count_pg_berat_badan['jml'] ?></span>
                </div>
              </div>
            </div>

            <div class="col-md">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-portrait"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Perkembangan Gizi Tinggi Badan</span>
                  <span class="info-box-number"><?= $count_pg_tinggi_badan['jml'] ?></span>
                </div>
              </div>
            </div>

            <div class="col-md">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-portrait"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Kematian Anak</span>
                  <span class="info-box-number"><?= $count_kematian_anak['jml'] ?></span>
                </div>
              </div>
            </div>

          </div>
          <!-- /.row -->

          <div class="row">

            <div class="col-md">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-fuchsia elevation-1"><i class="fas fa-portrait"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Kehadiran Ibu Hamil</span>
                  <span class="info-box-number"><?= $count_kehadiran_anak['jml'] ?></span>
                </div>
              </div>
            </div>

            <div class="col-md">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-portrait"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Ibu Hamil Melahirkan</span>
                  <span class="info-box-number"><?= $count_ibu_hamil_melahirkan['jml'] ?></span>
                </div>
              </div>
            </div>

            <div class="col-md">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-portrait"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Kematian Ibu Hamil</span>
                  <span class="info-box-number"><?= $count_kematian_ibu_hamil['jml'] ?></span>
                </div>
              </div>
            </div>

          </div>
          <!-- /.row -->

        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include_once '../templates/admin/footer.php'; ?>

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <?php include_once '../templates/admin/script.php'; ?>

</body>

</html>