<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$nama = $_GET['nama_sumber'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `sumber` (`nama_sumber`) VALUES ('$nama')");

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
	
    echo "<script>window.location.href='sumber.php';</script>";
    exit;

}
//mysql_close($host);
?>