<?php
include_once "config/config.php";

if (isset($_SESSION['id_user']) || isset($_SESSION['id_role'])) {
  header("location:javascript://history.go(-1)");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="<?= base_url() ?>/assets/img/logo-puskes.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .bg-cover {
      background-image: url('<?= base_url() ?>/assets/img/puskes gambah1.jpg');
      background-size: 100% 100%;
      background-repeat: no-repeat;
    }
  </style>

</head>

<body class="hold-transition login-page bg-cover">
  <div class="login-box">
    <div class="card">
      <div class="login-logo mt-3 p-2">
        <img src="<?= base_url('assets/img/logo-puskes.png') ?>" style="width: 80px; height: 90px;"> <br>
        <label style="font-size: 20px;">
          <b>LAYANAN KESEHATAN IBU DAN ANAK <br> PUSKESMAS GAMBAH</b>
        </label>
      </div>
      <div class="card-body login-card-body">
        <!-- <p class="login-box-msg font-weight-bold" style="font-size: 22px;">Halaman Login</p> -->

        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" autocomplete="off" required placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" required autocomplete="off" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <button type="submit" name="login" class="btn bg-primary btn-block"><i class="fa fa-sign-in-alt"> Masuk</i></button>

        </form>


      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>

  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
  </script>

</body>

</html>

<?php
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);
  $pass     = md5($password);

  $query = $koneksi->query("SELECT * FROM user u LEFT JOIN role r ON u.id_role = r.id_role WHERE username = '$username'");

  // CEK USERNAME
  if (mysqli_num_rows($query) === 1) {

    // CEK PASSWORD
    $data = mysqli_fetch_array($query);
    if ($pass == $data['password']) {
      $_SESSION['id_user']   = $data['id_user'];
      $_SESSION['nama_user'] = $data['nama_user'];
      $_SESSION['id_role']   = $data['id_role'];
      $_SESSION['role']      = $data['role'];

      if ($data['id_role'] == 1) {
        echo "
                <script type='text/javascript'>
                Toast.fire({
                    type: 'success',
                    title: 'Anda Login Sebagai Admin'
                })
                </script>";
        echo '<meta http-equiv="refresh" content="2; url=admin">';

      } elseif ($data['id_role'] == 2) {
        echo "
        <script type='text/javascript'>
        Toast.fire({
            type: 'success',
            title: 'Anda Login Sebagai Pegawai'
        })
        </script>";
        echo '<meta http-equiv="refresh" content="2; url=pegawai">';

      } elseif ($data['id_role'] == 3) {
        echo "
        <script type='text/javascript'>
        Toast.fire({
            type: 'success',
            title: 'Anda Login Sebagai Kepala Puskesmas'
        })
        </script>";
        echo '<meta http-equiv="refresh" content="2; url=kepala-puskesmas">';
      }
    } else {
      echo "
            <script type='text/javascript'>
            Toast.fire({
                type: 'error',
                title: 'Username atau Password Tidak Ditemukan'
            })
            </script>";
    }
  } else {
    echo "
            <script type='text/javascript'>
            Toast.fire({
                type: 'error',
                title: 'Username atau Password Tidak Ditemukan'
            }) 
            </script>";
  }
}
?>