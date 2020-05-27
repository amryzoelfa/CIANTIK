<?php
  session_start();
  require 'functions.php';
  include '../session.php';
  include 'assets/akses.php';
  $dokter = query("SELECT * FROM tb_user WHERE id_akses=3 or id_akses=4");
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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Foto</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat, Tanggal Lahir</th>
                      <th>No. HP</th>
                      <th>Alamat</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Foto</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat, Tanggal Lahir</th>
                      <th>No. HP</th>
                      <th>Alamat</th>
                      <th>Tindakan</th>
                    </tr>
                  </tfoot>
                  
                  <tbody>
                    <?php
                      foreach ($dokter as $data) {
                    ?>
                    <tr>
                      <td><?php echo $data ['no_identitas'];?></td>
                      <td><?php echo $data ['nama'];?></td>
                      <td><img src="../img/<?php echo $data ['foto'];?>" width="80" height="80"></td>
                      <td><?php if($data ['jenis_kelamin']=='L'){
                          echo "Laki-laki";
                        }else{
                          echo "Perempuan";
                        } ;?></td>
                      <td><?php echo $data ['tempat_lahir'];?>, <?php echo date("d-m-Y", strtotime($data ['tanggal_lahir']));?></td>
                      <td><?php echo $data ['no_hp'];?></td>
                      <td><?php echo $data ['alamat'];?></td>
                      <td><a href="edit-ddokter.php?id=<?php echo $data['id_user'];?>" class="btn btn-warning" name="edit-ddokter"><i class="fas fa-edit"></i></a> || <a href="hapus-ddokter.php?id=<?php echo $data['id_user'];?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" name="hapus-dpasien"><i class="fas fa-trash"></i></a></td>
                    </tr><?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

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
