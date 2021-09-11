<?php

session_start();

include('koneksi.php');



$id = (int) $_GET['id_pemasukan'];
$tgl = $_GET['tgl_pemasukan'];
$jumlah = abs((int) $_GET['jumlah']);
$sumber =$_GET['sumber'];
$iduser = $_GET['iduser'];

//query update
$query = mysqli_query($koneksi,"UPDATE pemasukan SET is_update='1', kt_update='Data Diubah' WHERE id_pemasukan='$id' ");

$query2 = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`tgl_pemasukan`, `id_user`, `jumlah`, `id_sumber` , `is_update` , `kt_update`) VALUES ('$tgl', '$iduser', '$jumlah', '$sumber','0','Data Baru Pengganti')");

$check=0;
if ($query2) {
$_SESSION['cekinput']="koreksi"; 
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
?>