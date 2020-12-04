<!-- ============================================ -->

<!-- TIDAK DAPAT DIAKSES -->

<!-- ============================================ -->


<?php
// ambil data di url
$id = $_GET["id"];

// menggambil data dari tabel tb_buku

$user = query("SELECT * FROM tb_user WHERE id = $id")[0];


?>


<div class="card">
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $user["id"] ?>">
      <input type="hidden" name="gambarLama">
      <div class="row">
        <div class="col-25">
          <label for="nama">Nama</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="text" id="nama" name="nama" placeholder="Nama" class="" autofocus value="<?= $user['nama_lengkap']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="email">Email</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="email" id="email" name="email" placeholder="Email" class="" autofocus value="<?= $user['email']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="passwordBaru">Password Baru</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="password" id="passwordBaru" name="password" placeholder="Password Baru" class="">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="confpass">Konfirmasi Password</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="password" id="confpass" name="confpass" placeholder="Konfirmasi Password" class="">
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-25">
          <span class="input-group-text" id="gambar">Avatar</span>
        </div>
        <div class="col-75 form-tambah">
          <img src="assets/image/user/<?= $user["img_user"] ?>" alt="gambar" width="100" height="100">
          <input type="file" class="custom-file-input" id="gambar" name="gambar" aria-describedby="gambar">
        </div>
      </div> -->

      <button type="submit" name="submit" class="btn btn-success">Ubah Data</button>
    </form>
  </div>
</div>

<?php

if (isset($_POST["submit"])) {
  // cek data
  $nama = $_POST['nama'];

  if (editProfile($_POST) > 0) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success Ubah Data!',
                text: '$nama',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=profile&id=$id'); 
            } ,3000); 
        </script>";
  } else {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
  }
}

?>