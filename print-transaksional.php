<?php
require 'cek-sesi.php';
?>
<?php ob_start(); ?>
<html>
<head>
    <title>Cetak PDF</title>
    <style>
        p {
            margin: 2;
            padding: 2;
        }


/*.tandatangan{
    text-align:center; width:425px;float:left;
}

.tandatangan2{
    text-align:center; margin-left:545px;
}*/

.kop{
    text-align:center;
    margin-left:0px;
    width:270px;
    margin-bottom:-10px;
}
 body{
        font-size:11px;   
    }
    .tandatangan{
        text-align:center; width:325px;float:left;
    }
    .hrs{
         text-align:center; width:600px; margin-left:100px;
    }
    .tandatangan2{
        text-align:center; width:125px; margin-left:545px;
    }  
    </style>
</head>
<body><br><br><br>
    <div class="hrs">
        
    
    <p align="right" style="color: black; font-size: 11px;">Laporan pemasukan, <?=$_SESSION['nama']?> , <?php echo (new \DateTime())->format('d-m-Y:H:i:s');?></p></div>
    <br><br><p align="center" style="color: black; font-size: 18px;"><b>KUSUMA JAYA BATIK</b></p>
            <p align="center" style="color: black; font-size: 14px;">Desa Gendekan 02/09 Tlogoadi Mlati Sleman Yogyakarta 55284</p>
            <p align="center" style="color: black; font-size: 12px;">Telp : (0274) 44157 E-mail : kusumajayabatik@yahoo.co.id HP : (+62) 0877 0212 0111</p>
            <div class="hrs"><hr></div><br>
            <p style='text-align:center; font-size: 18px;'>Laporan Keuangan</p><br><br>
        <div style="position:relative;left:100px; margin-right:150px">
    <?php
    // Load file koneksi.php
    include "koneksi.php";

    

    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));
            ?>

            
             <?php
          
            echo "Kepada :<br>";
            echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
            echo "Hal : Laporan Keuangan<br>";
            echo 'Ket : Laporan Operasional Tanggal '.$tgl.'<br /><br />';

            $query = "SELECT * FROM operasional inner join hutang WHERE DATE(tanggalawal)='".$_GET['tanggal']."' and operasional.id_hutang = hutang.id_hutang AND hutang.id_hutang = operasional.id_hutang"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            ?>
            
             <?php
    
            echo "Kepada :<br>";
            echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
            echo "Hal : Laporan Keuangan<br>";
            echo 'Ket : Laporan Transaksional Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'<br /><br />';

            $query = "SELECT * FROM belanja WHERE MONTH(tgl_pengeluaran)='".$_GET['bulan']."' AND YEAR(tgl_pengeluaran)='".$_GET['tahun']."' "; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
            $querypemasukan = "SELECT * FROM pemasukan WHERE MONTH(tgl_pemasukan)='".$_GET['bulan']."' AND YEAR(tgl_pemasukan)='".$_GET['tahun']."' "; 
            $queryoperasional = "SELECT * FROM operasional WHERE MONTH(tanggalawal)='".$_GET['bulan']."' AND YEAR(tanggalawal)='".$_GET['tahun']."' "; 
            $hutang = "SELECT * FROM hutang WHERE MONTH(tgl_hutang)='".$_GET['bulan']."' AND YEAR(tgl_hutang)='".$_GET['tahun']."' "; 
            $bayarhtg = "SELECT * FROM pembayaran_hutang WHERE MONTH(tanggal_byr)='".$_GET['bulan']."' AND YEAR(tanggal_byr)='".$_GET['tahun']."' "; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            ?>
            
             <?php
           
            echo "Kepada :<br>";
            echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
            echo "Hal : Laporan Keuangan<br>";
            echo 'Ket : Laporan Transaksional Tahun '.$_GET['tahun'].'<br /><br />';

            $query = "SELECT * FROM belanja WHERE YEAR(tgl_pengeluaran)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
            $querypemasukan = "SELECT * FROM pemasukan WHERE YEAR(tgl_pemasukan)='".$_GET['tahun']."'"; // Tampilkan tahun sesuai di tabel transaksi
            $queryoperasional = "SELECT * FROM operasional WHERE YEAR(tanggalawal)='".$_GET['tahun']."'"; // Tampilkan tahun sesuai di tabel transaksi
            $hutang = "SELECT * FROM hutang WHERE YEAR(tgl_hutang)='".$_GET['tahun']."'"; // Tampilkan tahun sesuai di tabel transaksi
            $bayarhtg = "SELECT * FROM pembayaran_hutang WHERE YEAR(tanggal_byr)='".$_GET['tahun']."'";
        }
    }else{ // Jika user tidak memilih filter
        ?>
             <?php
           
            echo "Kepada :<br>";
            echo "Yth. Pimpinan Kusuma Jaya Batik<br>";
            echo "Hal : Laporan Keuangan<br>";
            echo 'Ket : Semua Data Transaksional<br /><br />';

        $query = "SELECT * FROM belanja;"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
        $querypemasukan = "SELECT * FROM pemasukan"; 
        $queryoperasional = "SELECT * FROM operasional"; 
        $hutang = "SELECT * FROM hutang";
        $bayarhtg = "SELECT * FROM pembayaran_hutang";
    }
    ?>

    <?php echo " Dengan ini Saya Melaporkan : <br>" ?>
    <table width="80%" height="200px">
    <tr>
        
        <th></th>
        <th></th>
        <th></th>
