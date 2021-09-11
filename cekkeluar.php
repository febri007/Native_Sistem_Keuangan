  <?php
  if($_SESSION['status']=="login"){
  	echo "Tunggu Sebentar.. Kami sedang mengeluarkan anda";
  $_SESSION['status']="DOOOONOOOTTTT";
  header("Refresh:3; url=https://keuangan.kusumajayabatik.xyz");
  exit();
	header("Refresh:0; url=https://keuangan.kusumajayabatik.xyz");
	exit();
	}
  
  if($_SESSION['status']!="login"){
	header("Refresh:0; url=https://keuangan.kusumajayabatik.xyz");
	exit();
	}

  ?>
  