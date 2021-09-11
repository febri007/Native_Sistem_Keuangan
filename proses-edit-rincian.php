<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();
$id = $_GET['id_detail'];
$tgl = $_GET['tanggal'];
$keperluan = $_GET['kd_detail'];
$nama = $_GET['nama'];
$pengeluaran = $_GET['pengeluaran'];
$keterangan = $_GET['keterangan'];
$user = $_SESSION['id'];

//query update
$query = mysqli_query($koneksi,"UPDATE detail SET is_update='1', kt_update='Data Diubah' WHERE id_detail='$id' ");

$query2 = mysqli_query($koneksi,"INSERT INTO `detail` (`tanggal`, `kd_detail`, `nama`,`pengeluaran`, `keterangan`, `id_user`, `is_update`, `kt_update`) VALUES ('$tgl','$keperluan', '$nama', '$pengeluaran','$keterangan','$user' ,'0','Data Baru Pengganti')");

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
	
    echo "<script>window.location.href='rincian.php';</script>";
    exit;

}

//mysql_close($host);
?>