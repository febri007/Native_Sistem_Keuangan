<!DOCTYPE html>
<html>
<head>
	<title>Not Allowed</title>
	<script type="text/javascript">
		var timeleft = 4;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "Mengeluarkan...";
  } else {
    document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
  }
  timeleft -= 1;
}, 1000);
	</script>
</head>
<body>
	<center>
<h2 style="color: red;">Akses Ditolak!</h2>
<p>Maaf perangkat anda saat ini tidak didukung</p>
<p>Silahkan gunakan media lain</p>
<br><br><br>
<p style="color: blue;">Kami segera mengeluarkan anda dalam :</p>
<?php header("Refresh:5; url=https://keuangan.kusumajayabatik.xyz/keluar.php"); ?>
<div style="color: red;" id="countdown"></div>
</center>
</body>
</html>