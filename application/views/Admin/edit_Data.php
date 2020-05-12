<?php foreach ($pasien as $data) { ?>
    <form action="<?php echo base_url('Master/update'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="<?php echo $data->id_user; ?>">
        <input type="hidden" name="akses" value="<?php echo $data->id_akses; ?>">

        <!-- <div class="form-group row">
        <label class="col-sm-2 col-form-label">Foto Profil</label>
        <div class="col-sm-10">
            <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
            <input type="file" name="foto" accept="image/*" value="" class="form-control-file" size="4">
        </div>
    </div> -->

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No. Identitas</label>
            <div class="col-sm-10">
                <input type="text" name="no_identitas" placeholder="Nomor Identitas" value="<?php echo $data->no_identitas; ?>" class="form-control" size="4" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $data->nama; ?>" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jk" value="L" <?php if ($data->jenis_kelamin == 'L') {
                                                                                            echo 'checked';
                                                                                        } ?> required>
                    <label class="form-check-label">LAKI-LAKI</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jk" value="P" <?php if ($data->jenis_kelamin == 'P') {
                                                                                            echo 'checked';
                                                                                        } ?> required>
                    <label class="form-check-label">PEREMPUAN</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
            <div class="col-sm-4">
                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $data->tempat_lahir; ?>" class="form-control" required>
            </div>
            <div class="col-sm-6">
                <input type="date" name="tanggal_lahir" value="<?php echo $data->tanggal_lahir; ?>" class="form-control" required>
            </div>
        </div>

        <!-- <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" name="tanggal_lahir" value="<?php //echo $data->tanggal_lahir; 
                                                                ?>" class="form-control" required>
            </div>
        </div> -->

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nomor Handphone</label>
            <div class="col-sm-10">
                <input type="text" name="no_hp" placeholder="Nomor Handphone" value="<?php echo $data->no_hp; ?>" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea type="text" name="alamat" class="form-control" required><?php echo $data->alamat; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pekerjaan</label>
            <div class="col-sm-10">
                <input type="text" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $data->pekerjaan; ?>" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" placeholder="Username" value="<?php echo $data->username; ?>" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" placeholder="Password" value="<?php echo $data->password; ?>" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">&nbsp;</label>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" name="editp" value="SIMPAN">
            </div>
        </div>
    <?php } ?>
    </form>