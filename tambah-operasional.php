<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();

$biayaperbaikan = $_GET['biayaperbaikan'];
$biayaperawatan = $_GET['biayaperawatan'];
$gajikaryawan = $_GET['gajikaryawan'];
$tanggal = $_GET['tanggal'];
$tanggal2 = $_GET['tanggal2'];
$keterangan = $_GET['keterangan'];
$pajak = $_GET['pajak'];
$lain = $_GET['lainlain'];
$id_user = $_GET['iduser'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `operasional` (`biaya_perbaikan`, `gaji_karyawan`, `biaya_perawatan`, `tanggalawal`, `tanggalakhir`, `keterangan` , `pajak` , `id_user` , `lainlain` , `is_update`) VALUES ('$biayaperbaikan', '$gajikaryawan', '$biayaperawatan', '$tanggal', '$tanggal2', '$keterangan' ,'$pajak' ,'$id_user','$lain','0')");

$check=0;
if ($query) {
$_SESSION['cekinput']="masuk"; 
$check=1;
	}
else{
  $_SESSION['cekinput']="gagal"; 
  $check=1;
}

if ($check==1) {
	
    echo "<script>window.location.href='operasional.php';</script>";
    exit;

}

//mysql_close($host);
?>