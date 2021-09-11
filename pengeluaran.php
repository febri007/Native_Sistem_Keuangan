
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
    <?php 
  //untuk grafik

$satuhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 0 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
$ss = 0;
while($data = mysqli_fetch_array($satuhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $ss = $ss + $data['jumlah'];
}

$satuhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
$satuhari = 0;
while($data = mysqli_fetch_array($satuhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $satuhari = $satuhari + $data['jumlah'];
}

$duahari = 0;
$duahariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($duahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $duahari = $duahari + $data['jumlah'];
}
$tigahari = 0;
$tigahariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 3 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($tigahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $tigahari = $tigahari + $data['jumlah'];
}
$empathari = 0;
$empathariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 4 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($empathariq)){ // Ambil semua data dari hasil eksekusi $sql
    $empathari = $empathari + $data['jumlah'];
}
$limahari = 0;
$limahariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 5 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($limahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $limahari = $limahari + $data['jumlah'];
}
$enamhari = 0;
$enamhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 6 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($enamhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $enamhari = $enamhari + $data['jumlah'];
}
$tujuhhari = 0;
$tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 7 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $tujuhhari = $tujuhhari + $data['jumlah'];
}

$delapan = 0;
$tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 8 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $delapan = $delapan + $data['jumlah'];
}

$sembilan = 0;
$tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 9 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $sembilan = $sembilan + $data['jumlah'];
}

$sepuluh = 0;
$tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 10 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $sepuluh = $sepuluh + $data['jumlah'];
}

$s11 = 0;
$tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE MONTH(tgl_pengeluaran) = MONTH(CURRENT_DATE() - INTERVAL 11 MONTH)
AND YEAR(tgl_pengeluaran) = YEAR(CURRENT_DATE()) AND is_update = '0'");
while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $s11 = $s11 + $data['jumlah'];
}



// $s13 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 13 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s13 = $s13 + $data['jumlah'];
// }

// $s14 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 14 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s14 = $s14 + $data['jumlah'];
// }
// $s15 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 15 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s15 = $s15 + $data['jumlah'];
// }
// $s16 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 16 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s16 = $s16 + $data['jumlah'];
// }

// $s17 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 17 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s17 = $s17 + $data['jumlah'];
// }

// $s18 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 18 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s18 = $s18 + $data['jumlah'];
// }

// $s19 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 19 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s19 = $s19 + $data['jumlah'];
// }
// $s20 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 20 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s20 = $s20 + $data['jumlah'];
// }
// $s21 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 21 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s21 = $s21 + $data['jumlah'];
// }
// $s22 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 22 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s22 = $s22 + $data['jumlah'];
// }
// $s23 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 23 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s23 = $s23 + $data['jumlah'];
// }
// $s24 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 24 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s24 = $s24 + $data['jumlah'];
// }
// $s25 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 25 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s25 = $s25 + $data['jumlah'];
// }
// $s26 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 26 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s26 = $s26 + $data['jumlah'];
// }
// $s27 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 27 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s27 = $s27 + $data['jumlah'];
// }
// $s28 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 28 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s28 = $s28 + $data['jumlah'];
// }
// $s29 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 29 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s29 = $s29 + $data['jumlah'];
// }
// $s30 = 0;
// $tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
// WHERE tgl_pengeluaran = CURDATE() - INTERVAL 30 DAY AND is_update = '0'");
// while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
//     $s30 = $s30 + $data['jumlah'];
// }

  ?>
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
			              
			                <!-- Collapsable Card Example -->
                <!-- Card Header - Accordion -->
			  		  
		                <!-- Area Chart -->

			  
			<button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Belanja</i></button><br>
           <!-- DataTales Example -->
	         <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Belanja</h6>
                  <div class="dropdown no-arrow">
                    <!--  -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
		
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Data Belanja</h6>
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
					           <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Sumber</th>
                      <th>Keterangan</th>
                      <th>Oleh</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM belanja inner join sumber INNER JOIN user where belanja.id_sumber = sumber.id_sumber AND sumber.id_sumber = belanja.id_sumber AND belanja.id_user = user.id_user AND user.id_user = belanja.id_user ORDER BY tgl_pengeluaran DESC");
