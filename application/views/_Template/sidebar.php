<?php
$getUser = $this->session->userdata('session_user');
$getAkses = $this->session->userdata('session_akses');
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php if ($getAkses == 1) {
                                                                                    echo base_url('Admin');
                                                                                  } else if ($getAkses == 2) {
                                                                                    echo base_url('Pasien');
                                                                                  } else if ($getAkses == 3) {
                                                                                    echo base_url('Dokter');
                                                                                  } else if ($getAkses == 4) {
                                                                                    echo base_url('Dokter');
                                                                                  } else if ($getAkses == 5) {
                                                                                    echo base_url('Apoteker');
                                                                                  } ?>">
    <div class="sidebar-brand-icon">
      <i class="far fa-hospital"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ANTIK</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php if ($getAkses == 1) {
                                echo base_url('Admin');
                              } else if ($getAkses == 2) {
                                echo base_url('Pasien');
                              } else if ($getAkses == 3) {
                                echo base_url('Dokter');
                              } else if ($getAkses == 4) {
                                echo base_url('Dokter');
                              } else if ($getAkses == 5) {
                                echo base_url('Apoteker');
                              } ?> ">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <?php if ($getAkses == 1) { ?>
    <!-- Nav Item - Pendaftaran User -->
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('Admin/pendaftaran_user'); ?>">
        <i class="fas fa-user-plus"></i>
        <span>Pendaftaran User</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-sort-numeric-down"></i>
        <span>Antrian</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?php echo base_url('Admin/antrian_umum'); ?>">POLI UMUM</a>
          <a class="collapse-item" href="<?php echo base_url('Admin/antrian_gigi'); ?>">POLI GIGI</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Data Master Collapse Menu-->
    <li class="nav-item active">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-clipboard-list"></i>
        <span>Data Master</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?php echo base_url('Master/DataAkses'); ?>">Akses</a>
          <a class="collapse-item" href="<?php echo base_url('Master/DataApoteker'); ?>">Apoteker</a>
          <a class="collapse-item" href="<?php echo base_url('Master/DataDokter'); ?>">Dokter</a>
          <a class="collapse-item" href="<?php echo base_url('Master/DataPasien'); ?>">Pasien</a>
          <a class="collapse-item" href="<?php echo base_url('Master/DataPoli'); ?>">Poli</a>
          <a class="collapse-item" href="<?php echo base_url('Master/DataStatus'); ?>">Status</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('Admin/laporan'); ?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Laporan</span></a>
    </li>

  <?php } else { ?>

    <!-- Nav Item - Antrian -->
    <li class="nav-item active">
      <a class="nav-link" href="<?php if ($getAkses == 2) {
                                  echo base_url('Antrian/Pasien');
                                } else if ($getAkses == 3) {
                                  echo base_url('Dokter/antrianUmum');
                                } else if ($getAkses == 4) {
                                  echo base_url('Dokter/antrianGigi');
                                } else if ($getAkses == 5) {
                                  echo base_url('Antrian/Apoteker');
                                } ?>">
        <i class="fas fa-sort-numeric-down"></i>
        <span>Antrian</span></a>
    </li>

  <?php } ?>

  <?php if ($getAkses == 2) { ?>
    <!-- Nav Item - Riwayat -->
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('Pasien/Riwayat'); ?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Riwayat</span></a>
    </li>
  <?php } ?>

  <?php if (($getAkses == 3) && ($getAkses == 4) && ($getAkses == 5)) { ?>
    <!-- Nav Item - Data Pasien -->
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url(''); ?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Data Pasien</span></a>
    </li>
  <?php } ?>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->