<?php
//include('dbconnected.php');
include('koneksi.php');
session_start();

$jumlah = $_GET['jumlah'];
$terima = $_GET['terima'];
$tgl_hutang = $_GET['tgl_hutang'];
$penghutang = $_GET['penghutang'];
$alasan = $_GET['alasan'];
$user = $_SESSION['id'];
$id_sumber = 2;
$buatkodehutang = "HTG-SYS-".$_GET['jumlah'].$_GET['alasan'].$_GET['penghutang'].$_GET['tgl_hutang'];


//query update
$query = mysqli_query($koneksi,"INSERT INTO `hutang` (`terima`,`jumlah`, `tgl_hutang`, `alasan`, `penghutang` , `status`, `is_updateh`) VALUES ('$terima','$jumlah', '$tgl_hutang', '$alasan','$penghutang' ,'Dalam Cicilan','0')");

//menambahkan ke pendapatan sebagai hutang
$query2 = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`tgl_pemasukan`, `id_user`, `jumlah`, `id_sumber` , `is_update` , `is_kdhutang`) VALUES ('$tgl_hutang', '$user', '$terima', '$id_sumber' , '0','$buatkodehutang')");

$check=0;
if ($query2) {
$_SESSION['cekinput']="masuk"; 
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