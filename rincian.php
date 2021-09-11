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

  <title>Pendapatan</title>
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

          
   <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            		  
			           <!-- DataTales Example -->
					   <div class="col-xl-18 col-lg-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Histori Data Rincian</h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Perincian</th>
                      <th>Tanggal</th>
                      <th>Nama / Keperluan</th>
                      <th>Pengeluaran</th>
                      <th>Keterangan</th>
                      <th>Oleh</th>
					            <th>Aksi</th>
                    </tr>
                  </thead>

				  <?php 
$query = mysqli_query($koneksi,"SELECT detail.id_detail as id_detail , detail.kd_detail as kd_detail, detail.tanggal as tanggal , detail.nama as nama, detail.pengeluaran as pengeluaran, detail.keterangan as keterangan ,  detail.id_user as id_user,  detail.is_update as is_update, user.nama as usernama FROM detail inner join user where detail.id_user = user.id_user and user.id_user = detail.id_user order by tanggal desc");
$nos = 1;
while ($data = mysqli_fetch_assoc($query)) 
{

?>
      <?php if ($data['is_update']!=1): ?>
        
    
                    <tr>
                    
                      <?php $tgl = date('d-m-Y', strtotime($data['tanggal']));?>
                      <td><?=$nos++?></td>
                        <?php if ($data['kd_detail']==1): ?>
                        <td>Biaya Perbaikan</td>
                      <?php endif ?>
                      <?php if ($data['kd_detail']==2): ?>
                        <td>Gaji Karyawan</td>
                      <?php endif ?>
                       <?php if ($data['kd_detail']==3): ?>
                        <td>Biaya Perawatan</td>
                      <?php endif ?>
                      <?php if ($data['kd_detail']==4): ?>
                        <td>Pajak</td>
                      <?php endif ?>
                      <?php if ($data['kd_detail']==5): ?>
                        <td>Keperluan Lain</td>
                      <?php endif ?>
                      <?php if ($data['kd_detail']<=0 || $data['kd_detail']>5): ?>
                        <td></td>
                      <?php endif ?>
                      <td><?=$tgl?></td>
                       <td><?=$data['nama']?></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['pengeluaran'],2,',','.');?></span></td>
                      <td><?=$data['keterangan']?></td>
                      <td><?=$data['usernama']?></td>
                     
					  <td>

                    <!-- Button untuk modal -->
                   
                      
                    
<a href="" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModalrincian<?php echo $data['id_detail']; ?>"></a>
</td>

</tr>
   <?php endif ?>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModalrincian<?php echo $data['id_detail']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Koreksi Data</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
  
       <?php if ($_SESSION['jabatan'] != 'pemimpin'):
      { ?>
<div class="container-fluid">
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Info : Hanya Pimpinan yang Berwenang Merubah Jumlah Belanja
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>

 <?php } endif ?>
<form role="form" action="proses-edit-rincian.php" method="get">

<?php
$id = $data['id_detail']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM detail WHERE id_detail='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>
<input type="hidden" name="id_detail" value="<?php echo $row['id_detail']; ?>">
<div class="form-group">
  <label>Keperluan</label>
<select id="kd_detail" name="kd_detail" class="form-control">
    <option value="1" class="form-control">Biaya Perbaikan</option>
    <option value="2" class="form-control">Gaji Karyawan</option>
    <option value="3" class="form-control">Biaya Perawatan</option>
    <option value="4" class="form-control">Pajak</option>
    <option value="5" class="form-control">Lain</option>
  </select>
</div>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" required>      
</div>

<?php if ($_SESSION['jabatan'] == 'pemimpin'):
      { ?>
<div class="form-group">
<label>Pengeluaran</label>
<input type="number" name="pengeluaran" class="form-control" value="<?php echo $row['pengeluaran']; ?>"required>   </div>   <?php } endif ?>


 <?php if ($_SESSION['jabatan'] != 'pemimpin'):
      { ?>
<div class="form-group">
<label>Pengeluaran</label>
<input type="number" name="nama" class="form-control" value="<?php echo $row['jumlah']; ?>" readonly>   </div>  
 <?php } endif ?>

<div class="form-group">
<label>Keperluan</label>
<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" >    
</div>


<div class="form-group">
<label>Keterangan</label>
<input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>" required>      
</div>

<div class="form-group">
<input type="hidden" name="iduser" class="form-control" value=" <?=$_SESSION['id']?>">      
</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Ubah</button>
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
</div>

  </div>

<?php               
} 
?>
                  </tbody>
                </table>
              </div>
            </div>
                        <input type="button" class="btn btn-danger" onclick="location.href='operasional.php';" value="Kembali" />
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