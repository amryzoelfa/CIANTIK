<?php
if(isset($_GET['id'])){
	include('../koneksi.php');//digunakan untuk memaggil file koneksi.php
	$id_poli=$_GET['id'];
	$cek=mysqli_query($koneksi,"SELECT id_poli FROM tb_poli where id_poli='$id_poli'")or die(mysql_error());
	if(mysqli_num_rows($cek)==0){
	  	echo'<script>window.history.back()</script>'; //apabila terjadi keslahan dalam menampilkan data maka akan kembali ke halaman sebelumnya
	 }else{
		$del=mysqli_query($koneksi,"DELETE FROM tb_poli WHERE id_poli='$id_poli'");//query untuk menghapus data pada kolom
		if($del){
	  			header("location:data-poli.php"); //apabila file berhasil dihapus maka langsung menuju halaman data-poli.php
		}else{
	  		header("location:data-poli.php");//apabila file yang akan dihapus gagl terhapus maka akan menuju halaman data-poli.php
	  	}
	 }
}else{
	 echo'<script>window.history.back()</script>';//apabila terjadi keslahan dalam menampilkan data maka akan kembali ke halaman sebelumnya
}
?>