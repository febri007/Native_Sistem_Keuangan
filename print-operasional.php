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
			table-layout:fixed;width: 530px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
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
			$tgl = date('d-m-Y', strtotime($_GET['tanggal']));
			?>
			 <?php
			echo "Kepada :<br>";
			echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
			echo "Hal : Laporan Keuangan<br>";
			echo 'Ket : Laporan Operasional Tanggal '.$tgl.'<br /><br />';

			$query = "SELECT * FROM operasional WHERE DATE(tanggalawal)='".$_GET['tanggal']."' "; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
		}else if($filter == '2'){ // Jika filter nya 2 (per bulan)
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

			?>
			 <?php
			echo "Kepada :<br>";
			echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
			echo "Hal : Laporan Keuangan<br>";
			echo 'Ket : Laporan Operasional Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'<br /><br />';

			$query = "SELECT * FROM operasional WHERE MONTH(tanggalawal)='".$_GET['bulan']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
		}else{ // Jika filter nya 3 (per tahun)
			?>
			 <?php
			echo "Kepada :<br>";
			echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
			echo "Hal : Laporan Keuangan<br>";
			echo 'Ket : Laporan Operasional Tahun '.$_GET['tahun'].'<br /><br />';

			$query = "SELECT * FROM operasional WHERE YEAR(tanggalawal)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
		}
	}else{ // Jika user tidak memilih filter
		?>
			 <?php
			echo "Kepada :<br>";
			echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
			echo "Hal : Laporan Keuangan<br>";
			echo 'Ket : Semua Data Operasional<br /><br />';

		$query = "SELECT * FROM operasional ORDER BY tanggalawal"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
	}
	?>

	<?php echo "Biaya Operasional :" ?><br><br>
	<table border="1">
	<tr>
		
		<th style="text-align: center; width: 10%;">Tanggal</th>
		<th style="text-align: center; width: 10%;">Keperluan</th>
		<th style="text-align: center; width: 20%;">Pengeluaran <br> (Rp.)<br><br></th>
		<th style="text-align: center; width: 60%;">Keterangan</th>
<!-- 		<th style="text-align: center; width: 30%;">Oleh</th> -->
<!-- 		<th>Barang</th>
		<th>Jumlah</th>
		<th>Total Harga</th> -->
	</tr>

	<?php
	$awal=0;
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
	$ttl = 0;
	if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			if ($awal==0) {
                $tglawal = $data['tanggalawal'];
               $awal =  date('d-M-Y', strtotime($data['tanggalawal']));
            }
            $tglakhir =  $data['tanggalakhir'];
			$tgl = date('d-m-Y', strtotime($data['tanggalawal']));
			if ($data['is_update']!=1) {
			echo "<tr>";
			// echo "<td>".$tgl."</td>";
			echo "<td style='text-align : center;'>".$tgl."</td>";
			echo "<td style='text-align : left;'>"."".
			"Biaya Perbaikan"."<br>".
			"Gaji Karyawan"."<br>".
			"Biaya Perawatan"."<br>".
			"Pajak"."<br>"."Lain - Lain"."<br></td>";
			echo "<td style='text-align : right;'>"."".
			number_format($data['biaya_perbaikan'],2,',','.')."<br>".
			number_format($data['gaji_karyawan'],2,',','.')."<br>".
			number_format($data['biaya_perawatan'],2,',','.')."<br>".
			number_format($data['pajak'],2,',','.')."<br>".
			number_format($data['lainlain'],2,',','.')."<br>"."<br></td>";

			// echo "<td style='text-align : right;'>"."".number_format($data['gaji_karyawan'],2,',','.')."</td>";
			// echo "<td style='text-align : right;'>"."".number_format($data['biaya_perawatan'],2,',','.')."</td>";
			// echo "<td style='text-align : right;'>"."".number_format($data['pajak'],2,',','.')."</td>";
			// echo "<td style='text-align : right;'>"."".number_format($data['lainlain'],2,',','.')."</td>";
			echo "<td style='text-align : center;'>".$data['keterangan']."</td>";
			// echo "<td style='text-align : center;'>".$data['nama']."</td>";
			// echo "<td>".$data['total_harga']."</td>";
			// $ttl = $ttl + $data['jumlah'];
			echo "</tr>";
}
		}

	}else{ // Jika data tidak ada
		echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
	}
	// echo "Total Pemasukan = ".number_format($ttl,2,',','.') ."<br>";
 //        ?><br><?php
	?>
	</table>
	<br><br><?php echo "Rincian Pengeluaran :" ?><br><br>
	<table border="1">
	<tr>
		
		<th style="text-align: center;">Rincian</th>
		<th style="text-align: center;">Tanggal</th>
		
		<th style="text-align: center;">Nama / Keperluan</th>
		<th style="text-align: center;">Pengeluaran <br> (Rp.)</th>
		<th style="text-align: center;">Keterangan</th>
		<th style="text-align: center;">Oleh</th>
	</tr>

	<?php
	$query =  "select detail.id_detail as id_detail , detail.kd_detail as kd_detail, detail.tanggal as tanggal , detail.nama as nama, detail.pengeluaran as pengeluaran, detail.keterangan as keterangan ,  detail.id_user as id_user,  detail.is_update as is_update, user.nama as usernama FROM detail inner join user where (tanggal between '".$tglawal."' and '".$tglakhir."') AND detail.id_user = user.id_user and user.id_user = detail.id_user order by tanggal desc ";
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
	$ttl = 0;
	if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql

			$tgl = date('d-m-Y', strtotime($data['tanggal']));
			if ($data['is_update']!=1) {
			echo "<tr>";
            if ($data['kd_detail']==1) {
              echo "<td>"."Perbaikan"."</td>";
            }
            if ($data['kd_detail']==2) {
              echo "<td>"."Gaji Karyawan"."</td>";
            }
            if ($data['kd_detail']==3) {
              echo "<td>"."Biaya Perawatan"."</td>";
            }
            if ($data['kd_detail']==4) {
              echo "<td>"."Pajak"."</td>";
            }
            if ($data['kd_detail']==5) {
              echo "<td>"."Lain Lain"."</td>";
            }
			echo "<td style='text-align : center;'>".$tgl."</td>";
			echo "<td style='text-align : left;'>"."".$data['nama']."</td>";
			echo "<td style='text-align : right;'>"."".number_format($data['pengeluaran'],2,',','.')."</td>";
			echo "<td style='text-align : left;'>"."".$data['keterangan']."</td>";
			echo "<td style='text-align : left;'>"."".$data['usernama']."</td>";
			echo "</tr>";
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
		<p>Laporan Keuangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya. Laporan ini dibuat oleh <?=$_SESSION['nama']?> pada tanggal <?php echo (new \DateTime())->format('d-m-Y');?></p>
	
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
$pdf->Output('Laporan Operasional.pdf', 'D');
?>
