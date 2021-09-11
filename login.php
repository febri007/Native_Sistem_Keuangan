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
     
      <form action="proses-login.php" method="POST">
        <?php if (@$_SESSION['sttslogin']=="slh"): ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Info : Username atau Password Salah!
          <?php $_SESSION['sttslogin']="false"; ?>
        </div>
        <?php endif ?>
        <img src="img/avatar.svg">
        <h2>Selamat Datang</h2><br><br>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="username" class="input" required>
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="password" class="input" required>
                 </div>
              </div>
              <a href="lupapassword.php">Lupa Password?</a>
              <input style="color: white;" type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <img class="wave" src="img/wave.png">
    <script type="text/javascript" src="js/mainlogin.js"></script>
</body>
</html>
