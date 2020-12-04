<?php
// MENGABIL DATA YG DIPILIH
$id = $_GET['id'];

$user = query("SELECT * FROM tb_user WHERE id = $id")[0];
?>

<div class="card">
  <h1 class="text-center mb-4"></h1>
  <div class="row">
    <div class="column justify-center">
      <img src="assets/image/user/<?= $user['img_user']; ?>" alt="" class="justify-center">
      <h3 class="text-center mt-3"></h3>
    </div>
    <div class="column">
      <p>Nama: <strong><?= $user['nama_lengkap']; ?></strong></p>
      <p>Email: <strong><?= $user['email']; ?></strong></p>
    </div>
  </div>
  <div class="center">
    <!-- <a href="?page=profile&aksi=edit&id=<?= $user['id']; ?>" class="btn btn-warning ml-3">Edit Data</a> -->
    <a href="dashboard.php?page=wip" class="btn btn-warning ml-3">Edit Data</a>
  </div>
</div>