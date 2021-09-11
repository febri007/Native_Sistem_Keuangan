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
                      <th>Tersisa</th>
                      <th>Keterangan</th>
                      <th>Oleh</th>
                     
                      <!-- <th>Status</th> -->
                      <th>Ubah Status</th>
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
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['jumlah']-$data['dibayar'],2,',','.');?></span></td>

                      <td><?=$data['keterangan_byrhutang']?></td>
                      <td><?=$data['nama']?></td>
                      <td>
                         <?php if ($data['is_updatebh']==0): ?>
                          Data Masuk
                        <?php endif ?>
                        <?php if ($data['is_updatebh']==1): ?>
                          Dikoreksi
                        <?php endif ?>
                        </td>
                      <?php  $nos++; ?>
                  
            
   
</tr>

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
