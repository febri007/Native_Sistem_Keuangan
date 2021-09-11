<?php
require 'cek-sesi.php';
require 'koneksi.php';
?>
<?php

            // $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            // $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sqlcek="SELECT tanggalakhir FROM operasional where is_update = '0'";

        $hasilcek=mysqli_query($koneksi,$sqlcek);
        $no=0;
        $paten=0;
        $tanggalakhircek=null;
        while ($datacek = mysqli_fetch_array($hasilcek)) {
            $no++;
            ?><?php
            $paten = $datacek["tanggalakhir"]; ?>
            <?php if ($tanggalakhircek < $datacek["tanggalakhir"]): ?>
                <?php $tanggalakhircek = $datacek["tanggalakhir"]; ?>
            <?php endif ?>
            <?php
        }

       
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

  <title>Kelola Hutang</title>
  <link rel="icon" href="img/iconbatik.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">

<?php 
require 'koneksi.php';
require 'sidebar.php'; 

?>

      <!-- Main Content -->
      <div id="content">
      
<?php require 'navbar.php'; ?>
 <?php
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=1";

        }else {
            
        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        $totalperbaikan=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <?php if ($data["is_update"]==0): ?>
                <?php $totalperbaikan = $totalperbaikan+$data["pengeluaran"]; ?>
            <?php endif ?>
                
            <?php
        }
        ?>


        <?php if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

        $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
        $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));

        $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=2 ";

        }else {

        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        $totalgjkaryawan=0;
        while ($data = mysqli_fetch_array($hasil)) {
        $no++;
        ?>
            <?php if ($data["is_update"]==0): ?>
                <?php $totalgjkaryawan = $totalgjkaryawan+$data["pengeluaran"]; ?>
            <?php endif ?>
        <?php
        }
?>

  <?php if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

        $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
        $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));

        $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=3 ";

        }else {

        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        $totalperawatan=0;
        while ($data = mysqli_fetch_array($hasil)) {
        $no++;
        ?>
            <?php if ($data["is_update"]==0): ?>
                <?php $totalperawatan = $totalperawatan+$data["pengeluaran"]; ?>
            <?php endif ?>
        <?php
        }
?>
  <?php if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

        $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
        $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));

        $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=4 ";

        }else {

        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        $totalpajak=0;
        while ($data = mysqli_fetch_array($hasil)) {
        $no++;
        ?>
            <?php if ($data["is_update"]==0): ?>
                <?php $totalpajak = $totalpajak+$data["pengeluaran"]; ?>
            <?php endif ?>
        <?php
        }
?>
  <?php if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

        $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
        $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));

        $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=5 ";

        }else {

        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        $totallain=0;
        while ($data = mysqli_fetch_array($hasil)) {
        $no++;
        ?>
            <?php if ($data["is_update"]==0): ?>
                <?php $totallain = $totallain+$data["pengeluaran"]; ?>
            <?php endif ?>
        <?php
        }
?>
  
        <!-- Begin Page Content -->
        <div class="container-fluid">
         <?php if ($tanggalakhircek >= $_POST["tgl_awal"]): ?>
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Peringatan : Tanggal <?php echo date('d-m-Y', strtotime($_POST['tgl_awal'])); ?> Data Sudah Dibuat!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php $_SESSION['cekinput']="false"; ?>
        </div>
        <?php endif ?>

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

          <!-- Page Heading -->
          <!-- Content Row -->
          <div class="">

            <!-- Area Chart -->

                <!-- Card Body -->

            <!-- Pie Chart -->

                <!-- Card Header - Dropdown -->

             
             <!-- Card Body -->
          <?php if ($tanggalakhircek >= $_POST["tgl_awal"]): ?>
           <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah" disabled><i class="fa fa-plus"> Tambah</i></button>
          <?php $_SESSION['cekinput']="false"; ?>
        
        <?php endif ?>
         <?php if ($tanggalakhircek < $_POST["tgl_awal"]): ?>
           <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Tambah</i></button>
          <?php $_SESSION['cekinput']="false"; ?>
        
        <?php endif ?>         <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Rincian Data Tanggal <?php echo date('d-m-Y', strtotime($_POST['tgl_awal'])); ?> Sampai <?php  echo date('d-m-Y', strtotime($_POST['tgl_akhir'])); ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="card-header py-3">
               <p>Rincian Keperluan Biaya Perbaikan : </p>
                <p>Total : Rp.<?php echo number_format( $totalperbaikan,2,',','.') ?> </p>
            </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Perbaikan</th>
                      <th>Pengeluaran</th>
                      <th>Keterangan</th>
                      <!--     -->
                    </tr>
                  </thead>
                  <tbody>
        <?php

        
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=1";

        }else {
            
        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <?php if ($data["is_update"]==0): ?>
                <tr>
                <td><?php echo date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                 <td><?php echo $data["nama"] ?></td>
                 <td>Rp. <span style="float: right; text-align: right;"><?php echo number_format($data["pengeluaran"] ,2,',','.') ?></span></td>
                   <td><?php echo $data["keterangan"] ?></td>
            <?php endif ?>
            </tr>    
            <?php

        }
        ?>
                
              </div>

            </div>

          </div>

        </div>
    </tbody>
