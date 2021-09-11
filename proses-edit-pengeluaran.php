<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$id = $_GET['id_pengeluaran'];
$tgl = $_GET['tgl_pengeluaran'];
$jumlah = $_GET['jumlah'];
$sumber = $_GET['sumber'];
$keterangan = $_GET['keterangan'];
$iduser = $_GET['iduser'];

//query update
$query = mysqli_query($koneksi,"UPDATE belanja SET is_update='1', kt_update='Data Diubah' WHERE id_belanja='$id' ");

$query2 = mysqli_query($koneksi,"INSERT INTO `belanja` (`tgl_pengeluaran`, `jumlah`, `id_sumber`,`keterangan`, `id_user`, `is_update` , `kt_update`) VALUES ('$tgl', '$jumlah', '$sumber','$keterangan','$iduser' ,'0','Data Baru Pengganti')");

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
	
    echo "<script>window.location.href='pengeluaran.php';</script>";
    exit;

}

//mysql_close($host);
?>