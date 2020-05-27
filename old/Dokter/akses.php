<?php
  if(!isset($login_session)) {
  mysqli_close($koneksi); // Menutup koneksi
  echo "<script language='javascript'>alert('Anda Harus Login!'); document.location='../login.php';</script>";// Mengarahkan ke Home Page
  }
?>