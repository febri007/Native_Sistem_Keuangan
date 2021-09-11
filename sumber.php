
<!DOCTYPE html>
<html lang="en">

<head>  
  <?php
require 'cek-sesi.php';
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sumber Dana</title>
  <link rel="icon" href="img/iconbatik.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'koneksi.php';
require ('sidebar.php'); ?>   
     <!-- Main Content -->
      <div id="content">

<?php require ('navbar.php'); ?> 

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
           <?php if ($_SESSION['cekinput']=="hapus"): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Info : Data Telah Dihapus
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php $_SESSION['cekinput']="false"; ?>
        </div>
          <?php endif ?>
   <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            		  
			           <!-- DataTales Example -->
					   <div class="col-xl-18 col-lg-12">
					   <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Sumber Dana</i></button><br>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Sumber Dana</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Sumber</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM sumber");
$nos = 1;
while ($data = mysqli_fetch_assoc($query)) 
{

?>

                    <tr>
                      
                      <td><?=$nos++?></td>
                      <td><?=$data['nama_sumber']?></td>
                      
                      
					         <td>

                    <!-- Button untuk modal -->
 <?php if ($data['id_sumber']==2 || $data['id_sumber']==1): ?>
  <?php echo "Nama Sumber ".$data['nama_sumber']." Tidak Dapat Dimodifikasi" ?>
 <?php endif ?>

 <?php if ($data['id_sumber']!=2 && $data['id_sumber']!=1): ?>
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_sumber']; ?>"></a>
<a  href="hapus-sumber.php?id_sumber=<?=$data['id_sumber'];?>" onclick="return confirm('Anda Yakin? Menghapus Data Tidak Dapat Dikembalikan');" class="btn btn-danger btn-md"><i class="fa fa-remove" style="color: white"></i></a>
</td>
</tr>
<?php endif ?>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_sumber']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Sumber</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-sumber.php" method="get">

<?php
$id = $data['id_sumber']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM sumber WHERE id_sumber='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_sumber" value="<?php echo $row['id_sumber']; ?>">

<div class="form-group">
<label>Nama Sumber Dana</label>
<input type="text" name="nama_sumber" class="form-control" value="<?php echo $row['nama_sumber']; ?>" required>      
</div>
</div>
<!-- <input type="text" class="form-control" name="user" value="Diubah : <?=$_SESSION['nama']?>" readonly> -->

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Ubah</button>
<a href="hapus-pemasukan.php?id_pemasukan=<?=$row['id_pemasukan'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>
<?php 
}
//mysql_close($host);
?>  
       
</form>
</div>
</div>

</div>
</div>



 <!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Sumber</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="tambah-sumber.php" method="get">
        <div class="modal-body">
		Nama Sumber Dana: 
         <input type="text" class="form-control" name="nama_sumber" required>

        </div>
        <!-- footer modal -->
        <div class="modal-footer">
		<button type="submit" class="btn btn-success" >Tambah</button>
		</form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>

    </div>
  </div>



<?php               
} 
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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

</body>

</html>