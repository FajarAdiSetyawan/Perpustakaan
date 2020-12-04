<?php

// MENGAMBIL ID DARI DATA YG DIPILIH
$id = $_GET["id"];
$buku = query("SELECT * FROM tb_buku WHERE id = $id")[0];


?>
<div class="card">
  <h1 class="text-center mb-4"><?= $buku['judul']; ?></h1>
  <div class="row">
    <div class="column justify-center">
      <img src="assets/image/buku/<?= $buku["gambar"] ?>" alt="" class="justify-center">
      <h3 class="text-center mt-3"><?= $buku['tahun_terbit']; ?></h3>
    </div>
    <div class="column">
      <p>Pengrang: <strong><?= $buku['pengarang']; ?></strong></p>
      <p>Penerbit: <strong><?= $buku['penerbit']; ?></strong></p>
      <p>ISBN: <strong><?= $buku['isbn']; ?></strong></p>
      <p>Jumlah Buku: <strong><?= $buku['jumlah_buku']; ?></strong></p>
      <p>Lokasi: <strong><?= $buku['lokasi']; ?></strong></p>
      <!-- JIKA ROLE ADMIN TAMPILKAN -->
      <?php if (($_SESSION['role']) == 'admin') : ?>
        <p>Tanggal Input: <strong><?= $buku['tgl_input'];; ?></strong></p>
      <?php endif; ?>
    </div>
  </div>
  <div class="center">
    <!-- JIKA ROLE ADMIN TAMPILKAN -->
    <?php if (($_SESSION['role']) == 'admin') : ?>
      <a href="?page=buku&aksi=edit&id=<?= $buku['id']; ?>" class="btn btn-warning ml-3">Edit Data</a>
      <a href="?page=buku&aksi=hapus&id=<?= $buku['id']; ?>" class="btn btn-danger ml-3 delete-link" role="button" onclick="return confirm('Hapus?');">Hapus Data</a>
      <a href="?page=buku&aksi=pinjam&id=<?= $buku['id']; ?>" class="btn btn-success ml-3">Pinjam</a>
    <?php endif; ?>
  </div>

</div>