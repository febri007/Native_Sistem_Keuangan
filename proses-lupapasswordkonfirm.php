<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username =mysqli_real_escape_string($koneksi,$_POST['username']);
$newpass =mysqli_real_escape_string($koneksi,$_POST['newpass']);
 $newpass = md5($newpass);
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where kdreset='$username' and is_active='0' and kdreset!='0'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek > 0){
$sesi = mysqli_query($koneksi,"select * from user where kdreset='$username'");
$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id_user'];
	$id =  $sesi['id_user'];
	$_SESSION['email'] = $sesi['email'];
	$_SESSION['sttslogin'] = "sukses";
	$query = mysqli_query($koneksi,"UPDATE user SET kdreset='0',password='$newpass' WHERE id_user='$id' ");
	header("location:confirmasiubahpass.php");
}else{
	$_SESSION['sttslogin']="slh";
	$message = "Username Atau Password Salah";
	echo "<script type='text/javascript'> 
	window.location.href='confirmasiubahpass.php';
	</script> ";

}
// header("location:index.php");
?>
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>