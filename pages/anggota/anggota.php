<h2 class="text-center mb-3">Data Anggota</h2>
<div class="card" style="overflow-x:auto;">
  <table id="example" class="stripe" style="width:100%">
    <thead>
      <!-- JIKA ROLE ADMIN TAMPILKAN -->
      <?php if (($_SESSION['role']) == 'admin') : ?>
        <a href="?page=anggota&aksi=tambah" class="btn btn-info btn-sm text-center m-0"><i class="fas fa-plus-circle"></i> Tambah Anggota</a>
      <?php endif; ?>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Email</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      // tampilkan semua data di table tb_buku
      $anggota = query("SELECT * FROM tb_anggota");
      foreach ($anggota as $row) : ?>
        <tr>
          <!-- PRINT DATA KE TABLE -->
          <td class="text-center"><?= $i; ?></td>
          <td class="text-center"><?= $row['nim']; ?></td>
          <td class="text-center"><?= $row['email']; ?></td>
          <td class="text-center"><?= $row['nama_lengkap']; ?></td>
          <td class="text-center"><?= $row['prodi']; ?></td>
          <td class="text-center">
            <a href="?page=anggota&aksi=detail&id=<?= $row['nim']; ?>" class="btn btn-info btn-sm ">Detail</a>
          </td>
        </tr>
        <?php $i++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- JIKA ROLE ADMIN TAMPILKAN -->
  <?php if (($_SESSION['role']) == 'admin') : ?>
    <a href="?page=anggota&aksi=laporan" class="btn btn-warning btn-sm text-center m-0"><i class="fas fa-flag"></i> Laporan Anggota</a>
  <?php endif; ?>
</div>
<!-- /.card -->