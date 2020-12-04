<?php
// MENGABIL DATA YG DIPILIH
$id = $_GET['id'];
$judul = $_GET['judul'];
$tgl_kembali = $_GET['tgl_kembali'];
$lambat = $_GET['lambat'];

// JIKA BUKU TERLAMABAT DIKEMBALIKAN, BUKU TIDAK DAPAT DIPERPANJANG

if ($lambat > 7) {
  echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'ERROR!',
                text: 'Buku yang dipinjam tidak dapat diperpanjang, karena sudah melewati tanggal kembali, kembalikan buku kemudian baru bisa pinjam kembali',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=transaksi'); 
            } ,3000); 
        </script>";
} else {
  // MEMECAH DATA MENJADI 2
  $pecah      = explode("-", $tgl_kembali);
  $next_7_hari  = mktime(0, 0, 0, $pecah[1], $pecah[0] + 7, $pecah[2]);
  $hari_next    = date("d-m-Y", $next_7_hari);

  // MENGAPDATE DATA
  $update = $conn->query("UPDATE tb_transaksi SET tgl_kembali='$hari_next' WHERE id='$id'");

  if ($update) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success!',
                text: 'Buku yang dipinjam berhasil diperpanjang',
                icon: 'success',
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
                title: 'ERROR!',
                text: 'Buku yang dipinjam tidak dapat diperpanjang',
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
