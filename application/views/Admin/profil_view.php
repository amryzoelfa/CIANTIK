<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Profil</h1>
  <?= $this->session->flashdata('message') ?>
  <button type="button" class="d-one d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-edit fa-sm text-white-50"></i> Edit Profil</button>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Foto Profil -->
  <div class="col-xl-3 col-lg-5">
    <div class="card-body">
      <form action="" method="post">
        <div class="form-group row">
          <table id="dataTable" width="100%" cellspacing="0">
            <tr>
              <td>
                <center><img src="<?php if ($user['foto'] == NULL) {
                                    echo base_url('assets/img/profile.jpg');
                                  } else {
                                    echo base_url("/assets"); ?>/img/<?php echo $user['foto'];
                                                                    } ?>" width="150" height="225"></center>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
  <!-- End Foto Profil -->

  <!-- Biouser -->
  <div class="col-xl-9 col-lg-7">
    <div class="card-body">
      <form action="" method="post">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">ID</label>
          <div class="col-sm-9">
            <input type="text" name="no_identitas" disabled value="<?php echo $user['no_identitas']; ?>" class="form-control" size="4">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" name="nama" disabled value="<?php echo $user['nama']; ?>" class="form-control" size="4">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-9">
            <input type="text" name="jk" disabled value="<?php if ($user['jenis_kelamin'] == 'L') {
                                                            echo "Laki-laki";
                                                          } else {
                                                            echo "Perempuan";
                                                          }; ?>" class="form-control" size="4">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
          <div class="col-sm-4">
            <input type="text" name="tempat_lahir" disabled value="<?php echo $user['tempat_lahir']; ?>" class="form-control" size="4">
          </div>
          <div class="col-sm-5">
            <input type="date" name="tanggal_lahir" disabled value="<?php echo $user['tanggal_lahir']; ?>" class="form-control" size="4">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <input type="text" name="alamat" disabled value="<?php echo $user['alamat']; ?>" class="form-control" size="4">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">No HP</label>
          <div class="col-sm-9">
            <input type="text" name="no_hp" disabled value="<?php echo $user['no_hp']; ?>" class="form-control" size="4">
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- End Biouser -->

</div>
<!-- End Row -->




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
        <form action="<?php echo base_url('akses/updateProfile'); ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $user['id_user']; ?>">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">ID</label>
            <div class="col-sm-8">
              <input type="text" name="no_identitas" id="no_identitas" value="<?php echo $user['no_identitas']; ?>" size="4" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" name="nama" id="nama" value="<?php echo $user['nama']; ?>" size="4" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
            <div class="col-sm-3">
              <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $user['tempat_lahir']; ?>" size="4" class="form-control" required>
            </div>
            <div class="col-sm-5">
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $user['tanggal_lahir']; ?>" size="4" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-8">
              <select name="jk" id="jk" class="form-control" required>
                <option value="L" <?php if ($user['jenis_kelamin'] == 'L') {
                                    echo 'selected';
                                  } ?>>Laki-Laki</option>
                <option value="P" <?php if ($user['jenis_kelamin'] == 'P') {
                                    echo 'selected';
                                  } ?>>Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <textarea type="text" name="alamat" id="alamat" value="<?php echo $user['alamat']; ?>" size="4" class="form-control" required><?php echo $user['alamat']; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">No HP</label>
            <div class="col-sm-8">
              <input type="text" name="no_hp" id="no_hp" value="<?php echo $user['no_hp']; ?>" size="4" class="form-control" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Foto Profil</label>
            <div class="col-sm-8">
              <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
              <input type="file" name="foto" accept="image/*" value="" clas size="4" s="form-control-file">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Keluar</button>
            <input type="submit" name="eprofil" class="btn btn-primary" value="SIMPAN">
          </div>
        </form>
      </div>

    </div>

  </div>
</div>