</table>
                  <div class="card-header py-3">
               <p>Rincian Keperluan Gaji Karyawan : </p> 
                <p>Total : Rp.<?php echo number_format( $totalgjkaryawan,2,',','.') ?> </p>
            </div>
               
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Pengeluaran</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php

        
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=2";

        }else {
            
        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <?php if ($data["is_update"]==0): ?>
                <tr>
                <td><?php echo date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                 <td><?php echo $data["nama"] ?></td>
                  <td>Rp. <span style="float: right; text-align: right;"><?php echo number_format($data["pengeluaran"] ,2,',','.') ?></span></td>
                   <td><?php echo $data["keterangan"] ?></td>
            <?php endif ?>
            </tr>    
            <?php

        }
        ?>
                
              </div>

            </div>

          </div>

        </div>
    </tbody>
</table>

                  <div class="card-header py-3">
               <p>Rincian Keperluan Biaya Perawatan : </p>
                <p>Total : <?php echo "Rp.".number_format($totalperawatan,2,',','.')  ?> </p>
            </div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Perawatan</th>
                      <th>Pengeluaran</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php

        
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=3";

        }else {
            
        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <?php if ($data["is_update"]==0): ?>
                <tr>
               <td><?php echo date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                 <td><?php echo $data["nama"] ?></td>
                <td>Rp. <span style="float: right; text-align: right;"><?php echo number_format($data["pengeluaran"] ,2,',','.') ?></span></td>
                   <td><?php echo $data["keterangan"] ?></td>
            <?php endif ?>
            </tr>    
            <?php

        }
        ?>
                
              </div>

            </div>

          </div>

        </div>
    </tbody>
</table>

                  <div class="card-header py-3">
             <p>Rincian Keperluan Biaya Pajak : </p>
                <p>Total : <?php echo "Rp.".number_format( $totalpajak,2,',','.') ?> </p>
            </div>
               
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Pajak</th>
                      <th>Pengeluaran</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php

        
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=4";

        }else {
            
        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <?php if ($data["is_update"]==0): ?>
                <tr>
                <td><?php echo date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                 <td><?php echo $data["nama"] ?></td>
                 <td>Rp. <span style="float: right; text-align: right;"><?php echo number_format($data["pengeluaran"] ,2,',','.') ?></span></td>
                   <td><?php echo $data["keterangan"] ?></td>
            <?php endif ?>
            </tr>    
            <?php

        }
        ?>
                
              </div>

            </div>

          </div>

        </div>
    </tbody>
</table>

                  <div class="card-header py-3">
              <p>Rincian Keperluan Lain - Lain : </p>
                <p>Total : <?php echo "Rp.".number_format( $totallain,2,',','.')  ?> </p>
             
            </div>

               
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Keperluan</th>
                      <th>Pengeluaran</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php

        
        if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

            $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
            $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
            $sql="select * from detail where tanggal between '".$tgl_awal."' and '".$tgl_akhir."' AND kd_detail=5";

        }else {
            
        }

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <?php if ($data["is_update"]==0): ?>
                <tr>
                <td><?php echo date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                 <td><?php echo $data["nama"] ?></td>
                 <td>Rp. <span style="float: right; text-align: right;"><?php echo number_format($data["pengeluaran"] ,2,',','.') ?></span></td>
                   <td><?php echo $data["keterangan"] ?></td>
            <?php endif ?>
            </tr>    
            <?php

        }
        ?>
                
              </div>

            </div>

          </div>

        </div>
    </tbody>
</table>
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Operasional</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="tambah-operasional.php" method="GET">
        <div class="modal-body">
         <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
        Biyaya perbaikan : 
         <input type="number" class="form-control" name="biayaperbaikan" value="<?php echo $totalperbaikan ?>" required readonly>
        Gaji karyawan : 
         <input type="number" class="form-control" name="gajikaryawan" value="<?php echo $totalgjkaryawan ?>" required readonly>
        Biyaya Perawatan : 
         <input type="number" class="form-control" name="biayaperawatan" value="<?php echo $totalperawatan ?>" required readonly>
    Pajak :
            <input type="number" class="form-control" name="pajak" value="<?php echo $totalpajak ?>" required readonly>
    Lain-Lain :
            <input type="number" class="form-control" name="lainlain" value="<?php echo $totallain ?>" required readonly>
          Dari Tanggal:
         <input type="date" class="form-control" name="tanggal" value="<?php echo $_POST['tgl_awal'] ?>" readonly >
         Sampai :
         <input type="date" class="form-control" name="tanggal2" value="<?php echo $_POST['tgl_akhir'] ?>"  readonly >
    Keterangan : 
         <input type="text" class="form-control" name="keterangan" required>
          

        </div>
        <!-- footer modal -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Tambah</button>
        </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
       
 
    </div>
        <!-- /.container-fluid -->














                

          <!-- Page Heading -->



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
</body>

</html>

















<body>
<div class="container">


        <br>
       
    <?php echo "Perbaikan : ".$totalperbaikan."<br>" ?> 
    <?php echo "Gaji Karyawan :".$totalgjkaryawan."<br>" ?> 
    <?php echo "Perawatan : ".$totalperawatan."<br>" ?> 
    <?php echo "Pajak :".$totalpajak."<br>" ?> 
    <?php echo "Lain : ".$totallain."<br>" ?> 



      </div>

    </div>
</div>
</body>
</html>