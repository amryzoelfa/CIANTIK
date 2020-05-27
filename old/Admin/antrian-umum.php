<?php
  session_start();
  require '../koneksi.php';
  include '../session.php';
  include 'assets/akses.php';
  require 'functions.php';
  $umum = query("SELECT tb_antrian.no_antrian, tb_antrian.tanggal, tb_user.nama, tb_user.no_identitas, tb_periksa.id_status_periksa, tb_periksa.id_status_obat, tb_periksa.id_user FROM tb_antrian , tb_user , tb_periksa where tb_antrian.id_user =  tb_user.id_user and tb_user.id_user = tb_periksa.id_user and tb_periksa.tanggal_periksa = CURRENT_DATE() and tb_periksa.id_poli = 1 and tb_antrian.tanggal = CURRENT_DATE()  group by tb_periksa.id_periksa");

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

          <div class="container-fluid">
              <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Antrian Poli Umum</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Status Periksa</th>
                      <th>Status Obat</th>
                      <!-- <th>Tindakan</th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Status Periksa</th>
                      <th>Status Obat</th>
                      <!-- <th>Tindakan</th> -->
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    foreach ($umum as $data) {
                  ?>
                    <tr>
                      <td><?php echo $data ['no_antrian'];?></td>
                      <td><?php echo $data ['tanggal'];?></td>
                      <td><?php echo $data ['no_identitas'];?></td>
                      <td><?php echo $data ['nama'];?></td>
                      <td><?php if($data ['id_status_periksa']==1){
                        echo "Belum";
                      }elseif ($data ['id_status_periksa']==2) {
                        echo "Sudah";
                      }else{
                        echo "Proses";
                      }?></td>
                      <td><?php if($data ['id_status_obat']==1){
                        echo "Belum";
                      }elseif ($data ['id_status_obat']==2) {
                        echo "Sudah";
                      }else{
                        echo "Proses";
                      }?></td>
                      <!-- <td><a href="edit-user.php?id=<?php echo $data['id_user'];?>" class="btn btn-warning" name="edit-user"><i class="fas fa-edit"></i></a><a href="hapus-dpasien.php?id=<?php echo $data['id_user'];?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-danger" name="hapus-user"><i class="fas fa-trash"></i></a></td> -->
                    </tr>
                    <?php 
                      }
                    ?>
                  </tbody>
                </table>
              </div>
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