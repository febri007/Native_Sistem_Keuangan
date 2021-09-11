<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laporan Keuangan</title>
  <link rel="icon" href="img/iconbatik.png">
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php 
require 'sidebar.php'; ?>
<?php require 'navbar.php'; ?>

<?php
// Load file koneksi.php
include "koneksi2.php";
?>

<html>
<head>
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->
</head>
<body>
  <div class="container-fluid">
    <h2>Cetak Data Pendapatan</h2><hr>
    

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter" class="form-control">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />

        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal form-control" />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan" class="form-control">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun" class="form-control">
                <option value="">Pilih</option>
                <?php
                $query = "SELECT YEAR(tgl_pemasukan) AS tahun FROM pemasukan GROUP BY YEAR(tgl_pemasukan)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query

                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

        <button type="submit" class="btn btn-success">Tampilkan</button>
        <a href="laporan-pendapatan.php" class="btn btn-danger">Reset Filter</a>
    </form>
  </div>
</div>
    <hr />

    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<b>Klik Tombol Dibawah Untuk Mencetak Data Pendapatan Tanggal '.$tgl.'</b><br /><br />';
            echo '<a class="btn btn-success" style="color:white;"  href="print.php?filter=1&tanggal='.$_GET['tanggal'].'"> PDF</a><br /><br />';

            $query = "SELECT * FROM pemasukan WHERE DATE(tgl_pemasukan)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Klik Tombol Dibawah Untuk Mencetak Data Pendapatan Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
            echo '<a class="btn btn-success" style="color:white;" href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'"> PDF</a><br /><br />';

            $query = "SELECT * FROM pemasukan WHERE MONTH(tgl_pemasukan)='".$_GET['bulan']."' AND YEAR(tgl_pemasukan)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Klik Tombol Dibawah Untuk Mencetak Data Pendapatan Tahun '.$_GET['tahun'].'</b><br /><br />';
            echo '<a class="btn btn-success" style="color:white;" href="print.php?filter=3&tahun='.$_GET['tahun'].'"> PDF</a><br /><br />';

            $query = "SELECT * FROM pemasukan WHERE YEAR(tgl_pemasukan)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Klik Tombol Dibawah Untuk Mencetak Semua Data Pendapatan</b><br /><br />';
        echo '<a class="btn btn-success" href="print.php" style="color:white;"> PDF</a><br /><br />';

        $query = "SELECT * FROM pemasukan ORDER BY tgl_pemasukan"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }
    ?>



    <div class="card shadow mb-4">
      <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Data Pendapatan</h6>
            </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1" cellpadding="8">
    <tr>
        <th>Tanggal </th>
        <th>Jumlah</th>
        <!-- <th>Total</th> -->
        <!-- <th>Jumlah</th>
        <th>Total Harga</th> -->
    </tr>

    <?php
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
    $ttl=0;
    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            $tgl = date('d-m-Y', strtotime($data['tgl_pemasukan'])); // Ubah format tanggal jadi dd-mm-yyyy
             if ($data['is_update']!=1) {
            echo "<tr>";
            // echo "<td>".$tgl."</td>";
            echo "<td>".$data['tgl_pemasukan']."</td>";
            echo "<td> <span style='float: right; text-align: right;'>".number_format($data['jumlah'],2,',','.')."</span></td>";
            // echo "<td>".$data['jumlah']."</td>";
            // echo "<td>".$data['total_harga']."</td>";
            $ttl = $ttl + $data['jumlah'];
            echo "</tr>";
            }
        }
        echo "Total Pemasukan = ".number_format($ttl,2,',','.') ."<br>";
        ?><br><?php
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    }
    ?>
    </table>
  </div>
</div>
</div>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
    <script src="plugin/jquery-ui/jquery-ui.min.js"></script>
    </div> <!-- Load file plugin js jquery-ui -->
</body>
</html>
  
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
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
