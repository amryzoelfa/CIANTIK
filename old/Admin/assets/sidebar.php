<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="far fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ANTIK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Pendaftaran User -->
      <li class="nav-item active">
        <a class="nav-link" href="pendaftaran-user.php">
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
            <a class="collapse-item" href="antrian-umum.php">POLI UMUM</a>
            <a class="collapse-item" href="antrian-gigi.php">POLI GIGI</a>
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
            <a class="collapse-item" href="data-akses.php">Akses</a>
            <a class="collapse-item" href="data-apoteker.php">Apoteker</a>
            <a class="collapse-item" href="data-dokter.php">Dokter</a>
            <a class="collapse-item" href="data-pasien.php">Pasien</a>
            <a class="collapse-item" href="data-poli.php">Poli</a>
            <a class="collapse-item" href="data-status.php">Status</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="laporan.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Laporan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->