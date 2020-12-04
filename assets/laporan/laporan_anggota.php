<?php
error_reporting(0);
$koneksi = new mysqli("localhost", "root", "", "perpustakaan");
$content = '

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
</style>


';


$content .= '
<page>
<h1>Laporan Data Anggota</h1>
<br>
<table border="1px" class="tabel"  >
<tr>
<th>No </th>
<th>NIM</th>
<th>Nama</th>
<th>email</th>
<th>No Telepon</th>
<th>Alamat</th>
<th>Jenis Kelamin</th>
<th>Prodi</th>

</tr>';

if (isset($_POST['cetak'])) {



	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];



	$no = 1;
	$sql = $koneksi->query("select * from tb_anggota where tgl_input between '$tgl1' and '$tgl2' ");
	while ($cetak = $sql->fetch_assoc()) {

		$content .= '
		<tr>
			<td align="center">' . $no++ . '</td>
			<td align="center">' . $cetak['nim'] . '</td>
			<td align="center">' . $cetak['nama_lengkap'] . '</td>
			<td align="center">' . $cetak['email'] . '</td>
			<td align="center">' . $cetak['no_telp'] . '</td>
			<td align="center">' . $cetak['alamat'] . '</td>
			<td align="center">' . $cetak['gender'] . '</td>
			<td align="center">' . $cetak['prodi'] . '</td>
		</tr>
	';
	}
} else {

	$no = 1;

	$sql = $koneksi->query("select * from tb_anggota");
	while ($cetak = $sql->fetch_assoc()) {
		$content .= '
		<tr>
			<td align="center">' . $no++ . '</td>
			<td align="center">' . $cetak['nim'] . '</td>
			<td align="center">' . $cetak['nama_lengkap'] . '</td>
			<td align="center">' . $cetak['email'] . '</td>
			<td align="center">' . $cetak['no_telp'] . '</td>
			<td align="center">' . $cetak['alamat'] . '</td>
			<td align="center">' . $cetak['gender'] . '</td>
			<td align="center">' . $cetak['prodi'] . '</td>
		</tr>
	';
	}
}


$content .= '


</table>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('anggotaperpus.pdf');
