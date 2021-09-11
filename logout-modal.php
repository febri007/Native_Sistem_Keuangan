  <!-- Logout Modal-->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" jika anda yakin ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="keluar.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>


 <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profile User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
           <form role="form" action="proses-edit-karyawan.php" method="get">

          <?php
          $id = $_SESSION['id']; 
          $query_edit = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id'");
          //$result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($query_edit)) {  
          ?>


          <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">

          <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">      
          </div>

          <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">      
          </div>

          <div class="form-group">
          <label>Password Baru</label>
          <input type="password" name="password" class="form-control" value="" id="password">      
          </div>

          <div class="form-group">
          <label>Ulangi Password Baru</label>
          <input type="password" name="password" class="form-control" value="" id="confirm_password">     
          <span id='message' style="color: green">Kosongi Jika tidak mengganti password</span> 
          </div>

          <div class="form-group">
          <label>No Telepon</label>
          <input type="number" name="telepon" class="form-control" value="<?php echo $row['no_tlp']; ?>">      
          </div>
          <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>      
          </div>
          <div class="form-group">
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="form-control" value="<?php echo $row['jabatan']; ?>" readonly>      
          </div>


          <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">      
          </div>

          <div class="modal-footer">  
          <button type="submit" class="btn btn-success">Ubah</button>
           <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

         
          <?php 
          }
          //mysql_close($host);
          ?>  
                 
          </form>

        </div>
<!--         <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="keluar.php">Keluar</a>
        </div> -->
      </div>
    </div>
  </div>
    <script type="text/javascript">
               $('#password, #confirm_password').on('keyup', function () {
          if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Kosongi form jika tidak mengganti password').css('color', 'green');
          } else 
            $('#message').html('Password Tidak Sama').css('color', 'red');
        });
    </script>