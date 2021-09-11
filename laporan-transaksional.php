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

  <title>Laporan Transaksional</title>
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
require 'sidebar.php'; 
 require 'navbar.php'; 


// Load file koneksi.php
include "koneksi.php";
?>

<html>
<head>
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->
</head>
<body>
  <div class="container-fluid">
    <h2>Cetak Data Transaksional</h2><hr>
    

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter" class="form-control">
            <option value="">Pilih</option>
           <!--  <option value="1">Per Tanggal</option> -->
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
                $query = "SELECT YEAR(tgl_pengeluaran) AS tahun FROM belanja GROUP BY YEAR(tgl_pengeluaran)"; // Tampilkan tahun sesuai di tabel transaksi
                $query2 = "SELECT YEAR(tgl_pemasukan) AS tahun FROM pemasukan GROUP BY YEAR(tgl_pemasukan)"; // Tampilkan tahun sesuai di tabel transaksi
                $query3 = "SELECT YEAR(tanggalawal) AS tahun FROM operasional GROUP BY YEAR(tanggalawal)"; // Tampilkan tahun sesuai di tabel transaksi
                $query4 = "SELECT YEAR(tgl_hutang) AS tahun FROM hutang GROUP BY YEAR(tgl_hutang)"; // Tampilkan tahun sesuai di tabel transaksi
                $query5 = "SELECT YEAR(tanggal_byr) AS tahun FROM pembayaran_hutang GROUP BY YEAR(tanggal_byr)"; // Tampilkan tahun sesuai di tabel transaksi

                $sql = mysqli_query($connect, $query); 
                $sql2 = mysqli_query($connect, $query2);
                $sql3 = mysqli_query($connect, $query3);
                $sql4 = mysqli_query($connect, $query4);
                $sql5 = mysqli_query($connect, $query5);// Eksekusi/Jalankan query dari variabel $query

                echo "<option value='2019'>2019</option>";
                echo "<option value='2020'>2020</option>";
                echo "<option value='2021'>2021</option>";
                echo "<option value='2022'>2022</option>";
                echo "<option value='2023'>2023</option>";
                // while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                //     echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                // }
                // while($data = mysqli_fetch_array($sql2)){ // Ambil semua data dari hasil eksekusi $sql
                //     echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                // }
                // while($data = mysqli_fetch_array($sq3)){ // Ambil semua data dari hasil eksekusi $sql
                //     echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                // }
                // while($data = mysqli_fetch_array($sql4)){ // Ambil semua data dari hasil eksekusi $sql
                //     echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                // }
                // while($data = mysqli_fetch_array($sql5)){ // Ambil semua data dari hasil eksekusi $sql
                //     echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                // }
                ?>
            </select>
            <br /><br />
        </div>

        <button type="submit" class="btn btn-success">Tampilkan</button>
        <a href="laporan-belanja.php" class="btn btn-danger">Reset Filter</a>
    </form>
  </div>
