<?php
error_reporting(0);
// CONNECT KE DATABASE
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
<h1>Laporan Data Transaksi</h1>
<br>
<table border="1px" class="tabel"  >
<tr>
<th>No </th>
<th>Judul</th>
<th>NIM</th>
<th>Nama</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>

</tr>';

if (isset($_POST['cetak'])) {



	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];



	$no = 1;
	$sql = $koneksi->query("select * from tb_transaksi where tgl_input between '$tgl1' and '$tgl2' ");
	while ($cetak = $sql->fetch_assoc()) {
		$judulbuku = $koneksi->query('SELECT judul FROM tb_buku WHERE id=$cetak->judul');
		$content .= '
			<tr>
				<td align="center">' . $no++ . '</td>
				<td align="center">' . $cetak['judul'] . '</td>
				<td align="center">' . $cetak['nim'] . '</td>
				<td align="center">' . $cetak['nama'] . '</td>
				<td align="center">' . $cetak['tgl_pinjam'] . '</td>
				<td align="center">' . $cetak['tgl_kembali'] . '</td>
				<td align="center">' . $cetak['status'] . '</td>
			</tr>
		';
	}
} else {

	$no = 1;

	$sql = $koneksi->query("select * from tb_transaksi");
	while ($cetak = $sql->fetch_assoc()) {
		$content .= '
		<tr>
			<td align="center">' . $no++ . '</td>
			<td align="center">' . $cetak['judul'] . '</td>
			<td align="center">' . $cetak['nim'] . '</td>
			<td align="center">' . $cetak['nama'] . '</td>
			<td align="center">' . $cetak['tgl_pinjam'] . '</td>
			<td align="center">' . $cetak['tgl_kembali'] . '</td>
			<td align="center">' . $cetak['status'] . '</td>
		</tr>
	';
	}
}

$content .= '


</table>
</page>';

// PRINT PDF
require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('transaksiperpus.pdf');
