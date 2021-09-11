 <?php
  require 'cek-sesi.php';
   if($_SESSION['status']!="login" ){
  header("Refresh:0; url=login.php");
  exit();
  }
  ?>
  <?php

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

header('Location: error_phone.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <script src="js/ajax.js"></script>           
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Dashboard</title>
  <link rel="icon" href="img/iconbatik.png">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body id="page-top">

<?php
require ('koneksi.php');
require ('sidebar.php');



// @$karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
// $karyawan = mysqli_num_rows($karyawan);

$pengeluaran_hari_ini = mysqli_query($koneksi, "SELECT sum(jumlah) FROM belanja where tgl_pengeluaran = CURDATE() AND is_update!='1'");
$pengeluaran_hari_ini = mysqli_fetch_array($pengeluaran_hari_ini);
 
$pemasukan_hari_ini = mysqli_query($koneksi, "SELECT sum(jumlah) FROM pemasukan where tgl_pemasukan = CURDATE() AND is_update!='1'");
$pemasukan_hari_ini = mysqli_fetch_array($pemasukan_hari_ini);




$cekkemarinm = mysqli_query($koneksi, "SELECT jumlah FROM pemasukan where tgl_pemasukan = CURDATE()  - INTERVAL 1 DAY AND is_update!='1'");
$cekkemarinm = mysqli_fetch_array($cekkemarinm);

$cekkemarin = mysqli_query($koneksi, "SELECT jumlah FROM belanja where tgl_pengeluaran = CURDATE()  - INTERVAL 1 DAY AND is_update!='1'");
$cekkemarin = mysqli_fetch_array($cekkemarin);


// @$pemasukan=mysqli_query($koneksi,"SELECT * FROM pemasukan");
// while ($masuk=mysqli_fetch_array($pemasukan)){
// @$arraymasuk[] = $masuk['jumlah'];
// }
// @$jumlahmasuk = array_sum($arraymasuk);


// @$pengeluaran=mysqli_query($koneksi,"SELECT * FROM belanja");
// while ($keluar=mysqli_fetch_array($pengeluaran)){
// @$arraykeluar[] = $keluar['jumlah'];
// }
// @$jumlahkeluar = array_sum($arraykeluar);


// @$uang = $jumlahmasuk - $jumlahkeluar;

//untuk data chart area
 $querys = "SELECT * FROM belanja;"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
        $querypemasukan = "SELECT * FROM pemasukan"; 
        $queryoperasional = "SELECT * FROM operasional"; 
        $hutang = "SELECT * FROM hutang";
        $bayarhtg = "SELECT * FROM pembayaran_hutang";
        $kegiatanhariini = "SELECT * FROM kegiatan where tanggal = CURDATE()";
        $kegiatanhariesok = "SELECT * FROM kegiatan where tanggal = CURDATE()+1";
        $kegiatanhariesok2 = "SELECT * FROM kegiatan where tanggal = CURDATE()+2";
        $kegiatanhariesok3 = "SELECT * FROM kegiatan where tanggal = CURDATE()+3";
        $kegiatanhariesok4 = "SELECT * FROM kegiatan where tanggal = CURDATE()+4";



        $sql21 = mysqli_query($connect, $querys); 
    $querypemasukan = mysqli_query($connect, $querypemasukan);
    $queryoperasional = mysqli_query($connect, $queryoperasional);
    $hutang = mysqli_query($connect, $hutang);
    $bayarhtg = mysqli_query($connect, $bayarhtg);
    $kegiatanhariini = mysqli_query($connect, $kegiatanhariini); 
    $kegiatanhariesok = mysqli_query($connect, $kegiatanhariesok); 
    $kegiatanhariesok2 = mysqli_query($connect, $kegiatanhariesok2);
    $kegiatanhariesok3 = mysqli_query($connect, $kegiatanhariesok3);
    $kegiatanhariesok4 = mysqli_query($connect, $kegiatanhariesok4);

// $sekarang =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
// WHERE tgl_pemasukan = CURDATE()");
// $sekarang = mysqli_fetch_array($sekarang);
$satuhariq =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 0 DAY AND is_update = '0'");
$sss = 0;
while($data = mysqli_fetch_array($satuhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $sss = $sss + $data['jumlah'];
}

$satuhariq =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 1 DAY AND is_update = '0'");
$satuhari = 0;
while($data = mysqli_fetch_array($satuhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $satuhari = $satuhari + $data['jumlah'];
}

$duahari = 0;
$duahariq =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 2 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($duahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $duahari = $duahari + $data['jumlah'];
}
$tigahari = 0;
$tigahariq =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 3 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($tigahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $tigahari = $tigahari + $data['jumlah'];
}
$empathari = 0;
$empathariq =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 4 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($empathariq)){ // Ambil semua data dari hasil eksekusi $sql
    $empathari = $empathari + $data['jumlah'];
}
$limahari = 0;
$limahariq =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 5 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($limahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $limahari = $limahari + $data['jumlah'];
}
$enamhari = 0;
$enamhariq =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 6 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($enamhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $enamhari = $enamhari + $data['jumlah'];
}
$tujuhhari = 0;
$tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 7 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $tujuhhari = $tujuhhari + $data['jumlah'];
}


//grafik pengeluaran
$ss=0;
$satuhariq = mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 0 DAY AND is_update = '0'");
$satuhari2 = 0;
while($data = mysqli_fetch_array($satuhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $ss = $ss + $data['jumlah'];
}
$satuhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 1 DAY AND is_update = '0'");
$satuhari2 = 0;
while($data = mysqli_fetch_array($satuhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $satuhari2 = $satuhari2 + $data['jumlah'];
}

$duahari2 = 0;
$duahariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 2 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($duahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $duahari2 = $duahari2 + $data['jumlah'];
}
$tigahari2 = 0;
$tigahariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 3 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($tigahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $tigahari2 = $tigahari2 + $data['jumlah'];
}
$empathari2 = 0;
$empathariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 4 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($empathariq)){ // Ambil semua data dari hasil eksekusi $sql
    $empathari2 = $empathari2 + $data['jumlah'];
}
$limahari2 = 0;
$limahariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 5 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($limahariq)){ // Ambil semua data dari hasil eksekusi $sql
    $limahari2 = $limahari2 + $data['jumlah'];
}
$enamhari2 = 0;
$enamhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 6 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($enamhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $enamhari2 = $enamhari2 + $data['jumlah'];
}
$tujuhhari2 = 0;
$tujuhhariq =mysqli_query($koneksi, "SELECT jumlah FROM belanja
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 7 DAY AND is_update = '0'");
while($data = mysqli_fetch_array($tujuhhariq)){ // Ambil semua data dari hasil eksekusi $sql
    $tujuhhari2 = $tujuhhari2 + $data['jumlah'];
}







    $ttl=0; $ttl2=0; $perbaikansql= 0;$perbaikan=0; $perawatan=0; $gaji=0; $hhutang=0; $bhutang=0;
     // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql21)){ // Ambil semua data dari hasil eksekusi $sql
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
        
?>
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<!-- <h3> Selamat Datang, <?=$_SESSION['nama']?></h3> -->
<!-- <h5>Sistem Pelaporan Keuangan</h5> -->
<h5 class="h5 mb-0 text-gray-800"><?php echo "Dashboard, waktu server : " . date("d-M-Y") . "<br>"; ?></h5>

<?php require 'user.php'; ?>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

      <?php if ($cekkemarin['0']==null): ?>
         <div class="container-fluid">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Peringatan : Kemarin belum menginputkan Data Belanja !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <?php endif ?>
      <?php if ($cekkemarinm['0']==null): ?>
         <div class="container-fluid">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Peringatan : Kemarin belum menginputkan Data Pemasukan !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <?php endif ?>


        <div class="container-fluid">
                <!--   <div class="alert alert-success alert-dismissible fade show" role="alert">
          Selamat Datang Yth. <?=$_SESSION['nama']?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->

       


          <!-- Page Heading --> 
          
          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            
            <!-- <a href="export-semua.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-13 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukan (Hari Ini)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($pemasukan_hari_ini['0'],2,',','.');?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div> 
            </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-13 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Belanja (Hari Ini)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($pengeluaran_hari_ini['0'],2,',','.');?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          
            <!-- Earnings (Monthly) Card Example -->
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Pemasukan</h6>
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

                <!-- Card Body -->
               
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Belanja</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart2"></canvas>
                  </div>
                </div>
              </div>
            </div>
              </div>
            </div>
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php require 'logout-modal.php'; ?>

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
    labels: ["6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "Kemarin", "Sekarang"],
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
      data: [ <?php echo $enamhari ?>, <?php echo $limahari ?>, <?php echo $empathari ?>, <?php echo $tigahari ?>, <?php echo $duahari ?>, <?php echo $satuhari ?>, <?php echo $sss ?>],
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
var ctx = document.getElementById("myAreaChart2");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "Kemarin", "Sekarang"],
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
      data: [ <?php echo $enamhari2 ?>, <?php echo $limahari2 ?>, <?php echo $empathari2 ?>, <?php echo $tigahari2 ?>, <?php echo $duahari2 ?>, <?php echo $satuhari2 ?>, <?php echo $ss ?>],
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
