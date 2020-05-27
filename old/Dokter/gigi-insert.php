<?php 
	require ("../koneksi.php");

	$iduser = $_POST['id_user'];
	$idpoli = $_POST['id_poli'];

	$nama = $_POST['nama'];
	$noidentitas = $_POST['no_identitas'];
	$tanggal = $_POST['tanggal_periksa'];
	$tensidarah = $_POST['tensi_darah'];

	$riwayatpenyakit = $_POST['riwayat_penyakit'];
	$gejala = $_POST['gejala'];
	$diagnosa = $_POST['diagnosa'];
	$tindakan = $_POST['tindakan'];
	$obat = $_POST['obat'];
	$keterangan = $_POST['keterangan'];

	$query = mysqli_query($koneksi, "UPDATE tb_periksa SET tensi_darah='$tensidarah', riwayat_penyakit='$riwayatpenyakit', gejala='$gejala', diagnosa='$diagnosa', tindakan='$tindakan', resep_obat='$obat', keterangan='$keterangan' WHERE id_user='$iduser' AND id_poli='$idpoli' AND tanggal_periksa=CURRENT_DATE()");

	if ($query == 'true') {
		$querysprks = mysqli_query($koneksi, "UPDATE tb_periksa SET id_status_periksa = 2 WHERE id_user='$iduser' AND id_poli = '$idpoli'");

		header("location: gigi-antrian.php");
	}

?>