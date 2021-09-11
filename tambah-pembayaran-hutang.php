<?php
session_start();

//include('dbconnected.php');
include('koneksi.php');

$hutang = $_GET['hutang'];

//mendapatkan data bayar terakhir hutang
$my_id_query=mysqli_query($koneksi,"SELECT `dibayar`, `jumlah` FROM `hutang` WHERE (`id_hutang`='$hutang')"); 
$my_id_array=mysqli_fetch_assoc($my_id_query);
$htg=$my_id_array['dibayar'];
$htg2=$my_id_array['dibayar'];
$iduser=$_SESSION['id'];


// echo "$total";
$tanggal_byr = $_GET['tanggal_byr'];
$bayar = $_GET['bayar'];
$keterangan = $_GET['keterangan'];

//menjumlahkan total hutang
$total = $bayar + $htg;
$total2 = $bayar + $htg;
//proses mengecek apakah hutang lunas
// $my_id_query2=mysqli_query($koneksi,"SELECT `jumlah` FROM `hutang` WHERE (`id_hutang`='$hutang')");
// $my_id_arra2y=mysqli_fetch_assoc($my_id_query2);
// $hitungjumlahhutang=$my_id_array2['jumlah'];





//query update
$query = mysqli_query($koneksi,"INSERT INTO `pembayaran_hutang` (`id_hutang`, `tanggal_byr`, `dibayar_hutang`, `keterangan_byrhutang`, `is_updatebh`, `id_user`) VALUES ('$hutang', '$tanggal_byr', '$bayar','$keterangan','0','$iduser')");

$query2 = mysqli_query($koneksi,"UPDATE hutang SET dibayar='$total2' WHERE id_hutang='$hutang' ");
// $cek = $total - $hitungjumlahhutang;
// $noll = 0;

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
	
    echo "<script>window.location.href='bayar-hutang.php';</script>";
    exit;

}

//mysql_close($host);
?>