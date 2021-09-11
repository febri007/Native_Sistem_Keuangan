<?php  
require 'cek-sesi.php';
require 'koneksi.php';
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
$user = $_SESSION['id'];
$number = count($_POST["name"]);  

 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
        if ($tanggalakhircek >= $_POST["tanggal"][$i]) {
          $_SESSION['cekinput']="duplikat2";
          $number = null; 
          break;
        }
           if(trim($_POST["name"][$i] != ''))  
           {  
                $sql = "INSERT INTO detail (nama,pengeluaran,keterangan,tanggal,kd_detail,id_user) VALUES('".mysqli_real_escape_string($koneksi, $_POST["name"][$i])."','".mysqli_real_escape_string($koneksi, $_POST["total"][$i])."','".mysqli_real_escape_string($koneksi, $_POST["keterangan"][$i])."','".mysqli_real_escape_string($koneksi, $_POST["tanggal"][$i])."','".mysqli_real_escape_string($koneksi, $_POST["kddetail"][$i])."','$user')";  
                mysqli_query($koneksi, $sql);  
                $_SESSION['cekinput']="masuk";
           }  
      }  
      
      
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 ?> 
   