<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id_akses']; ?>">

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Akses</label>
        <div class="col-sm-10">
            <input type="text" name="akses" placeholder="Nama Lengkap" value="<?php echo $data->ket_akses; ?>" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10">
            <input type="submit" class="btn btn-primary" name="editakses" value="SIMPAN">
        </div>
    </div>
</form>