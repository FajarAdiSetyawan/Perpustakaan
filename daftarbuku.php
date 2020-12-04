<?php require 'functions.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="assets/css/styles.css">
  <!-- favicon -->
  <link rel="shortcut icon" href="assets/dist/img/favicon.png" type="image/x-icon">

  <!-- fontawesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">

  <!-- DATA TABLES -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/jquery.dataTables.min.css" />


  <title>Daftar Buku</title>
</head>

<body>
  <!--===== HEADER =====-->
  <header class="l-header">
    <nav class="nav bd-grid">
      <div>
        <a href="#" class="nav_logo">Perpustakaan</a>
      </div>

      <div class="nav_menu" id="nav-menu">
        <ul class="nav_list">
          <li class="nav_item"><a href="index.php" class="nav_link active">Home</a></li>
          <li class="nav_item"><a href="daftarbuku.php" class="nav_link">Daftar Buku</a></li>
        </ul>
      </div>

      <div class="nav_toggle" id="nav-toggle">
        <i class='fas fa-bars'></i>
      </div>
    </nav>
  </header>

  <main class="l-main">
    <!--===== HOME =====-->
    <section class="home bd-grid column" id="home">
      <div class="home_data row">
        <h1 class="home_title">Perpus<span class="home_title-color">takaan</span></h1>
      </div>

      <div class="home_social">
        <a href="" class="home_social-icon"><i class='fab fa-facebook'></i></a>
        <a href="" class="home_social-icon"><i class='fab fa-twitter'></i></a>
        <a href="" class="home_social-icon"><i class='fab fa-instagram'></i></a>
      </div>

      <div class="home_img row">
        <img src="assets/img/landing.jpg" alt="">
      </div>
    </section>

    <!--===== DAFTAR BUKU =====-->
    <section class="daftarbuku section " id="daftarbuku">
      <h2 class="section-title">Daftar Buku</h2>
      <div class="daftarbuku_container bd-grid">
        <table id="example" class="stripe" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Sampul</th>
              <th>Judul</th>
              <th>Pengarang</th>
              <th>Penerbit</th>
              <th>ISBN</th>
              <th>Tahun Terbit</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            // tampilkan semua data di table tb_buku
            $perpustakaan = query("SELECT * FROM tb_buku");
            foreach ($perpustakaan as $row) : ?>
              <tr>
                <td class="text-center"><?= $i; ?></td>
                <td scope="row" class="text-center"><img src="assets/image/buku/<?= $row["gambar"] ?>" alt="" width="50"></td>
                <td class="text-center"><?= $row['judul']; ?></td>
                <td class="text-center"><?= $row['pengarang']; ?></td>
                <td class="text-center"><?= $row['penerbit']; ?></td>
                <td class="text-center"><?= $row['isbn']; ?></td>
                <td class="text-center"><?= $row['tahun_terbit']; ?></td>
              </tr>
              <?php $i++ ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </section>

  </main>

  <!--===== FOOTER =====-->
  <footer class="footer">
    <p class="footer_title">Perpustakaan</p>
    <div class="footer_social">
      <a href="" class="home_social-icon"><i class='fab fa-facebook'></i></a>
      <a href="" class="home_social-icon"><i class='fab fa-twitter'></i></a>
      <a href="" class="home_social-icon"><i class='fab fa-instagram'></i></a>
    </div>
    <p>&#169; 2020 copyright all right reserved</p>
  </footer>


  <!--===== SCROLL REVEAL =====-->
  <script src="https://unpkg.com/scrollreveal"></script>

  <!--===== MAIN JS =====-->
  <script src="assets/js/main.js"></script>

  <!-- JQUERY -->
  <script type="text/javascript" src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
  <!-- SWEET ALERT -->
  <script type="text/javascript" src="assets/plugins/sweetalert/sweetalert.min.js"></script>
  <!-- DATA TABLES -->
  <script type="text/javascript" src="assets/plugins/DataTables/js/datatables.min.js"></script>
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