<?php
// MENGAMBIL ID YANG DIPILIH
$nim = $_GET["id"];
$anggota = query("SELECT * FROM tb_anggota WHERE nim = $nim")[0];

?>
<div class="card">
  <h1 class="text-center mb-4">Detail Anggota</h1>
  <div class="row">
    <!-- MENAMPILKAN DATA DARI ID YANG DIAMBIL -->
    <div class="column justify-center">
      <p>Nama: <strong><?= $anggota['nama_lengkap']; ?></strong></p>
      <p>NIM: <strong><?= $anggota['nim']; ?></strong></p>
      <p>email: <strong><?= $anggota['email']; ?></strong></p>
      <p>No. Telpon: <strong><?= $anggota['no_telp']; ?></strong></p>
      <p>Alamat: <strong><?= $anggota['alamat']; ?></strong></p>
      <p>Jenis Kelamin: <strong><?= $anggota['gender']; ?></strong></p>
      <p>Prodi: <strong><?= $anggota['prodi']; ?></strong></p>
      <p>Tanggal Input: <strong><?= $anggota['tgl_input']; ?></strong></p>
    </div>
  </div>
  <div class="center ">
    <a href="?page=anggota&aksi=edit&id=<?= $anggota['nim']; ?>" class="btn btn-warning ml-3">Edit Data</a>
    <a href="?page=anggota&aksi=hapus&id=<?= $anggota['nim']; ?>" class="btn btn-danger ml-3 delete-link" role="button" onclick="return confirm('Hapus?');">Hapus Data</a>
  </div>

</div>