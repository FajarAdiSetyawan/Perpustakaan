<?php
// MENAMPIKAN PESAN ERROR
error_reporting(E_ALL);
ini_set('display_errors', '1');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";
// KONEKSI KE DATABASE
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambahBuku($data)
{
  global $conn;

  // ambil data dari form
  $judul = htmlspecialchars($data["judulBuku"]);
  $pengarang = htmlspecialchars($data["pengarang"]);
  $penerbit = htmlspecialchars($data["penerbit"]);
  $tahun_terbit = htmlspecialchars($data["tahunTerbit"]);
  $isbn = htmlspecialchars($data["isbn"]);
  $jumlah_buku = htmlspecialchars($data["jmlBuku"]);
  $lokasi = htmlspecialchars($data["lokasiRak"]);

  // mengambil waktu sesuai timezone
  $timezone = new DateTimeZone('Asia/Jakarta');
  $tgl_input = new DateTime();
  $tgl_input->setTimeZone($timezone);
  $tgl_input = date("Y-m-d H:i:s");

  // upload gambar dulu0
  $gambar = uploadBuku();

  if (!$gambar) {
    return false;
  }

  // query insert data / memasukkan data ke database
  $query = "INSERT INTO tb_buku VALUE 
            ('', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah_buku', '$lokasi', '$tgl_input', '$gambar')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function uploadBuku()
{
  $namaFile = $_FILES['gambar']['name'];
  $sizeFile = $_FILES['gambar']['size'];
  $errorFile = $_FILES['gambar']['error'];
  $tmpFile = $_FILES['gambar']['tmp_name'];

  // cek gambar diupload
  if ($errorFile === 4) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'ERROR!',
                text: 'Yang Anda Pilih Bukan Gambar!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=buku&aksi=tambah'); 
            } ,3000); 
        </script>";
    return false;
  }

  // cek ekstensi file
  $ekstensiFile = ['jpg', 'jpeg', 'png'];
  $cekekstensi = explode('.', $namaFile); // xxx.png = ['xxx', 'png']
  $cekekstensi = strtolower(end($cekekstensi)); // huruf kecil, menggambil ekstensi file
  if (!in_array($cekekstensi, $ekstensiFile)) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'ERROR!',
                text: 'Yang Anda Pilih Bukan Gambar!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=buku&aksi=tambah'); 
            } ,3000); 
        </script>";
    return false;
  }

  // cek size
  if ($sizeFile > 1000000) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'ERROR!',
                text: 'File yang anda pilih terlalu besar (max 10MB)!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=buku&aksi=tambah'); 
            } ,3000); 
        </script>";
    return false;
  }

  //buat nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $cekekstensi;

  // gambar diupload
  move_uploaded_file($tmpFile, 'assets/image/buku/' . $namaFileBaru);
  return $namaFileBaru;
}


function editBuku($data)
{
  global $conn;

  // ambil data dari form
  $id = $data["id"];
  $judul = htmlspecialchars($data["judulBuku"]);
  $pengarang = htmlspecialchars($data["pengarang"]);
  $penerbit = htmlspecialchars($data["penerbit"]);
  $tahun_terbit = htmlspecialchars($data["tahunTerbit"]);
  $isbn = htmlspecialchars($data["isbn"]);
  $jumlah_buku = htmlspecialchars($data["jmlBuku"]);
  $lokasi = htmlspecialchars($data["lokasiRak"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);


  //cek user pilih gambar baru
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = uploadBuku();
  }

  // query update data
  $query = "UPDATE tb_buku SET  
            judul = '$judul', 
            pengarang = '$pengarang', 
            penerbit = '$penerbit', 
            tahun_terbit = '$tahun_terbit',
            isbn = '$isbn',
            jumlah_buku = '$jumlah_buku', 
            lokasi = '$lokasi',
            gambar = '$gambar' 
            WHERE id = $id";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function hapusBuku($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_buku WHERE id = $id");
  return mysqli_affected_rows($conn);
}

// END OF BOOK //

/**  ===================================================== **/

