<?php
//include('dbconnected.php');
session_start();
include('koneksi.php');

$id = $_GET['id_hutang'];
$terima = $_GET['terima'];
$jumlah = $_GET['jumlah'];
$tgl = $_GET['tgl_hutang'];
$alasan = $_GET['alasan']; 
$penghutang = $_GET['penghutang'];
$dibayar = $_GET['dibayar'];
$id_sumber = 2;
$user = $_SESSION['id'];
$buatkodehutang = "HTG-SYS-".$_GET['jumlah'].$_GET['alasan'].$_GET['penghutang'].$_GET['tgl_hutang'];
$kodehutang = "HTG-SYS-".$_GET['jumlahID'].$_GET['alasanID'].$_GET['penghutangID'].$_GET['tgl_hutangID'];

//query update
$query = mysqli_query($koneksi,"UPDATE hutang SET is_updateh='1' WHERE id_hutang='$id' ");
$query2 = mysqli_query($koneksi,"INSERT INTO `hutang` (`terima`,`jumlah`, `tgl_hutang`, `alasan`, `penghutang` , `status`, `is_updateh` , `dibayar`) VALUES ('$terima','$jumlah', '$tgl', '$alasan','$penghutang' ,'Dalam Cicilan','0','$dibayar')");
$query3 = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`tgl_pemasukan`, `id_user`, `jumlah`, `id_sumber` , `is_update`, `is_kdhutang`) VALUES ('$tgl', '$user', '$terima', '$id_sumber' , '0', '$buatkodehutang')");
$query4 = mysqli_query($koneksi,"UPDATE pemasukan SET is_update='1' WHERE is_kdhutang='$kodehutang' ");

//jika benar

$namaadmin = $_SESSION['nama'];


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
	
    echo "<script>window.location.href='hutang.php';</script>";
    exit;

}
//mysql_close($host);
?>