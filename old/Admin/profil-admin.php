<?php
  session_start();
  require '../koneksi.php';
  include '../session.php';
  include 'assets/akses.php';
  $id_user = $_GET['id'];
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
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
            <button type="button" class="d-one d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-edit fa-sm text-white-50"></i> Edit Profil</button>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Foto Profil -->
              <div class="col-xl-3 col-lg-5">
                  <div class="card-body">
                      <form action="" method="post">
                        <div class="form-group row">
                          <?php
                          $query = mysqli_query($koneksi, "SELECT * FROM tb_user where username='$username'");
                          while($data = mysqli_fetch_array($query)) {
                      ?>
                          <table  id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <td><center><img src="../img/<?php echo $data ['foto'];?>" width="150" height="225"></center></td>
                            </tr>
                          </table>
                        </div>
                      </form>
                  </div>
              </div>
              <!-- End Foto Profil -->

              <!-- Biodata -->
              <div class="col-xl-9 col-lg-7">
                  <div class="card-body">
                      <form action="" method="post">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">ID</label>
                              <div class="col-sm-9">
                                <input type="text" name="no_identitas" disabled value="<?php echo $data ['no_identitas'];?>" class="form-control" size="4" >
                              </div>
                            </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nama</label>
                              <div class="col-sm-9">
                                <input type="text" name="nama" disabled value="<?php echo $data ['nama'];?>" class="form-control" size="4" >
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                <input type="text" name="jk" disabled value="<?php if($data ['jenis_kelamin']=='L'){
                                echo "Laki-laki";
                              }else{
                                echo "Perempuan";
                              } ;?>" class="form-control" size="4" >
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                              <div class="col-sm-4">
                                <input type="text" name="tempat_lahir" disabled value="<?php echo $data ['tempat_lahir'];?>" class="form-control" size="4" >
                            </div>
                            <div class="col-sm-5">
                                <input type="date" name="tanggal_lahir" disabled value="<?php echo $data ['tanggal_lahir'];?>" class="form-control" size="4" >
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Alamat</label>
                              <div class="col-sm-9">
                                <input type="text" name="alamat" disabled value="<?php echo $data ['alamat'];?>" class="form-control" size="4" >
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">No HP</label>
                              <div class="col-sm-9">
                                <input type="text" name="no_hp" disabled value="<?php echo $data ['no_hp'];?>" class="form-control" size="4" >
                              </div><?php } ?>
                          </div>
                      </form>
                  </div>
              </div>
              <!-- End Biodata -->

          </div>
          <!-- End Row -->

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

    <!-- Modal Edit Data-->
  <div class="modal fade" id="modalEdit" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Edit Profil</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
            <?php
              $query = mysqli_query($koneksi, "SELECT * FROM tb_user where username='$username'");
              while($data = mysqli_fetch_array($query)) {
          ?>
              <form action="proses-eprofil.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id_user'];?>">
                      <div class="form-group row">  
                          <label class="col-sm-4 col-form-label">ID</label>
                          <div class="col-sm-8">
                             <input type="text" name="no_identitas" id="no_identitas" value="<?php echo $data ['no_identitas'];?>" size="4" class="form-control" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nama</label>
                          <div class="col-sm-8">
                              <input type="text" name="nama" id="nama" value="<?php echo $data ['nama'];?>" size="4" class="form-control" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
                          <div class="col-sm-3">
                              <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $data ['tempat_lahir'];?>" size="4" class="form-control" required>
                          </div>
                          <div class="col-sm-5">
                              <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $data ['tanggal_lahir'];?>" size="4" class="form-control" required>
                         </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                          <select  name="jk" id="jk" class="form-control" required>
                              <option value="L" <?php if($data['jenis_kelamin'] == 'L'){ echo 'selected'; } ?>>Laki-Laki</option>
                              <option value="P" <?php if($data['jenis_kelamin'] == 'P'){ echo 'selected'; } ?>>Perempuan</option>
                          </select>
                        </div>
                    </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Alamat</label>
                          <div class="col-sm-8">
                              <textarea type="text" name="alamat" id="alamat" value="<?php echo $data ['alamat'];?>" size="4" class="form-control" required><?php echo $data ['alamat'];?></textarea>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label">No HP</label>
                          <div class="col-sm-8">
                              <input type="text" name="no_hp" id="no_hp" value="<?php echo $data ['no_hp'];?>" size="4" class="form-control" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Foto Profil</label>
                          <div class="col-sm-8">
                              <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                              <input type="file"  name="foto" accept="image/*"  value="" clas size="4"s="form-control-file" >
                          </div>
                      </div><?php } ?>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Keluar</button>
                          <input type="submit" name="eprofil" class="btn btn-primary" value="SIMPAN">
                      </div>
                </form>
              </div>
              
          </div>

        </div>
    </div>

  <?php include 'assets/js.php'; ?>

</body>

</html>
