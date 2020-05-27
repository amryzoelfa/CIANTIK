<?php 
	include "../koneksi.php";

	$passlama = $_POST['pass_lama'];
	$passbaru = $_POST['pass_baru'];
	$passbaru1 = $_POST['pass_konf'];

	$query = "SELECT * FROM tb_user WHERE password = '$passlama'";
	$result = mysqli_query($koneksi, $query);
	$data = mysqli_fetch_array($result);

	if (isset($data) AND !empty($data)) {
		if ($data['password'] == $passbaru) {
			header("location: apoteker-gantipass.php?pesan=tidaksama");
		} else {
			if ($passbaru == $passbaru1) {
				$passwordlama = $data['password'];
				$update = "UPDATE tb_user SET password = '$passbaru' WHERE password = '$passwordlama'";
				mysqli_query($koneksi, $update);
				header("location: apoteker-gantipass.php?pesan=sukses");

			} else {
				header("location: apoteker-gantipass.php?pesan=passbeda");
			}
		}
		
	} elseif (!isset($data) AND empty($data)) {
		header("location: apoteker-gantipass.php?pesan=tidakadapasswordsama");
	}
	
	die();
?>