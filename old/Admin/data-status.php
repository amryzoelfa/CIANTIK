<?php
  session_start();
  require 'functions.php';
  include '../session.php';
  include 'assets/akses.php';
  $dstatus = query("SELECT * FROM tb_status");
  $id_status = $_GET['id'];
?>
<?php
if(isset($_POST['tambah'])){
  $status = $_POST['status'];
    $query = "INSERT INTO tb_status (ket_status) VALUES ('$status')";

     $result = mysqli_query($koneksi, $query); //digunakan untuk menjalankan query insert
      header("location:data-status.php");//apbila data  berhasil ditambhkan maka langsung menuju halaman
}

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
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Data Status</h6>
              <button type="button" class="d-one d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-file-signature fa-sm text-white-50"></i> Tambah Status</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Status</td>
                      <td>Tindakan</td>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <td>No</td>
                      <td>Status</td>
                      <td>Tindakan</td>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    $no=1;
                    foreach ($dstatus as $data) {
                  ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data ['ket_status'];?></td>
                        <td><a href="edit-dstatus.php?id=<?php echo $data['id_status'];?>" class="btn btn-warning" name="edit-dstatus"><i class="fas fa-edit"></i></a> || <a href="hapus-dstatus.php?id=<?php echo $data['id_status'];?>"  onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php $no++;?>
                    <?php } ?>
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

  <!-- Modal Tambah Data-->
  <div class="modal fade" id="modalTambah" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Tambah Status</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Status</label>
                  <div class="col-sm-9">
                    <input type="text" name="status" class="form-control" size="4" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Keluar</button>
                  <input type="submit" name="tambah" class="btn btn-primary" value="SIMPAN">
                </div>
              </form>
            </div>
              
          </div>

        </div>
    </div>

    <!-- Modal Edit Data-->
  <div class="modal fade" id="modalEdit" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <?php
              $query = mysqli_query($koneksi, "SELECT * FROM tb_status WHERE id_status='$id_status'");
              while($data = mysqli_fetch_array($query)) {
          ?>

            <div class="modal-header">
              <h4 class="modal-title">Edit status</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              <form action="editstatus.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id_status'];?>">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama status</label>
                  <div class="col-sm-9">
                    <input type="text" name="status" value="<?php echo $data['ket_status']?>" class="form-control" size="4" required>
                  </div>
                </div> <?php  } ?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Keluar</button>
                  <input type="submit" name="estatus" class="btn btn-primary" value="SIMPAN">
                </div>
              </form>
            </div>
              
          </div>

        </div>
    </div>

 <?php include 'assets/js.php'; ?>

</body>

</html>



