<?php 
session_start();
require 'koneksi.php';
$_SESSION['status']="not_login";
header("location:cekkeluar.php");
die();
?>
