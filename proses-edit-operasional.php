<?php
session_start();

include('koneksi.php');



$id =  $_GET['id_operasional'];
// $perbaikan = abs((int) $_GET['perbaikan']);
// $gaji = abs((int) $_GET['gaji']);
// $perawatan =abs((int) $_GET['perawatan']);
// $tanggal = $_GET['tanggal'];
// $pajak = $_GET['pajak'];
// $lain = $_GET['lainlain'];
// $keterangan = $_GET['keterangan'];
// $id_user = $_GET['iduser'];

//query update
$query = mysqli_query($koneksi,"UPDATE operasional SET is_update='1' WHERE id_operasional='$id' ");

// $query2 = mysqli_query($koneksi,"INSERT INTO `operasional` (`biaya_perbaikan`, `gaji_karyawan`, `biaya_perawatan`, `tanggal`, `keterangan` , `pajak` , `id_user` , `lainlain`, `is_update`) VALUES ('$perbaikan', '$gaji', '$perawatan', '$tanggal', '$keterangan' ,'$pajak' ,'$id_user','$lain','0')");

$check=0;
if ($query) {
$_SESSION['cekinput']="nonaktif"; 
$check=1;
	}
else{
  $_SESSION['cekinput']="gagal"; 
  $check=1;
}

if ($check==1) {
	
    echo "<script>window.location.href='operasional.php';</script>";
    exit;

}
?>