<?php
	// include ('../koneksi.php');
	// $id_akses = $_POST['id'];
	// $akses = $_POST['akses'];

	// $query = "UPDATE tb_akses  SET ket_akses='$akses' WHERE id_akses='$id_akses'";
	// $result = mysqli_query($koneksi, $query);
	// header("location: data-akses.php");
if (isset($_POST['eakses'])) {
          $id_akses = $_POST['id'];
          $update = mysqli_query($conn, " UPDATE tb_askes set id_akses = '".$_POST['id_akses']."',
                                                 ket_akses = '".$_POST['akses']."'
                                                 WHERE id_akses = '".$id_akses."'
                                 ");
          if ($update) {
            header('location:data-akses.php');
          } else {
           echo 'Gagal' .mysqli_error($conn);
          }
      }
?>