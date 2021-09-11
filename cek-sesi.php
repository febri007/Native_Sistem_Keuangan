<?php 
session_start();
require 'koneksi.php';
if(@$_SESSION['status']!="login"){
header("Refresh:0; url=login.php");
exit();
}
?>