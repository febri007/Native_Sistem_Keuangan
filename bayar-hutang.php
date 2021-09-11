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

  <title>Bayar Hutang</title>
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

<button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah3"><i class="fa fa-plus"> Bayar</i></button><br>
          <!-- Content Row -->
          <div class="">

            <!-- Area Chart -->

                <!-- Card Body -->

            <!-- Pie Chart -->

                <!-- Card Header - Dropdown -->

             
       <!-- Card Body -->

      
                <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Bayar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
          <th>No</th>
                      <!-- <th>Jumlah Hutang</th> --> 
                      <th>Hutang</th>
                      <!-- <th>Tanggal Hutang</th> -->
                      <th>Dibayar</th>
                      <th>Tanggal Bayar</th>
                      <!-- <th>Tersisa</th> -->
                      <th>Keterangan</th>
                      <th>Oleh</th>
                     
                      <!-- <th>Status</th> -->
                      <th>Aksi</th>
                    </tr>
                  </thead>
               <!--    <tfoot>
                    <tr>
                     <th>No.urut</th>
                      <th>Jumlah Hutang</th>
                      <th>Dibayar</th>
                      <th>Tanggal</th>
                      <th>Alasan</th>
                      <th>Penghutang</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot> -->
                  <tbody>

          <?php 
$query = mysqli_query($koneksi,"SELECT * FROM pembayaran_hutang INNER JOIN hutang INNER JOIN user WHERE hutang.id_hutang = pembayaran_hutang.id_hutang AND pembayaran_hutang.id_hutang = hutang.id_hutang AND user.id_user = pembayaran_hutang.id_user AND pembayaran_hutang.id_user = user.id_user ORDER BY tanggal_byr DESC");

$nos = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
 
?>


        <?php if ($data['dibayar_hutang']!=0): ?>
          <?php if ($data['is_updatebh']!=1): ?>
            
         

              <tr>
                      <?php 

                          // $my_id_query444=mysqli_query($koneksi,"SELECT * FROM pembayaran_hutang INNER JOIN hutang WHERE hutang.id_hutang = pembayaran_hutang.id_hutang AND pembayaran_hutang.id_hutang = hutang.id_hutang"); 
                          // $data=mysqli_fetch_assoc($my_id_query444);
                          $ddibayar=$data['dibayar'];
                          $jjumlah=$data['jumlah'];
                          // echo " if check Apakah Dibayar". $ddibayar ;
                          // echo " join sudah sesuai dengna Jumlah hutang".$jjumlah;
                          if ( $ddibayar>=$jjumlah  ) {
                            $queryx = mysqli_query($koneksi,"UPDATE hutang SET status='Dibayar' WHERE id_hutang='".$data['id_hutang']."' ");
                          }



                      ?>
                       <?php $tgl = date('d-m-Y', strtotime($data['tgl_hutang'])); ?>
                      <td><?=$nos?></td>
                      <td><?=$data['penghutang']?></td>
                      <!-- <td><?=$tgl?></td> -->
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['dibayar_hutang'],2,',','.');?></span></td>
                      <td><?=$data['tanggal_byr']?></td>
                     <!--  <td>Rp. <?=number_format($data['jumlah']-$data['dibayar'],2,',','.');?></td> -->
                      <td><?=$data['keterangan_byrhutang']?></td>
                      <td><?=$data['nama']?></td>

                      
                    <!--   <td><?=$data['penghutang']?></td>
                      <td><?=$data['status']?></td> -->
                    <?php  $nos++; ?>
                    <td>
            
                    
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal3<?php echo $data['id_pembayaranhutang']; ?>"></a>
<!-- <a href="#" type="button" class=" fa fa-caret-square-o-up btn btn-primary btn-md" data-toggle="modal" data-target="#myModal2<?php echo $data['id_hutang']; ?>"></a> -->
<!-- <a href="hapus-pembayaran-hutang.php?id_pembayaranhutang=<?=$data['id_pembayaranhutang'];?>" onclick="return confirm('Anda Yakin? Menghapus Data Tidak Dapat Dikembalikan');" class="btn btn-danger btn-md"><i class="fa fa-remove" style="color: white"></i></a> -->
</tr>
 <?php endif ?>
<?php endif ?>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal3<?php echo $data['id_pembayaranhutang']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Koreksi Pembayaran Hutang</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

       <?php if ($_SESSION['jabatan'] != 'pemimpin'):
      { ?>
<div class="container-fluid">
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Info : Hanya Pimpinan yang Berwenang Merubah Jumlah Pembayaran
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>

 <?php } endif ?>
<form role="form" action="proses-edit-bayarhutang.php" method="get">

<?php
$id = $data['id_pembayaranhutang']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM pembayaran_hutang  WHERE id_pembayaranhutang='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_pembayaranhutang" value="<?php echo $row['id_pembayaranhutang']; ?>">

 Pilih Hutang : 
          <select class="form-control" name='hutang' required>
          <?php 
          $queri = mysqli_query($koneksi, "SELECT status , id_hutang , jumlah ,penghutang, jumlah, is_updateh from hutang ORDER BY tgl_hutang DESC");
            $no = 1;
          while($querynama = mysqli_fetch_array($queri)){
            if ($querynama["status"]!='Dibayar' AND $querynama["jumlah"]!=0 ) {
              if ($querynama["is_updateh"]!=1) {
                 echo '<option value="'.$querynama["id_hutang"].'">'.$querynama["penghutang"].' Rp. '.$querynama["jumlah"].'</option>';
              }
             
            }
          
          }
          ?>
          </select>  <br>

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tgl_bayar" class="form-control" value="<?php echo $row['tanggal_byr']; ?>" required>      
</div>

 <?php if ($_SESSION['jabatan'] != 'pemimpin'):
      { ?>
<div class="form-group">
<label>Dibayar</label>
<input type="number" name="dibayar" class="form-control" value="<?php echo $row['dibayar_hutang']; ?>" readonly>      
</div>
<?php } endif ?>
 <?php if ($_SESSION['jabatan'] == 'pemimpin'):
      { ?>
<div class="form-group">
<label>Dibayar</label>
<input type="number" name="dibayar" class="form-control" value="<?php echo $row['dibayar_hutang']; ?>" required>      
</div>
<?php } endif ?>

<div class="form-group">
<label>Keterangan</label>
<input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan_byrhutang']; ?>" required>      
</div>

<div class="modal-footer">  
<button type="submit" class="btn btn-success">Ubah</button>
<!-- <a href="hapus-hutang.php?id_hutang=<?=$row['id_hutang'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a> -->
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
  <div id="myModalTambah3" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Bayar Hutang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
    <form action="tambah-pembayaran-hutang.php" method="get">
        <div class="modal-body">
    Pilih Hutang : 
          <select class="form-control" name='hutang' required>
          <?php 
          $queri = mysqli_query($koneksi, "SELECT * from hutang");
            $no = 1;
          while($querynama = mysqli_fetch_array($queri)){
            if ($querynama["status"]!='Dibayar' AND $querynama["jumlah"]!=0 ) {
              if ($querynama["is_updateh"]!=1) {
                echo '<option value="'.$querynama["id_hutang"].'">'.$querynama["penghutang"].' Rp. '.$querynama["jumlah"].'</option>';
              }
                 
              
             
            }
          
          }
          ?>
          </select>  
    Tanggal : 
         <input type="date" class="form-control" name="tanggal_byr" required>
    Bayar : 
         <input type="number" class="form-control" name="bayar" required>
    Keterangan : 
         <input type="text" class="form-control" name="keterangan" required>
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
