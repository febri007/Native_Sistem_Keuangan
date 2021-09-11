<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username =mysqli_real_escape_string($koneksi,$_POST['username']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where username='$username' and is_active='0'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$kdreset = rand(100000,999999);
if($cek > 0){
$sesi = mysqli_query($koneksi,"select * from user where username='$username'");
$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id_user'];
	$id =  $sesi['id_user'];
	$_SESSION['email'] = $sesi['email'];
	$_SESSION['password'] = $kdreset;
	$_SESSION['sttslogin'] = "sukses";
	$query = mysqli_query($koneksi,"UPDATE user SET kdreset='$kdreset' WHERE id_user='$id' ");

	ini_set('display_errors', 1 );

	error_reporting( E_ALL );

	$from = "lupapassword@keuangan.kusumajayabatik.xyz";

	$to = $_SESSION['email'];

	$subject = "Konfirmasi Perubahan Password";

	$message = "Kode Konfirmasi = ".$kdreset. " \n silahkan kunjungi https://keuangan.kusumajayabatik.xyz/confirmasiubahpass.php untuk melakukan perubahan password \n
		! jaga kerahasiaan kode anda !";

	$headers = "From:" . $from;

	mail($to,$subject,$message, $headers);

	header("location:lupapassword.php");
}else{
	$_SESSION['sttslogin']="slh";
	$message = "Username Atau Password Salah";
	echo "<script type='text/javascript'> 
	window.location.href='lupapassword.php';
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