/**  ANGGOTA **/
function tambahAnggota($data)
{
  global $conn;

  // ambil data dari form
  $nim = htmlspecialchars($data["nim"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $no_tlp = htmlspecialchars($data["no_tlp"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $gender = htmlspecialchars($data["gender"]);
  $prodi = htmlspecialchars($data["prodi"]);

  $timezone = new DateTimeZone('Asia/Jakarta');
  $tgl_input = new DateTime();
  $tgl_input->setTimeZone($timezone);
  $tgl_input = date("Y-m-d H:i:s");



  // query insert data
  $query = "INSERT INTO tb_anggota VALUE 
            ('$nim', '$nama', '$email', '$no_tlp', '$alamat', '$gender', '$prodi', '$tgl_input')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}




function editAnggota($data)
{
  global $conn;

  // ambil data dari form
  $nim = $data["nim"];
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $no_telp = htmlspecialchars($data["no_telp"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $prodi = htmlspecialchars($data["prodi"]);
  $gender = htmlspecialchars($data["gender"]);


  // query update data
  $query = "UPDATE tb_anggota SET  
            nama_lengkap = '$nama', 
            email = '$email', 
            no_telp = '$no_telp', 
            alamat = '$alamat',
            prodi = '$prodi',
            gender = '$gender', 
            WHERE nim = $nim";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function hapusAnggota($nim)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_anggota WHERE nim = $nim");
  return mysqli_affected_rows($conn);
}

// END OF ANGGOTA //

/**  ===================================================== **/

// TRANSAKSI //
function terlambat($tgl_dateline, $tgl_kembali)
{

  $tgl_dateline_pcs = explode("-", $tgl_dateline);
  $tgl_dateline_pcs = $tgl_dateline_pcs[2] . "-" . $tgl_dateline_pcs[1] . "-" . $tgl_dateline_pcs[0];

  $tgl_kembali_pcs = explode("-", $tgl_kembali);
  $tgl_kembali_pcs = $tgl_kembali_pcs[2] . "-" . $tgl_kembali_pcs[1] . "-" . $tgl_kembali_pcs[0];

  $selisih = strtotime($tgl_kembali_pcs) - strtotime($tgl_dateline_pcs);

  $selisih = $selisih / 86400;

  if ($selisih >= 1) {
    $hasil_tgl = floor($selisih);
  } else {
    $hasil_tgl = 0;
  }
  return $hasil_tgl;
}

function tambahTransaksi($data)
{
  global $conn;

  // ambil data dari form
  $buku = isset($_POST['judul']) ? $_POST['judul'] : "";
  $anggota = isset($_POST['nama']) ? $_POST['nama'] : "";
  $tglPinjam = htmlspecialchars($data["tglPinjam"]);
  $tglKembali = htmlspecialchars($data["tglKembali"]);

  $pecahBuku  = explode(".", $buku);
  $idBuku = $pecahBuku[0];
  $judulBuku  = $pecahBuku[1];

  $pecahAnggota = explode(".", $anggota);
  $nimAnggota = $pecahAnggota[0];
  $namaAnggota = $pecahAnggota[1];

  $query = $conn->query("SELECT * FROM tb_buku WHERE judul = '$judulBuku'");
  while ($hasil = $query->fetch_assoc()) {
    $sisa = $hasil['jumlah_buku'];

    //cek data yang duplikate
    $cek = $conn->query("SELECT * FROM tb_transaksi WHERE nim=$nimAnggota AND id=$idBuku");
    $num1 = mysqli_num_rows($cek);

    if ($sisa == 0) {
      echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'ERROR!',
                text: 'Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=transaksi&aksi=tambah'); 
            } ,3000); 
        </script>";
    } elseif (!$num1) {
      // query insert data
      $query = "INSERT INTO tb_transaksi VALUE 
            (null, 
            '$idBuku', 
            '$judulBuku', 
            '$nimAnggota', 
            '$namaAnggota', 
            '$tglPinjam', 
            '$tglKembali',
            'Pinjam', 
            null)";
      mysqli_query($conn, $query);
      return mysqli_affected_rows($conn);

      $kurangiBuku  = $conn->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku - 1) WHERE id=$idBuku ");

      if ($query && $kurangiBuku) {
        echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Success Tambah Data!',
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
                title: 'ERROR!',
                text: 'Transaksi GAGAL!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=transaksi&aksi=tambah'); 
            } ,3000); 
        </script>";
      }
    } else {
      echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'ERROR!',
                text: 'Anda sudah meminjam buku yang sama!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('dashboard.php?page=transaksi&aksi=tambah'); 
            } ,3000); 
        </script>";
    }
  }
}


