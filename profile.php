<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>
  <link rel="icon" href="img/iconbatik.png">
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'sidebar.php'; 
 require 'navbar.php'; 


// Load file koneksi.php
include "koneksi.php";
?>

<html>
<head>
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->
</head>
<body>
  <div class="container-fluid">
    <h2>Profile</h2><hr>
    

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        




    <!-- <div class="card shadow"> -->
       <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data User</h6>
      </div>

      <div class="modal-header">

      <form role="form" action="proses-edit-karyawan.php" method="get">

          <?php
          $id = $_SESSION['id']; 
          $query_edit = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id'");
          //$result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($query_edit)) {  
          ?>


          <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">

          <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
          </div>

          <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">      
          </div>

          <div class="form-group">
          <label>Password tt</label>
          <input type="text" name="passn1" class="form-control" value="">      
          </div>

          <div class="form-group">
          <label>Ulangi Password Baru</label>
          <input type="text" name="passn2" class="form-control" value="">      
          </div>

          <div class="form-group">
          <label>No Telepon</label>
          <input type="number" name="telepon" class="form-control" value="<?php echo $row['no_tlp']; ?>">      
          </div>
          <div class="form-group">
          <label>Email</label>
          <input type="email" name="telepon" class="form-control" value="<?php echo $row['email']; ?>">      
          </div>

          <div class="form-group">
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="form-control" value="<?php echo $row['jabatan']; ?>">      
          </div>


          <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">      
          </div>

          <div class="modal-footer">  
          <button type="submit" class="btn btn-success">Ubah</button>
         
          <?php 
          }
          //mysql_close($host);
          ?>  
                 
          </form>


    
</div>
</div>
<!-- </div> -->

<?php require 'footer.php'?>
   
    <script src="plugin/jquery-ui/jquery-ui.min.js"></script>
    </div> <!-- Load file plugin js jquery-ui -->
</body>
</html>
  
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
