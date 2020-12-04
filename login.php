<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title><!-- customize style css -->
  <link rel="stylesheet" href="assets/dist/css/styles.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
  <link rel="shortcut icon" href="assets/dist/img/favicon.png" type="image/x-icon">
</head>

<body>

  <div class="wrap">
    <form class="login-form" action="" method="POST">
      <div class="form-header">
        <h3>Login</h3>
        <img src="assets/dist/img/iconuser.png" alt="" srcset="">
      </div>
      <!--Email Input-->
      <div class="form-group">
        <input type="email" class="form-input form-input-login" placeholder="email@example.com" name="email" required>
      </div>
      <!--Password Input-->
      <div class="form-group">
        <input type="password" class="form-input form-input-login" placeholder="Password" name="password" required>
      </div>
      <!--Login Button-->
      <div class="form-group">
        <button class="form-button" type="submit" name="login">Login</button>
      </div>
      <div class="form-group">
        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
        <label for="remember-me" class="label-agree-term" name="remember">Ingat saya</label>
        <a href="error.php" class="btn-forget">Lupa Password</a>
      </div>
      <div class="form-footer">
        Tidak punya akun? <a href="register.php" class="btn-signup">Register</a>
      </div>
    </form>
  </div>
  <!--/.wrap-->
  <!-- JQUERY -->
  <script type="text/javascript" src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
  <!-- SWEET ALERT -->
  <script type="text/javascript" src="assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script src="assets/dist/js/script.js"></script>
</body>

</html>

<?php
// MEMULAI SESSION
session_start();

// INCLUDE FUNCTION.PHP
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['nama']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $nama = $_COOKIE['nama'];
  $key = $_COOKIE['key'];

  // ambil email berdasar id
  $result = mysqli_query($conn, "SELECT email FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan email
  if ($key === hash('sha256', $row['email'])) {
    $_SESSION['login'] = true;
  }
}

// JIKA SESSION MASIH ADA, AKAN PINDAH KE DASHBOARD
if (isset($_SESSION["login"])) {
  header("Location: dashboard.php");
  exit;
}

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result =  mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");

  //cek email
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      //set session
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row['id'];
      $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['img_user'] = $row['img_user'];
      $_SESSION['role'] = $row['role'];
      // cek remember me (cookie)
      if (isset($_POST['remember'])) {
        //buat cookie
        setcookie('id', $row['id'], time() + 60); // cookie hilang dalam 60s
        setcookie('nama', $row['nama_lengkap'], time() + (60 * 60 * 24 * 5), '/');
        //enkripsi email
        setcookie('key', hash('sha256', $row['email']), time() + 60);
      }

      echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success!',
                text: 'Success Login',
                icon: 'success',
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php'); 
            } ,3000); 
        </script>";
      exit;
    } else {
      echo
        "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Password Salah!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php'); 
            } ,3000); 
        </script>";
    }
  } else {
    echo
      "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Email Tidak Terdaftar!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php'); 
            } ,3000); 
        </script>";
  }
  $error = true;
}

?>