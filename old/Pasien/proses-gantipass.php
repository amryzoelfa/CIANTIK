<?php
require_once('../koneksi.php');
include '../session.php';
session_start();
// Username ini adalah username yang login saat ini
// dan bisa diambil dari session username atau lainnya,
// ini hanyalah contoh saja :)
// intinya field yang saling berkaitan dengan tbllogin
$user_check = $_SESSION['username'];
$redirect = 'gantipass.php';
if (isset($_POST['ganti'])) {
  $paslam = $_POST['paslam'];
  $pasnew = $_POST['pasnew'];
  $conpas = $_POST['conpas'];

  $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$user_check'");
  if (mysqli_num_rows($result)==0) {
    echo "<script>alert('MAAF, Username $username Tidak Ditemukan! :('); window.location='$redirect';</script>";
  }else {
    $cek = mysqli_fetch_array($result);
    if ($paslam=='' || $pasnew=='' || $conpas=='') {
      echo "<script>alert('Form tidak boleh ada yang kosong'); window.location='$redirect';</script>";
    }else{
      if ($paslam <> $cek['password']) {
        echo "<script>alert('Password Lama tidak sama'); window.location='$redirect';</script>";
      }else{
        if ($pasnew <> $conpas) {
          echo "<script>alert('Password Baru & Konfirmasi Password Baru tidak cocok'); window.location='$redirect';</script>";
        }else {
          $sql = mysqli_query($koneksi, "UPDATE tb_user SET password='$pasnew' WHERE username='$username'");
          if ($sql) {
            echo "<script>alert('PASSWORD BERHASIL DISIMPAN! :)'); window.location='$redirect';</script>";
          }else {
            echo "<script>alert('PASSWORD GAGAL DISIMPAN! :('); window.location='$redirect';</script>";
          }
        }
      }
    }
  }

}
?>
