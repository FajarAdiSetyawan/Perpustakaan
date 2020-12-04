<?php
// 
$pinjam = date("d-m-Y");
$tuju_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
$kembali = date("d-m-Y", $tuju_hari);
?>

<div class="card">
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-25">
          <label for="judul_buku">Judul Buku</label>
        </div>
        <div class="col-75 form-tambah">
          <select id="judul_buku" name="judul" autofocus required>
            <option value=""> == Pilih == </option>
            <?php
            // MENGAMIL DATA BUKU
            $query = $conn->query("SELECT * FROM tb_buku ORDER by id");
            while ($judul = $query->fetch_assoc()) {
              echo "<option value='$judul[id].$judul[judul]'>$judul[judul]</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nama_peminjam">Nama Peminjam</label>
        </div>
        <div class="col-75 form-tambah">
          <select id="nama_peminjam" name="nama" required>
            <option value=""> == Pilih == </option>
            <?php
            // MENGAMBIL DATA ANGGOTA
            $query = $conn->query("SELECT * FROM tb_anggota ORDER by nim");
            while ($anggota = $query->fetch_assoc()) {
              echo "<option value='$anggota[nim].$anggota[nama_lengkap]'>$anggota[nim] - $anggota[nama_lengkap]</option>";
            } ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="tglPinjam">Tanggal Pinjam</label>
        </div>
        <div class="col-75 form-tambah">
          <input id="tglPinjam" name="tglPinjam" readonly value="<?= $pinjam; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="tglKembali">Tanggal Kembali</label>
        </div>
        <div class="col-75 form-tambah">
          <input id="tglKembali" name="tglKembali" readonly value="<?= $kembali ?>">
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-success">Tambah Data</button>
    </form>
  </div>
</div>

<?php

if (isset($_POST["submit"])) {
  // cek data
  if (tambahTransaksi($_POST) > 0) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success Tambah Data!',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=transaksi'); 
            } ,3000); 
        </script>";
  } else {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'ERROR Tambah Data!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=transaksi'); 
            } ,3000); 
        </script>";
  }
}

?>