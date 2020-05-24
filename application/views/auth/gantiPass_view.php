<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
</div>

<form action="proses.php" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password Lama</label>
        <div class="col-sm-10">
            <input type="password" name="paslam" id="currentPassword" placeholder="Password Lama" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password Baru</label>
        <div class="col-sm-10">
            <input type="password" name="pasnew" id="newPassword" placeholder="Password Baru" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
        <div class="col-sm-10">
            <input type="password" name="conpas" id="confirmPassword" placeholder="Konfirmasi Password Baru" class="form-control" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10">
            <input type="submit" name="ganti" class="btn btn-primary" value="SIMPAN">
        </div>
    </div>
</form>