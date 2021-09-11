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

  <title>User</title>
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
<?php require 'koneksi.php'; ?>
<?php require 'sidebar.php'; ?>
      <!-- Main Content -->
      <div id="content">

<?php require 'navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> User</i></button><br> -->


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Riwayat User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>username</th>
                      <th>password</th>
                      <th>no_tlp</th>
                      <th>jabatan</th>
                      <th>alamat</th>
                      <th>Status</th>
                     <!--  <th>Aksi</th> -->
                    </tr>
                  </thead>
                   <!--  <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>username</th>
                        <th>password</th>
                        <th>no_tlp</th>
                        <th>jabatan</th>
                        <th>alamat</th>
                        <th>status</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot> -->
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM user");
$nos = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
    <?php if ($data['username']!="superuser"): ?>
        
    
                    <tr>
                      <td><?=$nos++?></td>
                      <td><?=$data['nama']?></td>
                      <td><?=$data['username']?></td>
                      <td>****</td>
                      <td><?=$data['no_tlp']?></td>
                      <td><?=$data['jabatan']?></td>
                      <td><?=$data['alamat']?></td>
                      <td>
                        <?php if ($data['is_active']==0): ?>
                          Aktif
                        <?php endif ?>
                         <?php if ($data['is_active']==1): ?>
                          Tidak Aktif
                        <?php endif ?>
                      </td>
					  
            <!-- Button untuk modal -->
            <?php if ($data['is_active']!=1): ?>
                         
<!-- <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_user']; ?>"></a> -->
<?php if ($data['id_user']!=6): ?>
     <!--   <a href="hapus-karyawan.php?id_user=<?=$data['id_user'];?>" onclick="return confirm('Menonaktifkan user mengakibatkan tidak dapat login!');" class="btn btn-danger btn-md"><i class="fa fa-remove" style="color: white"></i></a>  -->  

<?php endif ?>
 <?php endif ?>
  <?php if ($data['is_active']==1): ?>
       <!--  <a href="hidden-karyawan.php?id_user=<?=$data['id_user'];?>" class="btn btn-success btn-md">Hapus</a>  -->  
        
 <?php endif ?>


</tr>

<?php endif ?>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_user']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data user</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-karyawan.php" method="get">

<?php
$id = $data['id_user']; 
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


<!-- <div class="form-group">
<label>Password Sekarang</label>
<input type="text" name="pass1" class="form-control" value="">      
</div> -->

<div class="form-group">
<label>Reset Password Baru</label>
<input type="password" class="form-control" name="password">      
</div>

<!-- <div class="form-group">
<label>Ulangi Password Baru</label>
<input type="text" name="passn2" class="form-control" value="">      
</div> -->

<div class="form-group">
<label>No Telepon</label>
<input type="number" name="telepon" class="form-control" value="<?php echo $row['no_tlp']; ?>">      
</div>

<div class="form-group">
<label>Jabatan</label>
<select class="form-control" name='jabatan'>
<option value="Bagian Keuangan">Bag. Keuangan</option>
<option value="pemimpin">Pimpinan</option>
      
 </select>  
</div>


<div class="form-group">
<label>Alamat</label>
<input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">      
</div>
<button type="submit" class="btn btn-success">Ubah</button>
<div class="modal-footer">  

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
          <h4 class="modal-title">Tambah User</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="tambah-karyawan.php" method="get">
        <div class="modal-body">
		Nama : 
         <input type="text" class="form-control" name="nama">
		Username : 
         <input type="text" class="form-control" name="username">
		New Password : 
         <input type="password" class="form-control" name="password">
		no telepon : 
         <input type="number" class="form-control" name="no_tlp">
		Jabatan : 
         <input type="text" class="form-control" name="jabatan">
    Alamat : 
         <input type="text" class="form-control" name="alamat">

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