$nos = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>

    <?php if ($data['is_update']!=1): ?>
      
    
                    <tr>
                      <?php $tgl = date('d-m-Y', strtotime($data['tgl_pengeluaran']));?>
                      <td><?=$nos++?></td>
                      <td><?=$tgl?></td>
                      <td><p>Rp. <span style="float: right; text-align: right;"><?=number_format($data['jumlah'],2,',','.');?></span></p></td>
                      <td><?=$data['nama_sumber']?></td>
                      <td><?=$data['keterangan']?></td>
                      <td><?=$data['nama']?></td>
					  <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_belanja']; ?>"></a>
<!-- <a onclick="return confirm('Anda Yakin? Menghapus Data Tidak Dapat Dikembalikan');"  href="hapus-pengeluaran.php?id_belanja=<?=$data['id_belanja'];?> " class="btn btn-danger btn-md"><i class="fa fa-remove" style="color: white"></i></a> -->
</td>
</tr>
<?php endif ?>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_belanja']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Koreksi Data Belanja</h4>
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
<form role="form" action="proses-edit-pengeluaran.php" method="get">

<?php
$id = $data['id_belanja']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM belanja WHERE id_belanja='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_pengeluaran" value="<?php echo $row['id_belanja']; ?>">

<!-- <div class="form-group">
<label>Id</label>
<input type="text" name="id_pengeluaran" class="form-control" value="<?php echo $row['id_belanja']; ?>" disabled>      
</div> -->

<div class="form-group">
<label>Tanggal</label>
<input type="date" name="tgl_pengeluaran" class="form-control" value="<?php echo $row['tgl_pengeluaran']; ?>" required>      
</div>

<?php if ($_SESSION['jabatan'] == 'pemimpin'):
      { ?>
<div class="form-group">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>"required>   </div>   <?php } endif ?>


 <?php if ($_SESSION['jabatan'] != 'pemimpin'):
      { ?>
<div class="form-group">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>" readonly>   </div>  
 <?php } endif ?>

<div class="form-group">
<label>Sumber</label>
<select class="form-control" name='sumber'  required="required">
          <?php 
          $queri = mysqli_query($koneksi, "SELECT id_sumber , nama_sumber  FROM  sumber");
            $no = 1;
            $noo =1;

          while($querynama = mysqli_fetch_array($queri)){
            
              echo '<option value="'.$querynama["id_sumber"].'">'.$noo.'. &nbsp'.$querynama["nama_sumber"].'</option>';
              $noo++;
            
          
          
          }
          ?>
          </select> 
<input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>    
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



 <!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Belanja</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
		<form action="tambah-pengeluaran.php" method="get">
        <div class="modal-body">
		Tanggal : 
         <input type="date" class="form-control" name="tgl_pengeluaran" required>
		Jumlah : 
         <input type="number" class="form-control" name="jumlah" required>
		Sumber : 
         <select class="form-control" name='sumber'  required="required">
          <?php 
          $queri = mysqli_query($koneksi, "SELECT id_sumber , nama_sumber  FROM  sumber");
            $no = 1;
            $noo =1;
          while($querynama = mysqli_fetch_array($queri)){
            
              echo '<option value="'.$querynama["id_sumber"].'">'.$noo.'. &nbsp'.$querynama["nama_sumber"].'</option>';
              $noo++;
            
          
          
          }
          ?>
          </select> 
     Keterangan : 
         <input type="text" class="form-control" name="keterangan" required>
          <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

   <script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["11 bulan lalu","10 bulan lalu","9 bulan lalu","8 bulan lalu","7 bulan lalu","6 bulan lalu", "5 bulan lalu", "4 bulan lalu", "3 bulan lalu", "2 bulan lalu", "1 bulan lalu", "bulan ini"],
    datasets: [{
      label: "Pendapatan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php echo $s11?> ,<?php echo $sepuluh?> ,<?php echo $sembilan?> , <?php echo $delapan?> , <?php echo $tujuhhari?>, <?php echo $enamhari ?>, <?php echo $limahari ?>, <?php echo $empathari ?>, <?php echo $tigahari ?>, <?php echo $duahari ?>, <?php echo $satuhari ?>, <?php echo $ss ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

  
  </script>
</body>

</html>