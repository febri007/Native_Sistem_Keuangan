
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
require 'cek-sesi.php';
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
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
     <?php if ($_SESSION['cekinput']=="duplikat"): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Info : Gagal, Tanggal sudah dibuat Perincian!
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

        <?php if ($_SESSION['cekinput']=="nonaktif"): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
          Info : Data Berhasil di Non-Aktifkan
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
           <?php if ($_SESSION['cekinput']=="duplikat2"): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Info : Gagal, Tanggal Yang Dimasukan Sudah Dibuat Perincian Bulanan
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php $_SESSION['cekinput']="false"; ?>
        </div>
        
          <?php endif ?>
          


  <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Operasional</i></button>
<button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambahperincian"><i class="fa fa-plus"> Tambah Perincian</i></button>
<input type="button" class="btn btn-warning" onclick="location.href='rincian.php';" value="Lihat Rincian Data" />


<br>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Operasional</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Rentang Tanggal</th>
                      <th>Biaya perbaikan</th>
                      <th>Gaji karyawan</th>
                      <th>Biaya Perawatan</th>
                      <th>Total Pajak</th>
                      <th>Lain-Lain</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
$query = mysqli_query($koneksi,"SELECT * FROM operasional");
$no = 1;
$formattedDate       = null;
$jumlah = null;
while ($data = mysqli_fetch_assoc($query)) 
{
  $formattedDate = date("d-M-Y", strtotime($data["tanggalawal"]));
  $formattedDate2 = date("d-M-Y", strtotime($data["tanggalakhir"]));
?>
  <?php if ($data['is_update']!=1): ?>
                    <tr>
                      <td><?=$formattedDate?> s/d <?=$formattedDate2?></td>
                      <td>Rp. <br><span style="float: right; text-align: right;"><?=number_format($data['biaya_perbaikan'],2,',','.');?></span>
                       <br> <input type="button" name="view" value="detail" id="<?php echo $data["id_operasional"]; ?>" class="btn btn-info btn-xs view_data" /> 
                      </td>
                      <td>Rp. <br><span style="float: right; text-align: right;"><?=number_format($data['gaji_karyawan'],2,',','.');?></span><br>
                         <input type="button" name="view" value="detail" id="<?php echo $data["id_operasional"]; ?>" class="btn btn-info btn-xs view_data2"/> 
                      </td>
                      <td>Rp. <br><span style="float: right; text-align: right;"><?=number_format($data['biaya_perawatan'],2,',','.');?></span>
                        <br><input type="button" name="view" value="detail" id="<?php echo $data["id_operasional"]; ?>" class="btn btn-info btn-xs view_data3" /> 
                      </td>
                      <td>Rp. <br><span style="float: right; text-align: right;"><?=number_format($data['pajak'],2,',','.');?></span>
                          <br><input type="button" name="view" value="detail" id="<?php echo $data["id_operasional"]; ?>" class="btn btn-info btn-xs view_data4" /> 
                      </td>
                      <td>Rp. <br><span style="float: right; text-align: right;"><?=number_format($data['lainlain'],2,',','.');?></span>
                        <br> <input type="button" name="view" value="detail" id="<?php echo $data["id_operasional"]; ?>" class="btn btn-info btn-xs view_data5" /> 
                      </td>
                       <td><?=$data['keterangan']?></td> 
<td>
    <?php if ($_SESSION['jabatan']=="pemimpin"): ?>
    <a href="#" type="button" class=" fa fa-trash-alt btn btn-danger btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_operasional']; ?>"></a>  
    <?php endif ?>
     <?php if ($_SESSION['jabatan']!="pemimpin"): ?>
    <?php echo "No Akses" ?>  
    <?php endif ?>
    


</td>
</tr>
<?php endif ?>
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_operasional']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Konfirmasi</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

  <div class="container-fluid">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Info : Data Akan Dinonaktifkan?
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>


<form role="form" action="proses-edit-operasional.php" method="get">

<?php
$id = $data['id_operasional']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM operasional WHERE id_operasional='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_operasional" value="<?php echo $row['id_operasional']; ?>">
<div class="modal-footer">  
<button type="submit" class="btn btn-danger">Nonaktif</button>
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
          <h4 class="modal-title">Tambah Data Operasional</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
     
		<form action="tampil-tambah-operasional.php" method="POST">
        <div class="modal-body">
           <div class="form-group">
            <label>Tanggal Awal</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                <input id="tgl_mulai" placeholder="masukkan tanggal Awal" type="date" class="form-control datepicker" name="tgl_awal"  value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal'];?>" required>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Akhir</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                <input id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="date" class="form-control datepicker" name="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir'];?>" required>
            </div>
        </div>
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

 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                  <h4 class="modal-title">Detail</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                       
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  

 <div id="myModalTambahperincian" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Perincian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
     
    <form action="tambah-operasional.php" method="get">
        <div class="modal-body">
         <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
          <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambahperbaikan" ><i class="fa fa-plus"> Rincian Perbaikan</i></button><br>
         <button type="button" class="btn btn-success" style="margin:5px" onclick="window.location.href='gaji.php'"><i class="fa fa-plus"> Rincian Gaji</i></button><br>
         <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambahperawatan"><i class="fa fa-plus"> Rincian Perawatan</i></button><br>
            <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambahpajak"><i class="fa fa-plus"> Rincian Pajak</i></button><br>
            <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambahlain"><i class="fa fa-plus"> Rincian Lain</i></button><br>
          
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
    </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </div>

    </div>

    <div id="myModalTambahgaji" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Gaji</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
     
    <form action="tambah-rincian.php" method="get">
        <div class="modal-body">
         <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
         <input type="hidden" name="detail" value="2">
    Nama : 
         <input type="text" class="form-control" name="nama" required>
    Pengeluaran : 
         <input type="number" class="form-control" name="pengeluaran" required>
    Tanggal : 
         <input type="date" class="form-control" name="tanggal" required>
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




  <div id="myModalTambahperbaikan" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Perbaikan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
     
    <form action="tambah-rincian.php" method="get">
        <div class="modal-body">
         <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
         <input type="hidden" name="detail" value="1">
    Perbaikan : 
         <input type="text" class="form-control" name="nama" required>
    Pengeluaran : 
         <input type="number" class="form-control" name="pengeluaran" required>
    Tanggal : 
         <input type="date" class="form-control" name="tanggal" required>
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


      <div id="myModalTambahperawatan" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Perawatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
     
    <form action="tambah-rincian.php" method="get">
        <div class="modal-body">
         <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
         <input type="hidden" name="detail" value="3">
    Perawatan : 
         <input type="text" class="form-control" name="nama" required>
    Pengeluaran : 
         <input type="number" class="form-control" name="pengeluaran" required>
    Tanggal : 
         <input type="date" class="form-control" name="tanggal" required>
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



      <div id="myModalTambahpajak" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Pajak</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
     
    <form action="tambah-rincian.php" method="get">
        <div class="modal-body">
         <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
         <input type="hidden" name="detail" value="4">
    Pajak : 
         <input type="text" class="form-control" name="nama" required>
    Pengeluaran : 
         <input type="number" class="form-control" name="pengeluaran" required>
    Tanggal : 
         <input type="date" class="form-control" name="tanggal" required>
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

      <div id="myModalTambahlain" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Lain-Lain</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
     
    <form action="tambah-rincian.php" method="get">
        <div class="modal-body">
         <input type="hidden" class="form-control" name="iduser" value="<?=$_SESSION['id']?>" readonly>
         <input type="hidden" name="detail" value="5">
    Keperluan : 
         <input type="text" class="form-control" name="nama" required>
    Pengeluaran : 
         <input type="number" class="form-control" name="pengeluaran" required>
    Tanggal : 
         <input type="date" class="form-control" name="tanggal" required>
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
  <script type="text/javascript">
    $(document).ready(function(){
  $("#mytable1").show();
      $("#mytable2").hide();

      $("#button1").click(function(){
            $("#text").html("Default List Name");
        $("#mytable2").hide();
        $("#mytable1").show();

      });

      $("#button2").click(function(){
        $("#mytable1").hide();
        $("#mytable2").show();
            $("#text").html("Second List Name");
      });
});
  </script>
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

 <script type="text/javascript">
  $(document).ready(function(){  
      $('.view_data').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
  <script type="text/javascript">
  $(document).ready(function(){  
      $('.view_data2').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"select2.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
 <script type="text/javascript">
  $(document).ready(function(){  
      $('.view_data3').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"select3.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
 <script type="text/javascript">
  $(document).ready(function(){  
      $('.view_data4').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"select4.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
 <script type="text/javascript">
  $(document).ready(function(){  
      $('.view_data5').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"select5.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>