<h2 class="text-center mb-3">Data Transaksi</h2>
<div class="card" style="overflow-x:auto;">
  <table id="example" class="stripe" style="width:100%">
    <thead>
      <!-- JIKA ROLE ADMIN TAMPILKAN -->
      <?php if (($_SESSION['role']) == 'admin') : ?>
        <a href="?page=transaksi&aksi=tambah" class="btn btn-info btn-sm text-center m-0"><i class="fas fa-plus-circle"></i> Tambah Data</a>
      <?php endif; ?>

      <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>Terlambat</th>
        <th width="21%">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      // tampilkan semua data di table tb_transaksi yang berstatus pinjam
      $sql = $conn->query("SELECT * FROM tb_transaksi WHERE status='pinjam' ");
      while ($data = $sql->fetch_assoc()) :

        // query data dari tb_buku 
        $idBuku = $data['id_buku'];
        $buku = $conn->query("SELECT * FROM tb_buku WHERE id=$idBuku");
        $judulBuku = $buku->fetch_assoc();

        // query data dari tb_anggota
        $idAnggota = $data['nim'];
        $anggota = $conn->query("SELECT * FROM tb_anggota WHERE nim=$idAnggota");
        $nim = $anggota->fetch_assoc();

        $tanggal_dateline = $data['tgl_kembali'];
        // merubah format tanggal
        $tgl_kembali = date('Y-m-d');
        $lambat = terlambat($tanggal_dateline, $tgl_kembali);
      ?>
        <tr>
          <td class="text-center"><?= $i; ?></td>
          <td class="text-center"><?= $judulBuku['judul']; ?></td>
          <td class="text-center"><?= $nim['nim']; ?></td>
          <td class="text-center"><?= $nim['nama_lengkap']; ?></td>
          <td class="text-center"><?= $data['tgl_pinjam']; ?></td>
          <td class="text-center"><?= $data['tgl_kembali']; ?></td>
          <td class="text-center"><span class="badge badge-info"><?= $data['status']; ?></span></td>
          <td class="text-center">
            <?php
            // menghitung denda
            $denda = $lambat * 2000;
            if ($lambat > 0) : ?>
              <!-- JIKA BUKU TERLAMBAT DIKEMBALIKAN -->
              <span class="text-center badge badge-danger"><?= $lambat; ?> Hari, Denda Rp. <?= $denda; ?></span>
            <?php else : ?>
              <span class="text-center badge badge-warning"><?= $lambat; ?> Hari</span>
            <?php endif; ?>
          </td>
          <td class="text-center">
            <!-- JIKA ROLE ADMIN TAMPILKAN -->
            <?php if (($_SESSION['role']) == 'admin') : ?>
              <a href="?page=transaksi&aksi=kembali&id=<?= $data['id']; ?>&judul=<?php echo $data['judul'] ?>" class="btn btn-sm btn-outline-primary">Kembali</a>
              <a href="?page=transaksi&aksi=perpanjang&id=<?= $data['id']; ?>&judul=<?php echo $data['judul']; ?>&tgl_kembali=<?php echo $data['tgl_kembali'] ?>&lambat=<?php echo $lambat; ?>" class="btn btn-sm btn-outline-dark">Perpanjang</a>
            <?php endif; ?>
          </td>
        </tr>
        <!-- INCREMENT NOMOR TABEL -->
        <?php $i++ ?>
      <?php endwhile; ?>
    </tbody>
  </table>
  <!-- JIKA ROLE ADMIN TAMPILKAN -->
  <?php if (($_SESSION['role']) == 'admin') : ?>
    <a href="?page=transaksi&aksi=laporan" class="btn btn-warning btn-sm text-center m-0"><i class="fas fa-flag"></i> Laporan Transaksi</a>
  <?php endif; ?>

  <br />
  <br />
  <p class="text-danger">* Waktu peminjaman buku hanya 30 hari</p>
  <p class="text-danger">* Denda keterlambatan 2000/hari</p>
</div>
<!-- /.card -->