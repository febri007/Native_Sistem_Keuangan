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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Data Operasional</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tenggat Waktu</th>
                      <th>Biaya perbaikan</th>
                      <th>Gaji karyawan</th>
                      <th>Biaya Perawatan</th>
                      <th>Total Pajak</th>
                      <th>Lain-Lain</th>
                      <th>Keterangan</th>
                      <th>Oleh</th>
                      <th>Status Ubah</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM operasional inner join user where operasional.id_user = user.id_user and user.id_user = operasional.id_user");
$no = 1;
$formattedDate       = null;
$jumlah = null;
while ($data = mysqli_fetch_assoc($query)) 
{
  $formattedDate = date("d/M/Y", strtotime($data["tanggalawal"]));
  $formattedDate2 = date("d/M/Y", strtotime($data["tanggalakhir"]));
?>
                    <tr>
                      <td><?=$formattedDate." s/d ".$formattedDate2?></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['biaya_perbaikan'],2,',','.');?></span></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['gaji_karyawan'],2,',','.');?></span></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['biaya_perawatan'],2,',','.');?></span></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['pajak'],2,',','.');?></span></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['lainlain'],2,',','.');?></span></td>
                      <td><?=$data['keterangan']?></td>
                      <td><?=$data['nama'];?></td>
                        
                        <td>
                         <?php if ($data['is_update']==0): ?>
                          Data Masuk
                        <?php endif ?>
                        <?php if ($data['is_update']==1): ?>
                          Nonaktif
                        <?php endif ?>
</td>
</tr>
<!-- Modal Edit Mahasiswa-->
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
<?php require 'rincian-lacak.php'?>
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

