<?php
require 'cek-sesi.php';
?>
<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 14%;
		}
		p {
		    margin: 2;
		    padding: 2;
		}
		.laporan {
    font-weight: bold;
    color: #00F;
    font-size: 18px;
}
.laporan table tr th {
    color: #000;
}

.laporan table tr td {
    color: #000;
    font-weight: normal;
}

.laporan table {
    font-size: 14px;
}

/*.tandatangan{
    text-align:center; width:425px;float:left;
}

.tandatangan2{
    text-align:center; margin-left:545px;
}*/

.kop{
    text-align:center;
    margin-left:0px;
    width:270px;
    margin-bottom:-10px;
}
 body{
        font-size:11px;   
    }
    .tandatangan{
        text-align:center; width:325px;float:left;
    }
    .hrs{
    	 text-align:center; width:600px; margin-left:100px;
    }
    .tandatangan2{
        text-align:center; width:125px; margin-left:545px;
    }  
	</style>
</head>
<body><br><br><br>
	<div class="hrs">
		
	
	<p align="right" style="color: black; font-size: 11px;">Laporan pemasukan, <?=$_SESSION['nama']?> , <?php echo (new \DateTime())->format('d-m-Y:H:i:s');?></p></div>
	<br><br><p align="center" style="color: black; font-size: 18px;"><b>KUSUMA JAYA BATIK</b></p>
			<p align="center" style="color: black; font-size: 14px;">Desa Gendekan 02/09 Tlogoadi Mlati Sleman Yogyakarta 55284</p>
			<p align="center" style="color: black; font-size: 12px;">Telp : (0274) 44157 E-mail : kusumajayabatik@yahoo.co.id HP : (+62) 0877 0212 0111</p>
			<div class="hrs"><hr></div><br>
			<p style='text-align:center; font-size: 18px;'>Laporan Keuangan</p>
		<div style="position:relative;left:100px; margin-right:150px">
	<?php
	// Load file koneksi.php
	include "koneksi.php";

	

	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
		$filter = $_GET['filter']; // Ambil data filder yang dipilih user

		if($filter == '1'){ // Jika filter nya 1 (per tanggal)
			$tgl = date('d-m-y', strtotime($_GET['tanggal']));
			?>
			 <?php
			
			echo "Kepada :<br>";
			echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
			echo "Hal : Laporan Keuangan<br>";
			echo 'Ket : Laporan Hutang Tanggal '.$tgl.'<br /><br />';

			$query = "SELECT * FROM hutang WHERE DATE(tgl_hutang)='".$_GET['tanggal']."'"; 
			$query2 = "SELECT * FROM pembayaran_hutang inner join user inner join hutang WHERE pembayaran_hutang.id_user = user.id_user and user.id_user = pembayaran_hutang.id_user and hutang.id_hutang = pembayaran_hutang.id_hutang and pembayaran_hutang.id_hutang = hutang.id_hutang and  DATE(tanggal_byr)='".$_GET['tanggal']."'";// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
		}else if($filter == '2'){ // Jika filter nya 2 (per bulan)
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

			?>
			 <?php
			
			echo "Kepada :<br>";
			echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
			echo "Hal : Laporan Keuangan<br>";
			echo 'Ket : Laporan Hutang Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'<br /><br />';

			$query = "SELECT * FROM hutang WHERE MONTH(tgl_hutang)='".$_GET['bulan']."' AND YEAR(tgl_hutang)='".$_GET['tahun']."'"; 
			$query2 = "SELECT * FROM pembayaran_hutang inner join user inner join hutang WHERE pembayaran_hutang.id_user = user.id_user and user.id_user = pembayaran_hutang.id_user and hutang.id_hutang = pembayaran_hutang.id_hutang and pembayaran_hutang.id_hutang = hutang.id_hutang and  MONTH(tanggal_byr)='".$_GET['bulan']."' AND YEAR(tanggal_byr)='".$_GET['tahun']."'";// Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
		}else{ // Jika filter nya 3 (per tahun)
			?>
			 <?php
			
			echo "Kepada :<br>";
			echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
			echo "Hal : Laporan Keuangan<br>";
			echo 'Ket : Laporan Hutang Tahun '.$_GET['tahun'].'<br /><br />';

			$query = "SELECT * FROM hutang WHERE YEAR(tgl_hutang)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
		}
	}else{ // Jika user tidak memilih filter
		?>
			 <?php
			
			echo "Kepada :<br>";
			echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
			echo "Hal : Laporan Keuangan<br>";
			echo 'Ket : Semua Data Hutang<br /><br />';

		$query = "SELECT * FROM hutang ORDER BY tgl_hutang"; 
		$query2 = "SELECT * FROM pembayaran_hutang inner join user inner join hutang WHERE pembayaran_hutang.id_user = user.id_user and user.id_user = pembayaran_hutang.id_user and hutang.id_hutang = pembayaran_hutang.id_hutang and pembayaran_hutang.id_hutang = hutang.id_hutang ORDER BY tanggal_byr"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
	}
	?>
	<?php echo "Data Hutang : " ?><br><br>
	<table border="1" width="100%">
	<tr>
		<th style="text-align: center; width: 10%">  Penghutang </th>
		<th style="text-align: center; width: 10%"> Tanggal</th>
		<th style="text-align: center; width: 20%"> Terima <br> (Rp.)</th>
		<th style="text-align: center; width: 20%"> Wajib Bayar <br>(Rp.)</th>
		<th style="text-align: center; width: 15%"> Pembayaran <br>(Rp.)</th>
		<!-- <th style="text-align: center;">Sisa Tanggungan <br> (Rp.)</th> -->
		<th style="text-align: center; width: 5%">Status</th>
