<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$id = $_GET['id_sumber'];
$nama = $_GET['nama_sumber'];


//query update
$query = mysqli_query($koneksi,"UPDATE sumber SET nama_sumber='$nama' WHERE id_sumber='$id' ");

$check=0;
if ($query) {
$_SESSION['cekinput']="koreksi"; 
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