</div>
    <hr />

    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<b>Klik Tombol Dibawah Untuk Mencetak Data Belanja Tanggal '.$tgl.'</b><br /><br />';
            echo '<a class="btn btn-success" style="color:white;"  href="print-transaksional.php?filter=1&tanggal='.$_GET['tanggal'].'">PDF</a><br /><br />';

            $query = "SELECT * FROM belanja inner join user inner join sumber WHERE DATE(tgl_pengeluaran)='".$_GET['tanggal']."' AND belanja.id_sumber = sumber.id_sumber AND sumber.id_sumber = belanja.id_sumber AND belanja.id_user = user.id_user AND user.id_user = belanja.id_user"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Klik Tombol Dibawah Untuk Mencetak Data Transaksional Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
            echo '<a class="btn btn-success" style="color:white;" href="print-transaksional.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'"> PDF</a><br /><br />';

            $query = "SELECT * FROM belanja WHERE MONTH(tgl_pengeluaran)='".$_GET['bulan']."' AND YEAR(tgl_pengeluaran)='".$_GET['tahun']."' "; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
            $querypemasukan = "SELECT * FROM pemasukan WHERE MONTH(tgl_pemasukan)='".$_GET['bulan']."' AND YEAR(tgl_pemasukan)='".$_GET['tahun']."' "; 
            $queryoperasional = "SELECT * FROM operasional WHERE MONTH(tanggalawal)='".$_GET['bulan']."' AND YEAR(tanggalawal)='".$_GET['tahun']."' "; 
            $hutang = "SELECT * FROM hutang WHERE MONTH(tgl_hutang)='".$_GET['bulan']."' AND YEAR(tgl_hutang)='".$_GET['tahun']."' "; 
            $bayarhtg = "SELECT * FROM pembayaran_hutang WHERE MONTH(tanggal_byr)='".$_GET['bulan']."' AND YEAR(tanggal_byr)='".$_GET['tahun']."' "; 
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Klik Tombol Dibawah Untuk Mencetak Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';
            echo '<a class="btn btn-success" style="color:white;" href="print-transaksional.php?filter=3&tahun='.$_GET['tahun'].'"> PDF</a><br /><br />';


            $query = "SELECT * FROM belanja WHERE YEAR(tgl_pengeluaran)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
            $querypemasukan = "SELECT * FROM pemasukan WHERE YEAR(tgl_pemasukan)='".$_GET['tahun']."'"; // Tampilkan tahun sesuai di tabel transaksi
            $queryoperasional = "SELECT * FROM operasional WHERE YEAR(tanggalawal)='".$_GET['tahun']."'"; // Tampilkan tahun sesuai di tabel transaksi
            $hutang = "SELECT * FROM hutang WHERE YEAR(tgl_hutang)='".$_GET['tahun']."'"; // Tampilkan tahun sesuai di tabel transaksi
            $bayarhtg = "SELECT * FROM pembayaran_hutang WHERE YEAR(tanggal_byr)='".$_GET['tahun']."'";
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Klik Tombol Dibawah Untuk Mencetak Semua Data Transaksi</b><br /><br />';
        echo '<a class="btn btn-success" href="print-transaksional.php" style="color:white;"> PDF</a><br /><br />';

        $query = "SELECT * FROM belanja;"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
        $querypemasukan = "SELECT * FROM pemasukan"; 
        $queryoperasional = "SELECT * FROM operasional"; 
        $hutang = "SELECT * FROM hutang";
        $bayarhtg = "SELECT * FROM pembayaran_hutang";
    } 
    ?>



    <div class="card shadow mb-4">
      <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Transaksional</h6>
            </div>

    <?php
    $sql = mysqli_query($connect, $query); 
    $querypemasukan = mysqli_query($connect, $querypemasukan);
    $queryoperasional = mysqli_query($connect, $queryoperasional);
    $hutang = mysqli_query($connect, $hutang);
    $bayarhtg = mysqli_query($connect, $bayarhtg);


     // Ambil jumlah data dari hasil eksekusi $sql



    $ttl=0; $ttl2=0; $perbaikansql= 0;$perbaikan=0; $perawatan=0; $gaji=0; $hhutang=0; $bhutang=0;$pajak=0;$lainlain=0;
     // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
           if ($data['is_update']!=1) {
            $ttl = $ttl + $data['jumlah'];
        }
        }
        while($data2 = mysqli_fetch_array($querypemasukan)){ // Ambil semua data dari hasil eksekusi $sql
            if ($data2['is_update']!=1) {
            $ttl2 = $ttl2 + $data2['jumlah'];
        }
            
        }
        while($perbaikansql = mysqli_fetch_array($queryoperasional)){ // Ambil semua data dari hasil eksekusi $sql
            if ($perbaikansql['is_update']!=1) {
            $perbaikan = $perbaikan + $perbaikansql['biaya_perbaikan'];
            $gaji = $gaji + $perbaikansql['gaji_karyawan'];
            $perawatan = $perawatan + $perbaikansql['biaya_perawatan'];
             $pajak = $pajak + $perbaikansql['pajak'];
              $lainlain = $lainlain + $perbaikansql['lainlain'];
        }
        }
        while($hutang1 = mysqli_fetch_array($hutang)){ // Ambil semua data dari hasil eksekusi $sql
            if ($hutang1['is_updateh']!=1) {
            $hhutang = $hhutang + $hutang1['jumlah'];
        }
        }
        while($bayarhutang = mysqli_fetch_array($bayarhtg)){ // Ambil semua data dari hasil eksekusi $sql
            if ($bayarhutang['is_updatebh']!=1) {
            $bhutang = $bhutang + $bayarhutang['dibayar_hutang'];
        }
        }
       ?> <div class="modal-header">
        <table  cellspacing="0" border="0" cellpadding="3">
            <thead>
                <tr>
                    <td><b></b></td>
                    <td><b></b></td>
                </tr>
            </thead>
            <tbody>
                <?php if ($data['is_update']!=1): ?>
                    
                
                <tr>
        <td><?php echo " Total Belanja";?></td>
        <td> = Rp. <span style="float: right; text-align: right;"><?php echo number_format($ttl,2,',','.'); ?></span></td></tr>

        <tr><td><?php echo "Total Pemasukan"?></td>
        <td>= Rp. <span style="float: right; text-align: right;"><?php echo  number_format($ttl2,2,',','.'); ?></span></td>
        </tr>

        <tr><td><?php echo "Total Beban Biaya Perbaikan"?></td>
           <td>= Rp. <span style="float: right; text-align: right;"> <?php echo  number_format($perbaikan,2,',','.'); ?></span></td> 
            </tr>
        <tr><td><?php echo "Total Beban Gaji Karyawan"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"> <?php echo  number_format($gaji,2,',','.'); ?></span></td>
            </tr>

        <tr><td><?php echo "Total Beban Biaya Perawatan"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo number_format($perawatan,2,',','.'); ?></span></td>
        </tr>
        <tr><td><?php echo "Total Pengeluaran Pajak"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo number_format($pajak,2,',','.'); ?></span></td>
        </tr>
        <tr><td><?php echo "Total Pengeluaran Lain-Lain"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo  number_format($lainlain,2,',','.'); ?></span></td>
        </tr>
        <tr><td><?php echo "Pembayaran Hutang"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo number_format($bhutang,2,',','.'); ?></span></td>
        </tr>
        <tr><td></td>
            <td></td>
        </tr>
        <tr><td><hr></td>
            <td><hr></td>
        </tr>
        <tr><td><?php echo "<b>Pengeluaran Keseluruhan</b>"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo"<b>". number_format($ttl+$pajak+$lainlain+$perbaikan+$gaji+$perawatan+$bhutang ,2,',','.');?></span></td>
        </tr>
        <tr><td><?php echo "<b>Keuntungan</b>"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo"<b>".number_format($ttl2-($ttl+$pajak+$lainlain+$perbaikan+$gaji+$perawatan+$bhutang) ,2,',','.');?></span></td>
        </tr>
        <tr><td><hr></td>
            <td><hr></td>
        </tr>
        <tr><td></td>
            <td></td>
        </tr>
     <!--    <tr><td><?php echo "Hutang"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo number_format($hhutang,2,',','.'); ?></span></td>
        </tr>
        <tr><td><?php echo "Pembayaran Hutang"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo number_format($bhutang,2,',','.'); ?></span></td>
        </tr>
        <tr><td><hr></td>
            <td><hr></td>
        </tr> -->
       <!--  <tr><td><?php echo "<b>Sisa Hutang</b>"?></td>
            <td>= Rp. <span style="float: right; text-align: right;"><?php echo"<b>". number_format($hhutang-$bhutang,2,',','.');?></span></td>
        </tr> -->
        <?php endif ?>
            </tbody>
        </table>
        <?php

     
        ?><br>
</div>
</div>
<?php require 'footer.php'?>
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
