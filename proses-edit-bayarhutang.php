<?php
//include('dbconnected.php');
session_start();
include('koneksi.php');
$id = $_GET['id_pembayaranhutang'];

//mendapatkan id_hutang
$my_id_query=mysqli_query($koneksi,"SELECT `id_hutang` FROM `pembayaran_hutang` WHERE (`id_pembayaranhutang`='$id')"); 
$my_id_array=mysqli_fetch_assoc($my_id_query);
$hid=$my_id_array['id_hutang'];

//mendapatkan data jumlah hutang
$my_id_query2=mysqli_query($koneksi,"SELECT `dibayar` , `status` , `jumlah`  FROM `hutang` WHERE (`id_hutang`='$hid')"); 
$my_id_array2=mysqli_fetch_assoc($my_id_query2);
$dbyr=$my_id_array2['dibayar'];
$status=$my_id_array2['status'];
$jmll=$my_id_array2['jumlah'];

//mengecek jumlah pembayaran hutang sebelumnya dan menguranginya dengan fieldaslinya
$my_id_query3=mysqli_query($koneksi,"SELECT `dibayar_hutang` FROM `pembayaran_hutang` WHERE (`id_pembayaranhutang`='$id')"); 
$my_id_array3=mysqli_fetch_assoc($my_id_query3);
$dibayarhtg=$my_id_array3['dibayar_hutang'];
//proses pengurangan

$pengurangan = $dbyr-$dibayarhtg ;
$query2 = mysqli_query($koneksi,"UPDATE hutang SET dibayar='$pengurangan' WHERE id_hutang='$hid' ");


//berarti jumlah dibayar sebelumnya dikurangi jumlah dibayar dri tb hutang
//akhir

//baru kemudian mengeksekusi data edit dan menambahkan hasil editan ke tb hutang

// $id = $_GET['id_hutang'];
$hutang = $_GET['hutang'];
$tgl_bayar = $_GET['tgl_bayar'];
$dibayar = $_GET['dibayar'];
$keterangan = $_GET['keterangan'];
$iduser = $_SESSION['id'];

//update tabel hutang untuk menyesuaikan jumlah sesuai editan
$pengurangan = $dibayar+$pengurangan ;
$query2 = mysqli_query($koneksi,"UPDATE hutang SET dibayar='$pengurangan' WHERE id_hutang='$hid' ");
// echo "Jumlah : ".$pengurangan;
// //query update
$query22 = mysqli_query($koneksi,"UPDATE pembayaran_hutang SET is_updatebh='1' WHERE id_pembayaranhutang='$id' ");

$query = mysqli_query($koneksi,"INSERT INTO `pembayaran_hutang` (`id_hutang`, `tanggal_byr`, `dibayar_hutang`, `keterangan_byrhutang`, `is_updatebh`, `id_user`) VALUES ('$hid', '$tgl_bayar', '$dibayar','$keterangan','0','$iduser')");


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
	
    echo "<script>window.location.href='bayar-hutang.php';</script>";
    exit;

}

//mysql_close($host);
?>