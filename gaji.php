<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kegiatan</title>
  <link rel="icon" href="img/iconbatik.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body id="page-top">
<?php require 'koneksi.php'; ?>
<?php require 'sidebar.php'; ?>
      <!-- Main Content -->
      <div id="content">

<?php require 'navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

                 <?php if ($_SESSION['cekinput']=="masuk"): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
          Info : Data Berhasil Ditambahkan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php $_SESSION['cekinput']="false"; ?>
        </div>
          <?php endif ?>

        <?php if ($_SESSION['cekinput']=="koreksi"): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
          Info : Data Berhasil di Koreksi
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php $_SESSION['cekinput']="false"; ?>
        </div>
          <?php endif ?>

          <?php if ($_SESSION['cekinput']=="gagal"): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Info : Sistem Gagal Mengeksekusi
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php $_SESSION['cekinput']="false"; ?>
        </div>
          <?php endif ?>
                    

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Gaji Karyawan</h6>
            </div>
            <div class="card-body">
                     <form name="add_name" id="add_name">   
                               <table class="table" id="dynamic_field" border="0">  
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Nama" class="form-control name_list" /></td>  
                                         <td><input type="number" name="total[]" placeholder="Gaji" class="form-control name_list" /></td> 
                                         <td><input type="text" name="keterangan[]" placeholder="Keterangan" class="form-control name_list" /></td> 
                                         <td><input type="date" name="tanggal[]" placeholder="" class="form-control name_list" /></td> 
                                         <input type="hidden" name="kddetail[]" placeholder="" value="2" class="form-control name_list" />
                                         
                                          
                                         <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></td>  
                                    </tr>  
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Tambah" /> 
                                <button type="button" class="btn btn-danger" style="margin:5px" onclick="window.location.href='operasional.php'">Batal</i></button> 
                          </div>  
                     </form>  
            </div>
          </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
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
   <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Nama" class="form-control name_list" /></td><td><input type="number" name="total[]" placeholder="Gaji" class="form-control name_list" /></td><td><input type="text" name="keterangan[]" placeholder="Keterangan" class="form-control name_list" /></td><td><input type="date" name="tanggal[]" placeholder="" class="form-control name_list" /></td><input type="hidden" name="kddetail[]" placeholder="" value="2" class="form-control name_list" /><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"prosesgaji.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {   
                     $('#add_name')[0].reset(); 
                     location.href = "operasional.php" 
                }  
           });  
      });  
 });  
 </script>
</body>

</html>
