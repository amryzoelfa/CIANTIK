<?php
  session_start();
  require '../koneksi.php';
  include '../session.php';
  include 'assets/akses.php';
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'assets/header.php'; ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'assets/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include 'assets/navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <?php
             $query = "SELECT COUNT(*) as total FROM tb_user WHERE id_akses!=1";
                                $result = mysqli_query($koneksi, $query);
                                while($row = mysqli_fetch_array($result)){
                                ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total'];?> </div>
                    </div><?php } ?>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
             $query2 = "SELECT COUNT(*) as totalp FROM tb_user WHERE id_akses = 2 ";
                                $result = mysqli_query($koneksi, $query2);
                                while($row = mysqli_fetch_array($result)){
                                ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">Pasien</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['totalp'];?> </div>
                    </div><?php } ?>
                    <div class="col-auto">
                      <i class="fab fa-accessible-icon fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
             $query3 = "SELECT COUNT(*) as totald FROM tb_user WHERE id_akses=3 OR id_akses=4";
                                $result = mysqli_query($koneksi, $query3);
                                while($row = mysqli_fetch_array($result)){
                                ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">Dokter</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['totald'];?> </div>
                    </div><?php } ?>
                    <div class="col-auto">
                      <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
             $query4 = "SELECT COUNT(*) as totala FROM tb_user WHERE id_akses=5";
                                $result = mysqli_query($koneksi, $query4);
                                while($row = mysqli_fetch_array($result)){
                                ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Apoteker</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['totala'];?> </div>
                    </div><?php } ?>
                    <div class="col-auto">
                      <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div> <br>
          <!-- Content Row -->

          <div class="row">

            <?php
             $query5 = "SELECT COUNT(*) as totalkh FROM tb_antrian WHERE tanggal=CURRENT_DATE()";
                                $result = mysqli_query($koneksi, $query5);
                                while($row = mysqli_fetch_array($result)){
                                ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Kunjungan Hari ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['totalkh'];?> </div>
                    </div><?php } ?>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <br><br><br><br><br><!-- <br><br><br><br><br> -->

      </div>
      <!-- End of Main Content -->

      <?php include 'assets/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin untuk Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Logout" jika ingin Keluar.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

  <?php include 'assets/js.php'; ?>

</body>

</html>
