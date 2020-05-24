    <br>
    <h3>Data Periksa</h3>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <form action="insert-periksa.php" method="post">
                <div class="form-group row" hidden="true">
                    <label class="col-sm-2 col-form-label">Id User</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_user" class="form-control" value="<?php echo $id_user ?>">
                    </div>
                </div>
                <div class="form-group row" hidden="true">
                    <label class="col-sm-2 col-form-label">Id User</label>
                    <div class="col-sm-10">
                        <input type="text" name="id_poli" class="form-control" value="<?php echo $idpoli ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" disabled name="nama" class="form-control" value="<?php echo $namaa ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Identitas</label>
                    <div class="col-sm-10">
                        <input type="text" disabled name="no_identitas" class="form-control" value="<?php echo $noidentitas ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Periksa</label>
                    <div class="col-sm-10">
                        <input type="date" disabled name="tanggal_periksa" class="form-control" required value="<?php echo $tanggal ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tensi Darah</label>
                    <div class="col-sm-10">
                        <input type="text" name="tensi_darah" class="form-control" size="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Riwayat Penyakit</label>
                    <div class="col-sm-10">
                        <input type="text" name="riwayat_penyakit" class="form-control" size="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gejala</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="gejala" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Diagnosa</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="diagnosa" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tindakan</label>
                    <div class="col-sm-10">
                        <input type="text" name="tindakan" class="form-control" size="4" required>
                    </div>
                </div>


                <br>
                <hr>

                <h3>Resep Obat</h3>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Obat</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="obat" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="keterangan" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">&nbsp;</label>
                    <div class="col-sm-10">
                        <a href="antrian-dr.php?id_user=<?php echo $id_user ?>" class="btn btn-primary" name="periksa" value="submit">KEMBALI</a>
                        <button class="btn btn-primary">SELESAI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>