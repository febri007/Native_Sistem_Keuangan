<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$tgl_pemasukan = $_GET['tgl_pemasukan'];
$jumlah = $_GET['jumlah'];
$sumber = $_GET['sumber'];
$iduser = $_GET['iduser'];
// $nmuser = $_GET['user'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`tgl_pemasukan`, `id_user`, `jumlah`, `id_sumber`) VALUES ('$tgl_pemasukan', '$iduser', '$jumlah', '$sumber')");

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
	
    echo "<script>window.location.href='pendapatan.php';</script>";
    exit;

}

//mysql_close($host);
?>