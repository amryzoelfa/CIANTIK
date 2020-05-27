<?php
session_start();
require '../koneksi.php';
include '../session.php';
include 'assets/akses.php';
$ambil = $koneksi->query("SELECT * FROM tb_akses WHERE id_akses='$_GET[id]'");
$data = $ambil->fetch_assoc();
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
        <div class="container">

          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id_akses']; ?>">

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama Akses</label>
              <div class="col-sm-10">
                <input type="text" name="akses" placeholder="Nama Lengkap" value="<?php echo $data['ket_akses'] ?>" class="form-control" required>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">&nbsp;</label>
              <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" name="editakses" value="SIMPAN">
              </div>
            </div>
          </form>

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
<?php
if (isset($_POST['editakses'])) {
  $koneksi->query("UPDATE tb_akses SET ket_akses='$_POST[akses]' WHERE id_akses='$_GET[id]'");

  echo "<script>alert('Data Akses telah diubah');</script>";
  echo "<script>location='data-akses.php';</script>";
}

?>