// END OF TRANSAKSI //

/**  ===================================================== **/


function editProfile($data)
{
  global $conn;
  $id = $data["id"];
  $email = htmlspecialchars($data["email"]);
  $nama = htmlspecialchars($data["nama"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confpass = mysqli_real_escape_string($conn, $data["confpass"]);

  $resultEmail = mysqli_query($conn, "SELECT email FROM tb_user WHERE email = '$email'");
  if (mysqli_fetch_assoc($resultEmail)) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Error Email Sudah Terdaftar!',
                text: '$email',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace(dashboard.php?page=profile&aksi=edit'); 
            } ,3000); 
        </script>";
    return false;
  }


  if (!empty($password) && !empty($confpass)) {
    // cek pass
    if ($password == $confpass) {
      // enkripsi password
      $password = password_hash($password, PASSWORD_DEFAULT);
      $id = $data["id"];
      // query update data
      $query = "UPDATE tb_user SET  
            nama_lengkap = '$nama', 
            email = '$email', 
            password = '$password'
            WHERE id = $id";

      mysqli_query($conn, $query);
      return mysqli_affected_rows($conn);
    } else {
      echo
        "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Password Salah!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace(dashboard.php?page=profile&aksi=edit'); 
            } ,3000); 
        </script>";
      return false;
    }
  }
}
// END OF PROFILE //

/**  ===================================================== **/

// REGISTRASI

function registrasi($data)
{
  global $conn;
  $email = htmlspecialchars($data["email"]);
  $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confpass = mysqli_real_escape_string($conn, $data["confpass"]);

  // cek email sudah ada / belum
  $resultEmail = mysqli_query($conn, "SELECT email FROM tb_user WHERE email = '$email'");
  if (mysqli_fetch_assoc($resultEmail)) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Error Email Sudah Terdaftar!',
                text: '$email',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('register.php'); 
            } ,3000); 
        </script>";
    return false;
  }


  // cek pass
  if ($password !== $confpass) {
    echo
      "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Password Salah!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('register.php'); 
            } ,3000); 
        </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // masuk ke db
  mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$nama_lengkap', '$email', '$password', 'user', 'iconuser.png')");
  return mysqli_affected_rows($conn);
}

// END OF REGISTRASI USER //

/**  ===================================================== **/

// REGISTRASI ADMIN //

function registrasiAdmin($data)
{
  global $conn;

  $email = htmlspecialchars($data["email"]);
  $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confpass = mysqli_real_escape_string($conn, $data["confpass"]);

  // cek email sudah ada / belum
  $resultEmail = mysqli_query($conn, "SELECT email FROM tb_user WHERE email = '$email'");
  if (mysqli_fetch_assoc($resultEmail)) {
    echo "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Error Email Sudah Terdaftar!',
                text: '$email',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('registeradmin.php'); 
            } ,3000); 
        </script>";
    return false;
  }


  // cek pass
  if ($password !== $confpass) {
    echo
      "<script type='text/javascript'> 
            setTimeout(function () { 
              swal({ 
                title: 'Password Salah!',
                icon: 'error',
                timer: 3000, 
                showConfirmButton: true 
              }); 
            },10); 
            window.setTimeout(function(){ window.location.replace('registeradmin.php'); 
            } ,3000); 
        </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // masuk ke db
  mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$nama_lengkap', '$email', '$password', 'admin', 'iconuser.png')");
  return mysqli_affected_rows($conn);
}


// END OF REGISTRASI ADMIN //

/**  ===================================================== **/
