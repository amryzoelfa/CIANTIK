<?php
if(isset($_GET['id'])){
	include('../koneksi.php');//digunakan untuk memaggil file koneksi.php
	$id_akses=$_GET['id'];
	$cek=mysqli_query($koneksi,"SELECT id_akses FROM tb_akses where id_akses='$id_akses'")or die(mysql_error());
	if(mysqli_num_rows($cek)==0){
	  	echo'<script>window.history.back()</script>'; //apabila terjadi keslahan dalam menampilkan data maka akan kembali ke halaman sebelumnya
	 }else{
		$del=mysqli_query($koneksi,"DELETE FROM tb_akses WHERE id_akses='$id_akses'");//query untuk menghapus data pada kolom
		if($del){
	  			header("location:data-akses.php"); //apabila file berhasil dihapus maka langsung menuju halaman data-akses.php
		}else{
	  		header("location:data-akses.php");//apabila file yang akan dihapus gagl terhapus maka akan menuju halaman data-akses.php
	  	}
	 }
}else{
	 echo'<script>window.history.back()</script>';//apabila terjadi keslahan dalam menampilkan data maka akan kembali ke halaman sebelumnya
}
?>