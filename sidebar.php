  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion bg-light" id="accordionSidebar">
      <!-- cek level user -->
    <?php  
    require 'koneksi.php';
    // $id = $_SESSION['id'];
    // $ceklevel = mysqli_query($koneksi, "SELECT jabatan from user where id_user= $id");
    // $ceklevel = mysqli_fetch_array($ceklevel);
    ?>

      



      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KJB</div>
      </a>
       <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->
      <!-- Divider -->
     <!--  <hr class="sidebar-divider my-0"> -->

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span style="color: #F0F8FF">Dashboard</span></a>
      </li>

      <!-- Divider -->
     <!--  <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pendapatan.php">
          <i class="fas fa-fw fa-arrow-up"></i>
          <span style="color: #F0F8FF">Pemasukan</span>
        </a>
      </li>
      <!--  <div class="sidebar-heading">
        pengeluaran
      </div> -->
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pengeluaran.php" >
          <i class="fas fa-fw fa-arrow-down"></i>
          <span style="color: #F0F8FF">Belanja</span>
        </a>
      </li>

      <div class="sidebar-heading">
        Operasional
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="operasional.php" >
          <i class="fas fa-fw fa-arrow-down"></i>
          <span style="color: #F0F8FF">Data Operansional</span>
        </a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
    <!--   <div class="sidebar-heading">
        Pegawai
      </div> -->

    <?php if ($_SESSION['jabatan'] == 'pemimpin'):
      { ?>
        
        <div class="dropdown">
  <i class="">&nbsp &nbsp</i>
  <i class="fas fa-fw fa-tasks"></i>
  <button class="btn btn-gradient-dark dropdown-toggle text-left " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #F0F8FF; font-size: 14px; padding: 15px 5px; text-align: left">
   User
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="karyawan.php">Data User</a>
    <a class="dropdown-item" href="riwayat-karyawan.php">Daftar Riwayat User</a>
  </div>
</div>

   <?php   }
      endif
     ?>
      <!-- Nav Item - Pages Collapse Menu -->
      
      <!-- <div class="sidebar-heading">
        Kegiatan
      </div> -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="kegiatan.php">
          <i class="fas fa-flag"></i>
          <span style="color: #F0F8FF">Kegiatan</span>
        </a>

      </li>
    
          <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <div class="sidebar-heading">
        Hutang Piutang <br>
      </div>

      <!-- Nav Item - Charts -->
    <!--   <li class="nav-item">
        <a class="nav-link" href="hutang.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Hutang</span></a>
      </li> -->
      
<!-- Default dropright button -->
<div class="dropdown">
  <i class="">&nbsp &nbsp</i>
  <i class="fas fa-fw fa-tasks"></i>
  <button class="btn btn-gradient-dark dropdown-toggle text-left " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #F0F8FF; font-size: 14px; padding: 15px 5px; text-align: left">
   Data Hutang
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="hutang.php">Tambah Hutang</a>
    <a class="dropdown-item" href="bayar-hutang.php">Bayar Hutang</a>
    <a class="dropdown-item" href="riwayat-hutang.php">Riwayat Hutang</a>
  </div>
</div>
<div class="sidebar-heading">
        Lainya
      </div>
     <!--  <div class="sidebar-heading">
        Laporan
      </div> -->
      <!-- Nav Item - Tables -->
<div class="dropdown">
  <i class="">&nbsp &nbsp</i>
  <i class="fas fa-fw fa-tasks"></i>
  <button class="btn btn-gradient-dark dropdown-toggle text-left " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #F0F8FF; font-size: 14px; padding: 15px 5px; text-align: left">
   Buat Laporan
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="laporan-transaksional.php">Laporan Transaksi</a>
    <a class="dropdown-item" href="laporan-pendapatan.php">Laporan Pendapatan</a>
    <a class="dropdown-item" href="laporan-belanja.php">Laporan Belanja</a>
    <a class="dropdown-item" href="laporan-hutang.php">Laporan Hutang</a>
    <a class="dropdown-item" href="laporan-operasional.php">Laporan Operasional</a>
    <a class="dropdown-item" href="laporan-kegiatan.php">Laporan Kegiatan</a>
  </div>
</div>


     <?php if ($_SESSION['jabatan'] == 'pemimpin'):
      { ?>
      <div class="dropdown">
  <i class="">&nbsp &nbsp</i>
  <i class="fas fa-fw fa-tasks"></i>
  <button class="btn btn-gradient-dark dropdown-toggle text-left " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #F0F8FF; font-size: 14px; padding: 15px 5px; text-align: left">
   Lain-Lain  
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="sumber.php">Sumber Pendapatan</a>
    <a class="dropdown-item" href="lacak-pendapatan.php">Lacak Perubahan Data Pendapatan</a>
    <a class="dropdown-item" href="lacak-belanja.php">Lacak Perubahan Data Belanja</a>
    <a class="dropdown-item" href="lacak-hutang.php">Lacak Perubahan Data Hutang</a>
    <a class="dropdown-item" href="lacak-bayar-hutang.php">Lacak Perubahan Data  Bayar Hutang</a>
    <a class="dropdown-item" href="lacak-operasional.php">Lacak Perubahan Data Operasional</a>
    <a class="dropdown-item" href="lacak-kegiatan.php">Lacak Perubahan Data Kegiatan</a>
  </div>
</div>
<?php }
endif ?>

<!--   <a href="index.php" class="w3-bar-item bg-dark w3-button-left w3-text-white w3-button  w3-hover-text-white ">Dashboard</a>
  <a href="pendapatan.php" class="w3-bar-item bg-dark w3-button w3-hover-none w3-text-white  w3-hover-text-white">Pemasukan</a>
  <a href="pengeluaran.php" class="w3-bar-item bg-dark w3-button w3-hover-none w3-text-white  w3-hover-text-white">Belanja</a>
  <a href="operasional.php" class="w3-bar-item bg-dark w3-button w3-hover-none w3-text-white  w3-hover-text-white">Operasional</a>
  <a href="karyawan.php" class="w3-bar-item bg-dark w3-button w3-hover-none w3-text-white  w3-hover-text-white">Pengguna</a>
  <a href="kegiatan.php" class="w3-bar-item bg-dark w3-button w3-hover-none w3-text-white  w3-hover-text-white">Kegiatan</a>
  <a href="hutang.php" class="w3-bar-item bg-dark w3-button w3-hover-none w3-text-white  w3-hover-text-white">Hutang</a>
  <a href="laporan.php" class="w3-bar-item bg-dark w3-button w3-hover-none w3-text-white  w3-hover-text-white">Laporan</a> -->
      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

      <!-- Sidebar Toggler (Sidebar) -->
    <!--   <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
