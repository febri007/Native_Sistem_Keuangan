<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();


$id = $_GET['id_user'];
$nama = $_GET['nama'];
$username = $_GET['username'];
$password = md5($_GET['password']);
$notlp = $_GET['telepon'];
$jabatan = $_GET['jabatan'];
$alamat = $_GET['alamat'];
$email = $_GET['email'];
$status = 0; $cekif = 0;

if ($_GET['password']==null) {
	$query = mysqli_query($koneksi,"UPDATE user SET jabatan='$jabatan' ,username='$username',nama='$nama'
	 , alamat='$alamat', no_tlp='$notlp', email='$email' WHERE id_user='$id' ");
}
if ($_GET['password']!=null) {
	$query = mysqli_query($koneksi,"UPDATE user SET jabatan='$jabatan' ,password='$password',username='$username',nama='$nama'
	 , alamat='$alamat', no_tlp='$notlp' , email='$email' WHERE id_user='$id' ");
}
		

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
	
    echo "<script>window.location.href='karyawan.php';</script>";
    exit;

}
 
?>