<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$tgl_pengeluaran = $_GET['tgl_pengeluaran'];
$jumlah = $_GET['jumlah'];
$sumber = $_GET['sumber'];
$keterangan = $_GET['keterangan'];
$iduser = $_GET['iduser'];
//query update
$query = mysqli_query($koneksi,"INSERT INTO `belanja` (`tgl_pengeluaran`, `jumlah`, `id_sumber`,`keterangan`, `id_user`, `is_update`) VALUES ('$tgl_pengeluaran', '$jumlah', '$sumber','$keterangan','$iduser' ,'0')");

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
	
    echo "<script>window.location.href='pengeluaran.php';</script>";
    exit;

}

//mysql_close($host);
?>