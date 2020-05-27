<?php
	//file koneksi .php

	//pendeklarasian variabel
	// $databaseHost='mif-project.com'; //nama host default dari xampp
	// $databaseName='u8823774_antik'; //nama database yang akan kita hubungkan
	// $databaseUsername='u8823774_antik';//default userd dari xampp
	// $databasePassword='mif2017';

	// //fungsi koneksi
	// //untuk membuat koneksi antara php dengan mysql server
	// $koneksi=mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

	// //untuk mengecek koneksi
	// if (!$koneksi) {
	// 	die("Gagal terhubung dengan database".mysqli_connect_error());//mengembalikan deskripsi kesalahn dari koneksi
	// }else{
	// 	//echo "Sukses";
	// }
?>

<?php
	//file koneksi .php

	//pendeklarasian variabel
	$databaseHost='localhost'; //nama host default dari xampp
	$databaseName='sukses'; //nama database yang akan kita hubungkan
	$databaseUsername='root';//default userd dari xampp
	$databasePassword='';

	//fungsi koneksi
	//untuk membuat koneksi antara php dengan mysql server
	$koneksi=mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

	//untuk mengecek koneksi
	if (!$koneksi) {
		die("Gagal terhubung dengan database".mysqli_connect_error());//mengembalikan deskripsi kesalahn dari koneksi
	}else{
		//echo "Sukses";
	}
?>