<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username =mysqli_real_escape_string($koneksi,$_POST['username']);
$password =mysqli_real_escape_string($koneksi, $_POST['password']);
$password1 = md5($password);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password1' and is_active='0'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
$sesi = mysqli_query($koneksi,"select * from user where username='$username' and password='$password1'");
$sesi = mysqli_fetch_assoc($sesi);
	$_SESSION['id'] = $sesi['id_user'];
	$_SESSION['nama'] = $sesi['nama'];
	$_SESSION['status'] = "login";
	$_SESSION['jabatan'] = $sesi['jabatan'];
	$_SESSION['cekinput'] = "false";
	header("location:index.php");
}else{
	$_SESSION['sttslogin']="slh";
	$message = "Username Atau Password Salah";
	echo "<script type='text/javascript'> 
	window.location.href='index.php';
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