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
        <div class="container">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
          </div>

         <form action="proses-daftar.php" method="post">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Akses*</label>
                <div class="col-sm-10">
                    <select class="form-control" name="akses" required>
                      <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_akses WHERE id_akses!=1");
                        while ($data = mysqli_fetch_array($query)) { ?>
                      <option value="<?php echo $data['id_akses'];?>" size="4"><?php echo $data['ket_akses'];?></option>
                      <?php } ?>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No ID**</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_identitas" placeholder="Nomor Identitas" size="4" class="form-control" required>
                  </div>
                </div>
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" placeholder="Nama Lengkap" size="4" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input type="radio" class="form-check-input" name="jk" value="L" required>
                      <label class="form-check-label">LAKI-LAKI</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" name="jk" value="P" required>
                      <label class="form-check-label">PEREMPUAN</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                  <div class="col-sm-5">
                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" size="4" class="form-control" required>
                  </div>
                  <div class="col-sm-5">
                    <input type="date" name="tanggal_lahir" size="4" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nomor Handphone</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_hp" placeholder="Nomor Handphone" size="4" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="alamat" placeholder="Alamat" size="4" class="form-control" required></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pekerjaan</label>
                  <div class="col-sm-10">
                    <input type="text" name="pekerjaan" placeholder="Pekerjaan" size="4" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" placeholder="Username" size="4" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" placeholder="Password" size="4" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <input type="submit" name="daftar" class="btn btn-primary" value="SIMPAN">
                  </div>
                </div>
              </form>
              <hr>
              Ket: <br>
              * Silahkan Tambahkan User berdasarkan Akses untuk login ke Aplikasi Antik<br>
              ** NIM/NIP/KTP/SIM

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