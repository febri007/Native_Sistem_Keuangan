<?php
session_start();
include('koneksi.php');
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

       
        if ($_GET['tanggal']  <= $tanggalakhircek) {
            $_SESSION['cekinput']="duplikat2";
             echo "<script>window.location.href='operasional.php';</script>"; 
        }else{

                $kddetail = $_GET['detail'];
                $tanggal = $_GET['tanggal'];
                $nama = $_GET['nama'];
                $pengeluaran = $_GET['pengeluaran'];
                $keterangan = $_GET['keterangan'];
                $id_user = $_SESSION['id'];

        if ($tanggalakhircek >=  $tanggal) {
            $_SESSION['cekinput']="duplikat";
            $id_user=null;
        }


//query update
$query = mysqli_query($koneksi,"INSERT INTO `detail` (`kd_detail`,`nama`,`pengeluaran`,`keterangan`,`tanggal`,`id_user`) VALUES ('$kddetail','$nama','$pengeluaran','$keterangan','$tanggal','$id_user')");

$check=0;
if ($query) {
$_SESSION['cekinput']="masuk"; 
$check=1;
    }
else{
    if ( $_SESSION['cekinput']=="duplikat") {
        
    }else{
         $_SESSION['cekinput']="gagal"; 
    }
 
  $check=1;
}
        }


if ($check==1) {
	
    echo "<script>window.location.href='operasional.php';</script>";
    exit;

}
//mysql_close($host);
?>