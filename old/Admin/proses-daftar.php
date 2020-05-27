<?php
require("../koneksi.php"); //untuk koneksi ke database untuk menambahkan data ke database lalu menangkap data yang dikirim dari form dan memasukkan ke variabel masing-masing
//deklarasi
$akses = $_POST['akses'];
$no_identitas = $_POST['no_identitas'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jk'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];
$username = $_POST['username'];
$password = $_POST['password'];

//untuk membuat query menambahkan data kedalam  tabel 
$query = "INSERT INTO tb_user (id_akses,no_identitas, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, no_hp, alamat, pekerjaan, username, password) VALUES ('$akses', '$no_identitas', '$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$no_hp', '$alamat', '$pekerjaan', '$username', '$password')";

$result = mysqli_query($koneksi, $query); //digunakan untuk menjalankan query insert
if (!$result) {
	echo "<script>alert alert-info('Data Berhasil  ditambahkan');</script>";
	//echo "<div class='alert alert-info'>Data Tersimpan</div>";
} else {

	if ($akses == 2) {
		echo "<meta http-equiv='refresh' content='1;url=data-pasien.php'>";
	} elseif ($akses == 3) {
		echo "<meta http-equiv='refresh' content='1;url=data-dokter.php'>";
	} elseif ($akses == 4) {
		echo "<meta http-equiv='refresh' content='1;url=data-dokter.php'>";
	} else {
		echo "<meta http-equiv='refresh' content='1;url=data-apoteker.php'>";
	}
	//header("location:pendaftar.php");//apbila data  berhasil ditambhkan maka langsung menuju halaman pendaftar.php
}