<!-- 		<th>Barang</th>
		<th>Jumlah</th>
		<th>Total Harga</th> -->
	</tr>

	<?php
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
	$ttl = 0;
	$dbyr = 0;
	$ttlhtg = 0;
	if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			// $tgl = date('d-m-Y', strtotime($data['tgl'])); // Ubah format tanggal jadi dd-mm-yyyy
			$tgl = date('d-m-Y', strtotime($data['tgl_hutang']));
			if ($data['jumlah']!=0) {
				# code...
			if ($data['is_updateh']!=1) {
			echo "<tr>";
			// echo "<td>".$tgl."</td>";
			echo "<td style='text-align : center;'>".$data['penghutang']."</td>";
			echo "<td style='text-align : center;'>".$tgl."</td>";
			echo "<td style='text-align : right;'>"."".number_format($data['terima'],2,',','.')."</td>";
			echo "<td style='text-align : right;'>"."".number_format($data['jumlah'],2,',','.')."</td>";
			echo "<td style='text-align : right;'>"."".number_format($data['dibayar'],2,',','.')."</td>";
			// echo "<td style='text-align : right;'>"."".number_format($data['jumlah']-$data['dibayar'],2,',','.')."</td>";
			echo "<td style='text-align : center;'>".$data['status']."</td>";
			// echo "<td>".$data['total_harga']."</td>";
			$ttl = $ttl + ($data['jumlah']);
			$dbyr = $dbyr + $data['dibayar'];
			echo "</tr>";
			}
		}

		}

	}else{ // Jika data tidak ada
		echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
	}
	// echo "Total Pemasukan = ".number_format($ttl,2,',','.') ."<br>";
 //        ?><br><?php
	?>
	</table>
	<br><br>
	<?php echo "Rincian Pembayaran Hutang :" ?>
	<br><br>
	<table border="1" width="1000px">
	<tr>
		<th style="text-align: center;">Penghutang</th>
		<th style="text-align: center;">Tanggal</th>
		<th style="text-align: center;">Bayar (Rp.)</th>
<!-- 		<th style="text-align: center;">Sisa Tanggungan</th> -->
		<th style="text-align: center;">Keterangan</th>
		<th style="text-align: center;">oleh</th>
<!-- 		<th>Barang</th>
		<th>Jumlah</th>
		<th>Total Harga</th> -->
	</tr>

	<?php
	$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query
	$row2 = mysqli_num_rows($sql2); // Ambil jumlah data dari hasil eksekusi $sql
	if($row2 > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
		while($data = mysqli_fetch_array($sql2)){ // Ambil semua data dari hasil eksekusi $sql
			// $tgl = date('d-m-Y', strtotime($data['tgl'])); // Ubah format tanggal jadi dd-mm-yyyy
			$tgl = date('d-m-Y', strtotime($data['tanggal_byr']));
			if ($data['jumlah']!=0) {
				# code...
			if ($data['is_updateh']!=1) {
			echo "<tr>";
			// echo "<td>".$tgl."</td>";
			echo "<td style='text-align : center;'>".$data['penghutang']."</td>";
			echo "<td style='text-align : center;'>".$tgl."</td>";
			echo "<td style='text-align : right;'>"."".number_format($data['dibayar_hutang'],2,',','.')."</td>";
			// echo "<td style='text-align : left;'>"."Rp. ".number_format($data['jumlah']-$data['dibayar_hutang'],2,',','.')."</td>";
			echo "<td style='text-align : center;'>".$data['keterangan_byrhutang']."</td>";
			echo "<td style='text-align : center;'>".$data['nama']."</td>";
			// echo "<td>".$data['total_harga']."</td>";
			// $ttl = $ttl + $data['jumlah'];
			// $dbyr = $dbyr + $data['dibayar'];
			echo "</tr>";
			}
		}

		}

	}else{ // Jika data tidak ada
		echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
	}
	// echo "Total Pemasukan = ".number_format($ttl,2,',','.') ."<br>";
 //        ?><br><?php
	?>
	</table>
	
		<br>
		<p>Laporan Keuangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya. Laporan ini dibuat oleh <?=$_SESSION['nama']?> pada tanggal <?php echo (new \DateTime())->format('d-m-Y');?> , dengan Total Wajib Bayar  Rp. <?php echo number_format($ttl,2,',','.') ?> . Total Pembayaran Rp.<?php echo number_format($dbyr,2,',','.') ?> . Sisa Hutang Rp. <?php echo number_format($ttl-$dbyr,2,',','.') ?> .</p>
	
<br><br></div>
<div class="tandatangan2">
    <br/>
    Sleman, <?php echo (new \DateTime())->format('d-m-Y');?><br>
    Mengetahui<br/><br/><br/><br/>
  <br />
<br/><hr/>
    Nur Alifah<br>
    Bag. Keuangan 
</div>

	

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Hutang.pdf', 'D');
?>
