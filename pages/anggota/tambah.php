<div class="card">
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-25">
          <label for="nim">NIM</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="number" id="nim" name="nim" placeholder="0" required min="1" onkeypress='validate(event)' autofocus>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nama">Nama</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="text" id="nama" name="nama" placeholder="Nama" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="email">Email</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="email" id="email" name="email" placeholder="example@mail.com" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="no_tlp">Nomor Telpon</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="number" id="no_tlp" name="no_tlp" placeholder="+62 xxxx" required min="1" onkeypress='validate(event)'>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="alamat">Alamat</label>
        </div>
        <div class="col-75 form-tambah">
          <textarea id="alamat" name="alamat" placeholder="Alamat" style="resize: none;" required rows="10"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="prodi">Prodi</label>
        </div>
        <div class="col-75 form-tambah">
          <input type="text" id="prodi" name="prodi" placeholder="Prodi" required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="gender">Jenis Kelamin</label>
        </div>
        <div class="col-75">
          <label class="radiobtn">Laki-Laki
            <input type="radio" checked="checked" name="gender" value="Laki-laki">
            <span class="checkmark"></span>
          </label>
          <label class="radiobtn">Perempuan
            <input type="radio" name="gender" value="Perempuan">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>

      <button type="submit" name="submit" class="btn btn-success mt-3">Tambah Data</button>
    </form>
  </div>
</div>


<?php

if (isset($_POST["submit"])) {
  // cek data
  $nama = $_POST['nama'];
  if (tambahAnggota($_POST) > 0) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success Tambah Data!',
                text: '$nama',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=anggota'); 
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
<!-- SCRIPT UNTUK ANGKA SAJA -->
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