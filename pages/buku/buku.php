<h2 class="text-center mb-3">Data Buku</h2>
<div class="card" style="overflow-x:auto;">
  <table id="example" class="stripe" style="width:100%">
    <thead>
      <!-- JIKA ROLE ADMIN TAMPILKAN -->
      <?php if (($_SESSION['role']) == 'admin') : ?>
        <a href="?page=buku&aksi=tambah" class="btn btn-info btn-sm text-center m-0"><i class="fas fa-plus-circle"></i> Tambah Buku</a>
      <?php endif; ?>
      <tr>
        <th>No</th>
        <th>Sampul</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Jumlah Buku</th>
        <th>Aksi</th>
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
          <td class="text-center"><?= $row['jumlah_buku']; ?></td>
          <td class="text-center">
            <a href="?page=buku&aksi=detail&id=<?= $row['id']; ?>" class="btn btn-info btn-sm ">Detail</a>
          </td>
        </tr>
        <!-- INCREMENT UNTUK NOMOR DI TABEL -->
        <?php $i++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- JIKA ROLE ADMIN TAMPILKAN -->
  <?php if (($_SESSION['role']) == 'admin') : ?>
    <a href="?page=buku&aksi=laporan" class="btn btn-warning btn-sm text-center m-0"><i class="fas fa-flag"></i> Laporan Buku</a>
  <?php endif; ?>
</div>
<!-- /.card -->