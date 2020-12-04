<?php
// MENGABIL DATA YG DIPILIH
$id = $_GET['id'];
$idBuku = $_GET['judul'];

// MENGHAPUS DATA BERDASARKAN ID
$sql = $conn->query("DELETE FROM tb_transaksi WHERE id = '$id'");

// MENAMBAHKAN DATA JUMLAH BUKU BUKU 
$buku = $conn->query("UPDATE tb_buku SET jumlah_buku = (jumlah_buku + 1) WHERE judul='$idBuku' ");

if ($sql || $buku) {
  echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Buku Berhasil Dikembalikan!',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=transaksi'); 
            } ,3000); 
        </script>";
}
