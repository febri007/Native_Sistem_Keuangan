<?php
session_start();

include('koneksi.php');



$id =  $_GET['id_kegiatan'];
$iduser =  $_GET['iduser'];
$belanja =  $_GET['belanja'];
$tanggal = $_GET['tanggal'];
$lokasi = $_GET['lokasi'];
$kegiatan = $_GET['kegiatan'];
 
//query update
$query = mysqli_query($koneksi,"UPDATE kegiatan SET is_updatek='1' WHERE id_kegiatan='$id'");

$query2 = mysqli_query($koneksi,"INSERT INTO `kegiatan` (`id_user`, `id_belanja`, `nama_kegiatan`, `tanggal`, `lokasi` , `is_updatek`) VALUES ('$iduser', '$belanja', '$kegiatan', '$tanggal', '$lokasi' , '0')");
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
	
    echo "<script>window.location.href='kegiatan.php';</script>";
    exit;

}
?>