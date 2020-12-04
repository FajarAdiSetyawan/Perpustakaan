<?php
// MEMULAI SESSION
session_start();
// CEK SESSION ADA/TIDAK
// JIKA TIDAK ADA AKAN PINDAH KE LOGIN.PHP
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
// menginclude function.php
require 'functions.php';

@$page = $_GET['page'];
@$aksi = $_GET['aksi'];

// JUDUL HALAMAN
if ($page == "dashboard" || empty($page)) {
  if ($aksi == "") {
    $title = "Dashboard";
  }
} elseif ($page == "profile") {
  if ($aksi == "") {
    $title = "Profile";
  } elseif ($aksi == 'edit') {
    $title = "Edit Anggota";
  }
} elseif ($page == 'anggota') {
  if ($aksi == '') {
    $title = "Anggota";
  } elseif ($aksi == 'tambah') {
    $title = "Tambah Anggota";
  } elseif ($aksi == 'detail') {
    $title = "Detail Anggota";
  } elseif ($aksi == 'edit') {
    $title = "Edit Anggota";
  } elseif ($aksi == 'hapus') {
    $title = "Hapus Anggota";
  } elseif ($aksi == 'laporan') {
    $title = "Laporan Anggota";
  }
} elseif ($page == 'buku') {
  if ($aksi == '') {
    $title = "Buku";
  } elseif ($aksi == 'tambah') {
    $title = "Tambah Buku";
  } elseif ($aksi == 'detail') {
    $title = "Detail Buku";
  } elseif ($aksi == 'edit') {
    $title = "Edit Buku";
  } elseif ($aksi == 'hapus') {
    $title = "Hapus Buku";
  } elseif ($aksi == 'pinjam') {
    $title = "Pinjam Buku";
  } elseif ($aksi == 'laporan') {
    $title = "Laporan Buku";
  }
} elseif ($page == "transaksi") {
  if ($aksi == "") {
    $title = "Transaksi";
  } elseif ($aksi == 'tambah') {
    $title = "Tambah Transaksi";
  } elseif ($aksi == 'perpanjang') {
    $title = "Perpanjang Transaksi";
  } elseif ($aksi == 'kembali') {
    $title = "Kembalikan Transaksi";
  } elseif ($aksi == 'laporan') {
    $title = "Laporan Transaksi";
  }
} elseif ($page == "wip") {
  if ($aksi == "") {
    $title = "Under Construction";
  }
} else {
  $title = "Page Not Found";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- fontawesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
  <!-- favicon -->
  <link rel="shortcut icon" href="assets/dist/img/favicon.png" type="image/x-icon">
  <!--  CSS  -->
  <link rel="stylesheet" href="assets/dist/css/styles.css">
  <!-- DATA TABLES -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/jquery.dataTables.min.css" />

  <title><?= $title; ?></title>
</head>

<body id="body-pd">

  <header class="header" id="header">
    <div class="header__toggle">
      <i class='fas fa-bars' id="header-toggle"></i>
    </div>
    <div class="profile">
      <!-- MENGAMBIL DATA SESSION -->
      <h4><?= $_SESSION['nama_lengkap']; ?></h4>
      <img src="assets/image/user/<?= $_SESSION['img_user']; ?>" alt="">
    </div>
  </header>

  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="?page=dashboard" class="nav__logo">
          <i class='fas fa-book-open nav__logo-icon'></i>
          <span class="nav__logo-name">Perpustakaan</span>
        </a>

        <div class="nav__list">
          <a href="?page=dashboard" class="nav__link active">
            <i class='fas fa-desktop nav__icon'></i>
            <span class="nav__name">Dashboard</span>
          </a>

          <a href="?page=profile&id=<?= $_SESSION['id']; ?>" class="nav__link">
            <i class='fas fa-user nav__icon'></i>
            <span class="nav__name">Profile</span>
          </a>
          <!-- JIKA ROLE ADMIN TAMPILKAN  -->
          <?php if (($_SESSION['role']) == 'admin') : ?>
            <a href="?page=anggota" class="nav__link">
              <i class='fas fa-users nav__icon'></i>
              <span class="nav__name">Data Anggota</span>
            </a>
          <?php endif; ?>
          <a href="?page=buku" class="nav__link">
            <i class='fas fa-book nav__icon'></i>
            <span class="nav__name">Data Buku</span>
          </a>
          <!-- JIKA ROLE ADMIN TAMPILKAN  -->
          <?php if (($_SESSION['role']) == 'admin') : ?>
            <a href="?page=transaksi" class="nav__link">
              <i class='fas fa-shopping-cart nav__icon'></i>
              <span class="nav__name">Transaksi</span>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <a href="logout.php" class="nav__link">
        <i class='fas fa-sign-out-alt nav__icon'></i>
        <span class="nav__name">Log Out</span>
      </a>
    </nav>
  </div>

  <div class="content">
    <?php

    // MENAMPILKAN ISI CONTENT
    if ($page == "dashboard" || empty($page)) {
      if ($aksi == "") {
        include 'pages/dashboard/dashboard.php';
      }
    } elseif ($page == "profile") {
      if ($aksi == "") {
        include 'pages/profile/profile.php';
      } elseif ($aksi == 'edit') {
        include 'pages/profile/edit.php';
      }
    } elseif ($page == 'anggota') {
      if ($aksi == '') {
        include 'pages/anggota/anggota.php';
      } elseif ($aksi == 'tambah') {
        include 'pages/anggota/tambah.php';
      } elseif ($aksi == 'detail') {
        include 'pages/anggota/detail.php';
      } elseif ($aksi == 'edit') {
        include 'pages/anggota/edit.php';
      } elseif ($aksi == 'hapus') {
        include 'pages/anggota/hapus.php';
      } elseif ($aksi == 'laporan') {
        include 'pages/anggota/laporan.php';
      }
    } elseif ($page == 'buku') {
      if ($aksi == '') {
        include 'pages/buku/buku.php';
      } elseif ($aksi == 'tambah') {
        include 'pages/buku/tambah.php';
      } elseif ($aksi == 'detail') {
        include 'pages/buku/detail.php';
      } elseif ($aksi == 'edit') {
        include 'pages/buku/edit.php';
      } elseif ($aksi == 'hapus') {
        include 'pages/buku/hapus.php';
      } elseif ($aksi == 'pinjam') {
        include 'pages/buku/pinjam.php';
      } elseif ($aksi == 'laporan') {
        include 'pages/buku/laporan.php';
      }
    } elseif ($page == "transaksi") {
      if ($aksi == "") {
        include 'pages/transaksi/transaksi.php';
      } else if ($aksi == "tambah") {
        include 'pages/transaksi/tambah.php';
      } else if ($aksi == "perpanjang") {
        include 'pages/transaksi/perpanjang.php';
      } else if ($aksi == "kembali") {
        include 'pages/transaksi/kembali.php';
      } else if ($aksi == "laporan") {
        include 'pages/transaksi/laporan.php';
      }
    } elseif ($page == "wip") {
      if ($aksi == "") {
        include 'wip.php';
      }
    } else {
      include 'error.php';
    }
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
  </div>



  <footer>
    <p>Copyright &copy; Lorem ipsum dolor sit amet. | <?= date('Y'); ?></p>
  </footer>
  <!-- LOTTIE ANIMATION -->
  <script src="assets/plugins/lottie/lottie-player.js"></script>
  <!-- JQUERY -->
  <script type="text/javascript" src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
  <!-- SWEET ALERT -->
  <script type="text/javascript" src="assets/plugins/sweetalert/sweetalert.min.js"></script>
  <!-- DATA TABLES -->
  <script type="text/javascript" src="assets/plugins/DataTables/js/datatables.min.js"></script>
  <!-- MAIN JS -->
  <script src="assets/dist/js/main.js"></script>
  <!-- DATA TABLES SCRIPT -->
  <script>
    $(function() {
      $('#example').DataTable({
        "responsive": true,
        "autoWidth": false,
        "lengthChange": false,
      });
    });
  </script>
</body>

</html>