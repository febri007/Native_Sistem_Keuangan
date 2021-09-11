<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$user = $_GET['iduser'];
$belanja = $_GET['belanja'];
$kegiatan = $_GET['kegiatan'];
$tanggal = $_GET['tanggal'];
$lokasi = $_GET['lokasi'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `kegiatan` (`id_user`, `id_belanja`, `nama_kegiatan`, `tanggal`, `lokasi` , `is_updatek`) VALUES ('$user', '$belanja', '$kegiatan', '$tanggal', '$lokasi' , '0')");
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
	
    echo "<script>window.location.href='kegiatan.php';</script>";
    exit;

}

//mysql_close($host);
?>