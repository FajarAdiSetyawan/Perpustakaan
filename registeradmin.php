<?php

require 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Admin</title><!-- customize style css -->
  <link rel="stylesheet" href="assets/dist/css/styles.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
  <link rel="shortcut icon" href="assets/dist/img/favicon.png" type="image/x-icon">
</head>

<body>
  <div class="wrap">
    <form class="login-form" action="" method="POST">
      <div class="form-header">
        <h3>Register</h3>
        <img src="assets/dist/img/register.png" alt="" srcset="">
      </div>
      <!--Fullname Input-->
      <div cliass="form-group" style="margin-bottom: 1rem;">
        <input type="text" class="form-input form-input-login" placeholder="Nama Lengkap" name="nama_lengkap" required>
      </div>
      <!--Email Input-->
      <div class="form-group">
        <input type="email" class="form-input form-input-login" placeholder="email@example.com" name="email" required>
      </div>
      <!--Password Input-->
      <div class="form-group">
        <input type="password" class="form-input form-input-login" placeholder="Password" name="password" required>
      </div>
      <!--Konfirm Password Input-->
      <div class="form-group">
        <input type="password" class="form-input form-input-login" placeholder="Konfirmasi Password" name="confpass" required>
      </div>
      <!--Login Button-->
      <div class="form-group">
        <button class="form-button" type="submit" name="registeradmin">Register</button>
      </div>
      <div class="form-group">
        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
        <label for="remember-me" class="label-agree-term"><span><span></span></span>Ingat saya</label>
        <a href="error.php" class="btn-forget">Lupa Password</a>
      </div>
      <div class="form-footer">
        Punya Akun? <a href="login.php" class="btn-signup">Login</a>
      </div>
    </form>
  </div>
  <!--/.wrap-->

  <!-- JQUERY -->
  <script type="text/javascript" src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
  <!-- SWEET ALERT -->
  <script type="text/javascript" src="assets/plugins/sweetalert/sweetalert.min.js"></script>


</body>

</html>

<?php

$nama_lengkap = $_POST['nama_lengkap'];
if (isset($_POST["registeradmin"])) {
  if (registrasiAdmin($_POST) > 0) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success Buat User!',
                text: 'Selamat Datang $nama_lengkap',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('login.php'); 
            } ,3000); 
        </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>