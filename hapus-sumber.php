<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$id = $_GET['id_sumber'];

//query update
$query = mysqli_query($koneksi,"DELETE FROM `sumber` WHERE id_sumber = '$id'");

$check=0;
if ($query) {
$_SESSION['cekinput']="hapus"; 
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