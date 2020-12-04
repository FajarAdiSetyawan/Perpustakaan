<?php
// MENGAMBIL ID DARI DATA YG DIPILIH
$nim = $_GET["id"];
if (hapusAnggota($nim) > 0) {
  echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success Hapus Data!',
                icon: 'success',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=anggota'); 
            } ,3000); 
        </script>";
} else {
  echo "<script>
            alert('data GAGAL dihapus!');
            document.location.href = 'dashboard.php';
          </script>";
}
