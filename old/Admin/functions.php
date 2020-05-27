<?php
require '../koneksi.php';

function query($sql){
	global $koneksi;
	$result = mysqli_query($koneksi, $sql);
	$rows = [];
	while ($data = mysqli_fetch_assoc($result)) {
		$rows[]=$data;
	}
	return $rows;
}

function hapus($id) {
	global $koneksi;
	mysqli_query($koneksi, "DELETE FROM tb_user where id_user = $id");
	return mysqli_affected_rows($koneksi);
}


?>