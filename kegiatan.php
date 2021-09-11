
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
                    

<button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Kegiatan</i></button><br>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kegiatan</th>
                      <th>Jumlah Dana</th>
                      <th>Tanggal</th>
                      <th>Lokasi</th>
                      <th>Oleh</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                 
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM kegiatan INNER JOIN belanja INNER JOIN user WHERE kegiatan.id_belanja = belanja.id_belanja AND belanja.id_belanja = kegiatan.id_belanja AND user.id_user = kegiatan.id_user AND kegiatan.id_user = user.id_user");
$nos = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
    <?php if ($data['is_updatek']!=1): ?>
      
    
                    <tr>
                      <?php $tgl = date('d-m-Y', strtotime($data['tanggal'])); ?> 
                    	<td><?=$nos++?></td>
                      <td><?=$data['nama_kegiatan']?></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['jumlah'],2,',','.');?></span></td>
                      <td><?=$tgl?></td>
                      <td><?=$data['lokasi']?></td>
                      <td><?=$data['nama']?></td>
                        
					  <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_kegiatan']; ?>"></a>
<!-- <a href="hapus-kegiatan.php?id_kegiatan=<?=$data['id_kegiatan'];?>" onclick="return confirm('Anda Yakin? Menghapus Data Tidak Dapat Dikembalikan');"class="btn btn-danger btn-md"><i class="fa fa-remove" style="color: white"></i></a> -->
</tr>
<?php endif ?>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_kegiatan']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Koreksi Data Kegiatan</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="proses-edit-kegiatan.php" method="get">

<?php
$id = $data['id_kegiatan']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id_kegiatan='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_kegiatan" value="<?php echo $row['id_kegiatan']; ?>">
<input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
<div class="form-group">
<label>Jumlah Dana</label>
         <select class="form-control" name='belanja' required>
          <?php 
          $queri = mysqli_query($koneksi, "SELECT id_belanja , keterangan , jumlah, is_update from belanja ORDER BY tgl_pengeluaran DESC");
            $no = 1;
          while($querynama = mysqli_fetch_array($queri)){
              if ($querynama["is_update"]!=1) {
                 echo '<option value="'.$querynama["id_belanja"].'">'.$querynama["keterangan"].' Rp. '.$querynama["jumlah"].'</option>';
              }
         
          }
          ?>
 </select>   
</div>
<div class="form-group">
<label>Nama Kegiatan</label>
<input type="text" name="kegiatan" class="form-control" value="<?php echo $row['nama_kegiatan']; ?>" required>      
</div>
<div class="form-group">
<label>Tanggal Pelaksanaan</label>
<input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" required>      
</div>

<div class="form-group">
<label>Lokasi</label>
<input type="text" name="lokasi" class="form-control" value="<?php echo $row['lokasi']; ?>" required>      
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



 <!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Kegiatan</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="tambah-kegiatan.php" method="get">
        <div class="modal-body">
		
         <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
		Jumlah Dana : 
         <select class="form-control" name='belanja' required>
          <?php 
          $queri = mysqli_query($koneksi, "SELECT id_belanja , keterangan , jumlah, is_update from belanja ORDER BY tgl_pengeluaran DESC");
            $no = 1;
          while($querynama = mysqli_fetch_array($queri)){
              if ($querynama["is_update"]!=1) {
                 echo '<option value="'.$querynama["id_belanja"].'">'.$querynama["keterangan"].' Rp. '.$querynama["jumlah"].'</option>';
              }
         
          }
          ?>
 </select>
    Nama Kegiatan : 
         <input type="text" class="form-control" name="kegiatan" required>
		Tanggal Pelaksanaan : 
         <input type="date" class="form-control" name="tanggal" required>
		Lokasi : 
         <input type="text" class="form-control" name="lokasi" required>
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
