<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$id = $_GET['id_user'];

//query update
// $query = mysqli_query($koneksi,"DELETE FROM `user` WHERE id_user = '$id'");
$query = mysqli_query($koneksi,"UPDATE user SET is_hidden='1' WHERE id_user='$id' ");
if ($query) {
 # credirect ke page index
 header("location:karyawan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

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
	
    echo "<script>window.location.href='karyawan.php';</script>";
    exit;

}
//mysql_close($host);
?> 