<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$nama = $_GET['nama'];
$username = $_GET['username'];
$password = md5($_GET['password']);
$no_tlp = $_GET['no_tlp'];
$jabatan = $_GET['jabatan'];
$alamat = $_GET['alamat'];
$email = $_GET['email'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `user` (`nama`, `username`, `password`, `no_tlp`, `jabatan`, `alamat` , `email`) VALUES ('$nama', '$username', '$password', '$no_tlp', '$jabatan', '$alamat' ,'$email')");

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
	
    echo "<script>window.location.href='karyawan.php';</script>";
    exit;

}
//mysql_close($host);/
?>