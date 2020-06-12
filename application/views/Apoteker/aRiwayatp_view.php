<div class="container">
	<br>
	<h3>Data Pasien</h3>
	<br>
	<div class="col-lg-12">
		<form action="" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID</label>
				<div class="col-sm-10">
					<input type="text" disabled name="id" class="form-control" value="<?php echo $riwayat[0]['id_periksa']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" disabled name="nama" class="form-control" size="4" value="<?php echo $riwayat[0]['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<input type="text" disabled name="jk" class="form-control" size="4" value="<?php if ($riwayat[0]['jenis_kelamin'] == 'L') {
																									echo "Laki-Laki";
																								} else {
																									echo "Perempuan";
																								} ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-10">
					<input type="text" disabled name="ttl" class="form-control" size="4" value="<?php echo $riwayat[0]['tempat_lahir'] ?>, <?php echo $riwayat[0]['tanggal_lahir']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Umur</label>
				<div class="col-sm-10">
					<input type="text" disabled name="umur" class="form-control" size="4" value="<?php echo $riwayat[0]['umur'] ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<textarea type="text" disabled name="alamat" class="form-control" required><?php echo $riwayat[0]['alamat']; ?></textarea>
				</div>
			</div>
		</form>
	</div>
	<div class="container">
		<br>
		<h3>Resep Obat</h3>
		<br>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Obat</label>
			<div class="col-sm-10">
				<textarea type="text" disabled name="obat" class="form-control" required><?php echo $riwayat[0]['resep_obat']; ?></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Keterangan</label>
			<div class="col-sm-10">
				<textarea type="text" disabled name="keterangan" class="form-control" required><?php echo $riwayat[0]['keterangan']; ?></textarea>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">&nbsp;</label>
			<div class="col-sm-10">

				<a href="<?php echo site_url() . 'Apoteker/Antrian' ?>" class="btn btn-primary" name="selesai" value="submit">SELESAI</a>

			</div>
		</div>