<!--        <th>Barang</th>
        <th>Jumlah</th>
        <th>Total Harga</th> -->
    </tr>

    <?php
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    //$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
    $querypemasukan = mysqli_query($connect, $querypemasukan);
    $queryoperasional = mysqli_query($connect, $queryoperasional);
    $hutang = mysqli_query($connect, $hutang);
    $bayarhtg = mysqli_query($connect, $bayarhtg);


     // Ambil jumlah data dari hasil eksekusi $sql



    $ttl=0; $ttl2=0; $perbaikansql= 0;$perbaikan=0; $perawatan=0; $gaji=0; $hhutang=0; $bhutang=0; $totals=0; $sisahutang=0; $ttlpengeluaran=0;$pajak=0;$lainlain=0;
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
        ?>
        <?php $totals=$ttl+$perbaikan+$gaji+$perawatan+$bhutang; 
        $sisahutang=$hhutang-$bhutang;
        $ttlpengeluaran = $ttl+$perbaikan+$gaji+$perawatan+$bhutang+$pajak+$lainlain;
        $keuntungan = $ttl2 - $ttlpengeluaran;
        ?>

        <tr>
            <td>Total Belanja</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($ttl,2,',','.') ?></span></td>
        </tr>
        <tr>
            <td>Total Pemasukan</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($ttl2,2,',','.') ?></span></td>
        </tr>
        <tr>
            <td>Total Biaya Perbaikan</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($perbaikan,2,',','.') ?></span></td>
        </tr>
        <tr>
            <td>Total Biaya Gaji Karyawan</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($gaji,2,',','.') ?></span></td>
        </tr>
        <tr>
            <td>Total Biaya Perawatan</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($perawatan,2,',','.') ?></span></td>
        </tr>
        <tr>
            <td>Total Biaya Pajak</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($pajak,2,',','.') ?></span></td>
        </tr>
        <tr>
            <td>Total Biaya Lain-Lain</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($gaji,2,',','.') ?></span></td>
        </tr>
         <tr>
            <td>Total Bayar Hutang</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($bhutang,2,',','.') ?></span></td>
        </tr>
        <tr><br>
            <td>Total Pengeluaran</td>
            <td>= Rp. </td><b>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($ttlpengeluaran,2,',','.') ?></span></td></b>
        </tr>
        <tr>
            <td>Total Keuntungan</td>
            <td>= Rp. </td><b>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($keuntungan,2,',','.') ?></span></td></b>
        </tr>
     <!--    <tr>
            <td>Total Hutang</td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($hhutang,2,',','.') ?></span></td>
        </tr> -->
       
       <!--  <tr>
            <td>Sisa Hutang </td>
            <td>= Rp. </td>
            <td style="text-align: right;"><span style="float: right; text-align: right;"><?= number_format($sisahutang,2,',','.') ?></span></td>
        </tr> -->
            <?php
    // echo "Total Pemasukan = ".number_format($ttl,2,',','.') ."<br>";
 //        ?><br><?php
    ?>
    </table>
    
        <br>
        <p>Laporan Keuangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya. Laporan ini dibuat oleh <?=$_SESSION['nama']?> pada tanggal <?php echo (new \DateTime())->format('d-m-Y');?></p>
    
<br><br></div>
<div class="tandatangan2">
    <br/>
    Sleman, <?php echo (new \DateTime())->format('d-m-Y');?><br>
    Mengetahui<br/><br/><br/><br/>
  <br />
<br/><hr/>
    Nur Alifah<br>
    Bag. Keuangan 
</div>

    

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Transaksional.pdf', 'D');
?>
