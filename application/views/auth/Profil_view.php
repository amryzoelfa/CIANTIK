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
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <table id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <td>
                                    <center><img src="../img/<?php echo $data['foto']; ?>" width="150" height="225"></center>
                                </td>
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
                        <input type="text" name="no_identitas" value="<?php echo $data['no_identitas']; ?>" class="form-control" size="4" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" size="4" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <input type="text" name="jk" value="<?php if ($data['jenis_kelamin'] == 'L') {
                                                                echo "Laki-laki";
                                                            } else {
                                                                echo "Perempuan";
                                                            }; ?>" class="form-control" size="4" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-4">
                        <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" size="4" disabled>
                    </div>
                    <div class="col-sm-5">
                        <input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" class="form-control" size="4" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control" size="4" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No HP</label>
                    <div class="col-sm-9">
                        <input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>" class="form-control" size="4" disabled>
                    </div><?php } ?>
                </div>
            </form>
        </div>
    </div>
    <!-- End Biodata -->

</div>
<!-- End Row -->