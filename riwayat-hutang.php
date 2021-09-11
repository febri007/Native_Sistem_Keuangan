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

  <title>Operasional</title>
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

<!-- <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Hutang</i></button><br> -->
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
              <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Hutang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jumlah Hutang</th>
                      <th>Dibayar</th>
                      <th>Tanggal</th>
                      <th>Alasan</th>
                      <th>Penghutang</th>
                      <th>Status</th>
                     <!--  <th>Aksi</th> -->
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
                  
          <?php 
$query = mysqli_query($koneksi,"SELECT * FROM hutang  ORDER BY tgl_hutang DESC");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
            <?php if ($data['jumlah']!=0): ?>
              <?php if ($data['is_updateh']!=1): ?>
              <tr>
               
                 <?php $tgl = date('d-m-Y', strtotime($data['tgl_hutang'])); ?>
                      <td><?=$no++?></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['jumlah'],2,',','.');?></span></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['dibayar'],2,',','.');?></span></td>
                      <td><?=$tgl?></td>
                      <td><?=$data['alasan']?></td>
                      <td><?=$data['penghutang']?></td>
                      <td><?=$data['status']?></td>
                
                    <!-- Button untuk modal -->
<!-- <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_hutang']; ?>"></a> -->
<!-- <a href="#" type="button" class=" fa fa-caret-square-o-up btn btn-primary btn-md" data-toggle="modal" data-target="#myModal2<?php echo $data['id_hutang']; ?>"></a> -->
<!-- <a href="hapus-hutang.php?id_hutang=<?=$data['id_hutang'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus? Data Tidak Dapat Dikembalikan!')" class="btn btn-danger btn-md"><i class="fa fa-remove" style="color: white"></i></a> -->
<!-- </tr> -->
<?php endif ?>
<?php endif ?>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_hutang']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->

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
          <h4 class="modal-title">Tambah Hutang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
    <form action="tambah-hutang.php" method="get">
        <div class="modal-body">
    Jumlah : 
         <input type="text" class="form-control" name="jumlah">
    Tanggal : 
         <input type="date" class="form-control" name="tgl_hutang">
    Penghutang : 
         <input type="text" class="form-control" name="penghutang">
    Alasan : 
         <input type="text" class="form-control" name="alasan">
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



                  </tbody>
                </table>
                
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->
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
