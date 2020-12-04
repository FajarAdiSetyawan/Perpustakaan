<?php
// MENGAMBIL ID DARI DATA YG DIPILIH
$id = $_GET["id"];

// menggambil data dari tabel tb_buku

$buku = query("SELECT * FROM tb_buku WHERE id = $id")[0];


?>


<div class="card">
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $buku["id"] ?>">
      <input type="hidden" name="gambarLama">
      <div class="row">
        <div class="col-25">
          <label for="judul_buku">Judul Buku</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="text" id="judul_buku" name="judulBuku" placeholder="Judul Buku" class="" required autofocus value="<?= $buku['judul']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="pengarang">Pengarang</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="text" id="pengarang" name="pengarang" placeholder="Pengarang" class="" required value="<?= $buku['pengarang']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="penerbit">Penerbit</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="text" id="penerbit" name="penerbit" placeholder="Penerbit" class="" required value="<?= $buku['penerbit']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="tahun_terbit">Tahun Terbit</label>
        </div>
        <div class="col-75 form-tambah">
          <select id="tahun_terbit" name="tahunTerbit" required>
            <?php
            $tahun = date('Y');
            // menampilkan 200 tahun kebelakang
            for ($i = $tahun - 200; $i <= $tahun; $i++) : ?>
              <option value="" selected><?= $buku['tahun_terbit']; ?></option>
              <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="isbn">ISBN</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="text" id="isbn" name="isbn" placeholder="ISBN" class="" required value="<?= $buku['isbn']; ?>" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="jml_buku">Jumlah Buku</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="number" id="jml_buku" name="jmlBuku" placeholder="0" required class="" min="1" onkeypress='validate(event)' value="<?= $buku['jumlah_buku']; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lokasi_rak">Lokasi Rak</label>
        </div>
        <div class="col-75">
          <select id="lokasi_rak" name="lokasiRak" required>
            <option value="" selected><?= $buku['lokasi']; ?></option>
            <option value="Rak 2">Rak 1</option>
            <option value="Rak 2">Rak 2</option>
            <option value="Rak 3">Rak 3</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <span class="input-group-text" id="gambar">Sampul Buku</span>
        </div>
        <div class="col-75 form-tambah">
          <img src="assets/image/buku/<?= $buku["gambar"] ?>" alt="gambar" width="100" height="100">
          <input type="file" required class="custom-file-input" id="gambar" name="gambar" aria-describedby="gambar">
        </div>
      </div>

      <button type="submit" name="submit" class="btn btn-success">Ubah Data</button>
    </form>
  </div>
</div>

<?php

if (isset($_POST["submit"])) {
  // cek data
  $judul = $_POST['judulBuku'];

  if (editBuku($_POST) > 0) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success Ubah Data!',
                text: '$judul',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=buku'); 
            } ,3000); 
        </script>";
  } else {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Good job!',
                text: 'Error Tambah Data!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=buku'); 
            } ,3000); 
        </script>";
  }
}

?>

<!-- SCRIPT HANYA BISA MENGINPUTKAN ANGKA -->
<script>
  function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
    } else {
      // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
      theEvent.returnValue = false;
      if (theEvent.preventDefault) theEvent.preventDefault();
    }
  }
</script>