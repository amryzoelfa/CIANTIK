<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
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
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <center><a class="btn btn-danger" onclick="goBack()">
                                        <font color="white">Kembali</font>
                                    </a></center>
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
                    <label class="col-sm-3 col-form-label">No ID</label>
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
                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                        <input type="text" name="pekerjaan" disabled value="<?php echo $user['pekerjaan']; ?>" class="form-control" size="4">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No HP</label>
                    <div class="col-sm-9">
                        <input type="text" name="no_hp" disabled value="<?php echo $user['no_hp']; ?>" class="form-control" size="4">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" disabled value="<?php echo $user['username']; ?>" class="form-control" size="4">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Biouser -->

</div>
<!-- End Row -->