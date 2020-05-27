<?php
error_reporting(0);
include "koneksi.php";
session_start();

$user_check = $_SESSION['username'];

$sql = "SELECT * FROM tb_user WHERE username='$user_check'";
$ses_sql = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['id_user'];
$akses = $row['akses'];
$username=$row['username'];
$pass = $row['password'];
$foto = $row['foto'];
// $id_user = $row['id_user'];
 ?>
