<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$id = $_GET['id_user'];

//query update
// $query = mysqli_query($koneksi,"DELETE FROM `user` WHERE id_user = '$id'");
$query = mysqli_query($koneksi,"UPDATE user SET is_active='1' WHERE id_user='$id' ");
$check=0;
if ($query) {
$_SESSION['cekinput']="nonaktif"; 
$check=1;
	}
else{
  $_SESSION['cekinput']="gagal"; 
  $check=1;
}

if ($check==1) {
	
    echo "<script>window.location.href='karyawan.php';</script>";
    exit;

}

//mysql_close($host);
?> 