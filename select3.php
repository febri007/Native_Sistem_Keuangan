<?php require 'koneksi.php'; ?>
<?php  
 if(isset($_POST["id"]))  
 {  

      $output = '';  
       $id = $_POST["id"];
       $querycaritanggalawal = mysqli_query($koneksi, "SELECT tanggalawal FROM operasional WHERE id_operasional = $id");   
       $tanggalawalarray = mysqli_fetch_array($querycaritanggalawal);
       $tanggalawal = $tanggalawalarray[0];
       // echo $tanggalawal;



       //query cari tanggal akhir
        $querycaritanggalakhir = mysqli_query($koneksi, "SELECT tanggalakhir FROM operasional WHERE id_operasional = $id");   
       $tanggalakhirarray = mysqli_fetch_array($querycaritanggalakhir);
       $tanggalakhir = $tanggalakhirarray[0];
       // echo $tanggalakhir;

      $query = "select * from detail where tanggal between '".$tanggalawal."' and '".$tanggalakhir."' AND kd_detail=3";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
           <thead> <tr>
           <td> Tanggal </td>
           <td> Perawatan </td>
           <td> Pengeluaran </td>
           <td> Keterangan </td>';

      while($row = mysqli_fetch_array($result))  
      {  
          if ($row["is_update"]==0) {
            $formattedDate2 = date("d/M/Y", strtotime($row["tanggal"]));
               $output .= '  
                <tr>   
                     <td width="70%">'.$formattedDate2.'</td>             
                     <td width="70%">'.$row["nama"].'</td>               
                     <td width="70%"> Rp. '.$row["pengeluaran"].'</td>            
                     <td width="70%">'.$row["keterangan"].'</td>  
                </tr>  
                ';  
          }
        
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>