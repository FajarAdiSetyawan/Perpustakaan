<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout</title>
  <link rel="shortcut icon" href="assets/dist/img/favicon.png" type="image/x-icon">
</head>

<body>
  <!-- JQUERY -->
  <script type="text/javascript" src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
  <!-- SWEET ALERT -->
  <script type="text/javascript" src="assets/plugins/sweetalert/sweetalert.min.js"></script>
</body>

</html>

<?php
session_start();
$_SESSION = [];
echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success!',
                text: 'Success Logout',
                icon: 'success',
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('index.php'); 
            } ,3000); 
        </script>";

// menghapus session & cookie
session_unset();
session_destroy();

setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);
setcookie('nama', '', time() - 3600);

exit;
?>