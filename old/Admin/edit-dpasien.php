<?php
  session_start();
  require '../koneksi.php';
  include '../session.php';
  include 'assets/akses.php';
  $ambil = $koneksi->query("SELECT * FROM tb_user WHERE id_user='$_GET[id]'");
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
              <input type="hidden" name="id" value="<?php echo $data['id_user'];?>">

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Foto Profil</label>
                  <div class="col-sm-10">
                    <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                    <input type="file" name="foto" accept="image/*" value="" class="form-control-file" size="4" >
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. Identitas</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_identitas" placeholder="Nomor Identitas" value="<?php echo $data['no_identitas']?>" class="form-control" size="4" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $data['nama']?>" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input type="radio" class="form-check-input" name="jk" value="L" <?php if($data['jenis_kelamin'] == 'L'){ echo 'checked'; } ?> required>
                      <label class="form-check-label">LAKI-LAKI</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" name="jk" value="P" <?php if($data['jenis_kelamin'] == 'P'){ echo 'checked'; } ?> required>
                      <label class="form-check-label">PEREMPUAN</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $data['tempat_lahir']?>" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" name="tanggal_lahir"  value="<?php echo $data['tanggal_lahir']?>" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nomor Handphone</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_hp" placeholder="Nomor Handphone" value="<?php echo $data['no_hp']?>" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="alamat" class="form-control" required><?php echo $data['alamat'];?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Pekerjaan</label>
                  <div class="col-sm-10">
                    <input type="text" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $data['pekerjaan']?>" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" placeholder="Username" value="<?php echo $data['username']?>" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" placeholder="Password" value="<?php echo $data['password']?>" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">&nbsp;</label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" name="editp" value="SIMPAN">
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
if (isset($_POST['editp'])) 
{
  $namafoto=time().'_'.basename($_FILES['foto']['name']);
  $lokasifoto = $_FILES['foto']['tmp_name'];
  //jika foto dirubah
  if (!empty($lokasifoto))
  {
    move_uploaded_file($lokasifoto, "../img/$namafoto");
    $koneksi->query("UPDATE tb_user SET no_identitas='$_POST[no_identitas]', nama='$_POST[nama]', foto='$namafoto', jenis_kelamin='$_POST[jk]', tempat_lahir='$_POST[tempat_lahir]', tanggal_lahir='$_POST[tanggal_lahir]', no_hp='$_POST[no_hp]', alamat='$_POST[alamat]', pekerjaan='$_POST[pekerjaan]' WHERE id_user='$_GET[id]'");
  }
  else
  {

   $koneksi->query("UPDATE tb_user SET no_identitas='$_POST[no_identitas]', nama='$_POST[nama]',jenis_kelamin='$_POST[jk]', tempat_lahir='$_POST[tempat_lahir]', tanggal_lahir='$_POST[tanggal_lahir]', no_hp='$_POST[no_hp]', alamat='$_POST[alamat]', pekerjaan='$_POST[pekerjaan]' WHERE id_user='$_GET[id]'");

  }

  echo "<script>alert('Data Pasien telah diubah');</script>";
echo "<script>location='data-pasien.php';</script>";

}

  ?>