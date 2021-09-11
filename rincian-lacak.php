   
     <!-- Main Content -->

      <div id="content">

          <div class="row">
<div class="container-fluid">
            <!-- Content Column -->
            		  
			           <!-- DataTales Example -->
					   
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Histori Data Rincian</h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Perincian</th>
                      <th>Tanggal</th>
                      <th>Nama / Keperluan</th>
                      <th>Pengeluaran</th>
                      <th>Keterangan</th>
                      <th>Oleh</th>
					            <th>Status</th>
                      <th>Ket Perubahan</th>
                    </tr>
                  </thead>

				  <?php 
$query = mysqli_query($koneksi,"SELECT detail.id_detail as id_detail , detail.kd_detail as kd_detail, detail.tanggal as tanggal , detail.nama as nama, detail.pengeluaran as pengeluaran, detail.kt_update as kt_update , detail.keterangan as keterangan ,  detail.id_user as id_user,  detail.is_update as is_update, user.nama as usernama FROM detail inner join user where detail.id_user = user.id_user and user.id_user = detail.id_user order by tanggal desc");
$nos = 1;
while ($data = mysqli_fetch_assoc($query)) 
{

?>
      
        
    
                    <tr>
                    
                      <?php $tgl = date('d-m-Y', strtotime($data['tanggal']));?>
                      <td><?=$nos++?></td>
                        <?php if ($data['kd_detail']==1): ?>
                        <td>Biaya Perbaikan</td>
                      <?php endif ?>
                      <?php if ($data['kd_detail']==2): ?>
                        <td>Gaji Karyawan</td>
                      <?php endif ?>
                       <?php if ($data['kd_detail']==3): ?>
                        <td>Biaya Perawatan</td>
                      <?php endif ?>
                      <?php if ($data['kd_detail']==4): ?>
                        <td>Pajak</td>
                      <?php endif ?>
                      <?php if ($data['kd_detail']==5): ?>
                        <td>Keperluan Lain</td>
                      <?php endif ?>
                      <?php if ($data['kd_detail']<=0 || $data['kd_detail']>5): ?>
                        <td></td>
                      <?php endif ?>
                      <td><?=$tgl?></td>
                       <td><?=$data['nama']?></td>
                      <td>Rp. <span style="float: right; text-align: right;"><?=number_format($data['pengeluaran'],2,',','.');?></span></td>
                      <td><?=$data['keterangan']?></td>
                      <td><?=$data['usernama']?></td>
                       <td>
                         <?php if ($data['is_update']==0): ?>
                          Data Masuk
                        <?php endif ?>
                        <?php if ($data['is_update']==1): ?>
                          Dikoreksi
                        <?php endif ?>
                         
                        
                      </td>
                      <td><?=$data['kt_update']?></td>
                     
					 

</tr>
   
<!-- Modal Edit Mahasiswa-->
</div>

  </div>

<?php               
} 
?>
                  </tbody>
                </table>
              </div>
            </div>
                        <input type="button" class="btn btn-danger" onclick="location.href='operasional.php';" value="Kembali" />
          </div>

</div>

</div>
</div>

