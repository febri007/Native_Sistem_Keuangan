<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Kusuma Jaya Batik</title>
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/iconbatik.png">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
  <img class="wave" src="img/wave.png">
  <div class="container">
    <div class="img">
      <img src="img/bg.png">
    </div>
    <div class="login-content">
     
      <form action="proses-lupapassword.php" method="POST">
        <?php if (@$_SESSION['sttslogin']=="slh"): ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Info : Tidak Terdaftar!
          <?php $_SESSION['sttslogin']="false"; ?>
        </div>
        <?php endif ?>
        <?php if (@$_SESSION['sttslogin']=="sukses"): ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
          Info : Email Konfirmasi Terkirim ke  <?php echo $_SESSION['email'];?>!
          <?php $_SESSION['sttslogin']="false"; ?>
          <?php session_destroy(); ?>
        </div>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Silahkan ikuti petunjuk yang telah kami kirim dengan email lupapassword@keuangan.kusumajayabatik.xyz, proses pengiriman dapat membutuhkan waktu hingga 5 menit
        </div>
        <a href="login.php">Kembali Halaman Login</a>
        <?php else: 
          ?>
          <img src="img/avatar.svg"><br><br>
        <h2>Lupa Password</h2><br><br>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="username" class="input" required>
                 </div>
              </div>
               <a href="login.php">Kembali Halaman Login</a>
              <input style="color: white;" type="submit" class="btn" value="Lanjut"><?php
          ?>
        <?php endif ?>
        
              

            </form>

        </div>
    </div>
    <img class="wave" src="img/wave.png">
    <script type="text/javascript" src="js/mainlogin.js"></script>
</body>
</html>
