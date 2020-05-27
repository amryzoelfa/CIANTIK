<?php
if(isset($_GET['id'])){
	include('../koneksi.php');//digunakan untuk memaggil file koneksi.php
	$id_status=$_GET['id'];
	$cek=mysqli_query($koneksi,"SELECT id_status FROM tb_status where id_status='$id_status'")or die(mysql_error());
	if(mysqli_num_rows($cek)==0){
	  	echo'<script>window.history.back()</script>'; //apabila terjadi keslahan dalam menampilkan data maka akan kembali ke halaman sebelumnya
	 }else{
		$del=mysqli_query($koneksi,"DELETE FROM tb_status WHERE id_status='$id_status'");//query untuk menghapus data pada kolom
		if($del){
	  			header("location:data-status.php"); //apabila file berhasil dihapus maka langsung menuju halaman data-status.php
		}else{
	  		header("location:data-status.php");//apabila file yang akan dihapus gagl terhapus maka akan menuju halaman data-status.php
	  	}
	 }
}else{
	 echo'<script>window.history.back()</script>';//apabila terjadi keslahan dalam menampilkan data maka akan kembali ke halaman sebelumnya
}
?>