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

  <title>Pengeluaran</title>
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
require ('sidebar.php');


?>   
     <!-- Main Content -->
      <div id="content">

<?php require ('navbar.php');?>  
		
		        <!-- Begin Page Content -->
        
   <!-- Content Row -->

            <!-- Content Column -->
	  <div class="container-fluid">

			              
			                <!-- Collapsable Card Example -->
                <!-- Card Header - Accordion -->
			  		  
		                <!-- Area Chart -->

	
		
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Data Belanja / Pengeluaran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Sumber</th>
                      <th>Keterangan</th>
                      <th>Oleh</th>
					           <th>Status</th>
                     <th>Ket Perubahan</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM belanja inner join sumber INNER JOIN user where belanja.id_sumber = sumber.id_sumber AND sumber.id_sumber = belanja.id_sumber AND belanja.id_user = user.id_user AND user.id_user = belanja.id_user ORDER BY tgl_pengeluaran DESC");
$nos = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                    <tr>
                      <?php $tgl = date('d-m-Y', strtotime($data['tgl_pengeluaran']));?>
                      <td><?=$nos++?></td>
                      <td><?=$tgl?></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['jumlah'],2,',','.');?></span></td>
                      <td><?=$data['nama_sumber']?></td>
                      <td><?=$data['keterangan']?></td>
                      <td><?=$data['nama']?></td>
                      <td>
                         <?php if ($data['is_update']==0): ?>
                          Data Masuk
                        <?php endif ?>
                        <?php if ($data['is_update']==1): ?>
                          Dikoreksi
                        <?php endif ?>
                         
                        
                      </td>
                      <td><?=$data['kt_update']?></td>
</tr>

<!-- Modal Edit Mahasiswa-->

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
  <!--   <script>
    function myFunction() {
      confirm("Konfirmasi data Dihapus!");
    }
    </script> -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
 <!-- Page level custom scripts -->

  

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>