<?php
require("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LOGIN - Aplikasi Antrian Klinik</title>

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
  <link rel="stylesheet" href="vendors/animate-css/animate.css">
  <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
  <!-- logo antik -->
  <link rel="icon" href="img/service.png">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">


<body>

  <div class="container">
    <form class="form-signin" id="login" name="login" action="" method="post">
      <br>
      <h2 class="form-signin-heading" align="center" style="color: #FFFFFF;">LOGIN ANTIK</h2>

      <br>
      <label for="username" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username anda..." required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password anda..." required>

      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
      <a href="index.php" class="btn btn-lg btn-danger btn-block" name="kembali">Kembali</a>
      <!-- <button class="btn btn-lg btn-danger btn-block" type="submit" name="kembali">Kembali</button> -->
      <br>

      <br>
    </form>
  </div> <!-- /container -->


</body>

</html>
<?php
session_start();
require("koneksi.php");
$error = '';
if (isset($_POST['login'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = 'Username and Password Invalid!';
  } else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    $sql = "SELECT * FROM tb_user WHERE username='$username' and password='$password'";
    $query = mysqli_query($koneksi, $sql);
    $count = mysqli_num_rows($query);
    if ($count == 1) {
      $cek = mysqli_fetch_array($query);
      $_SESSION['username'] = $cek['username'];
      $_SESSION['akses'] = $cek['id_akses'];

      if ($cek['id_akses'] == "1") {
        $_SESSION['Admin'] = $username;
        echo "<script language='javascript'> alert('Anda Berhasil Login Admin!'); document.location='Admin/index.php';</script>";
        //header("location:admin/index-admin.php");
      } elseif ($cek['id_akses'] == "2") {
        $_SESSION['Pasien'] = $username;
        echo "<script language='javascript'> alert('Anda Berhasil Login Pasien!'); document.location='Pasien/index.php';</script>";
        //header("location:pasien/index.php");
      } elseif ($cek['id_akses'] == "3") {
        $_SESSION['Dokter Umum'] = $username;
        echo "<script language='javascript'> alert('Anda Berhasil Login Dokter Umum!'); document.location='Dokter/index.php';</script>";
        //header("location:dokter/index-dr.php");
      } elseif ($cek['id_akses'] == "4") {
        $_SESSION['Dokter Gigi'] = $username;
        echo "<script language='javascript'> alert('Anda Berhasil Login Dokter Gigi!'); document.location='Dokter/index-drg.php';</script>";
        //header("location:dokter/index-drg.php");
      } elseif ($cek['id_akses'] == "5") {
        $_SESSION['Apoteker'] = $username;
        echo "<script language='javascript'> alert('Anda Berhasil Login Apoteker!'); document.location='Apoteker/index.php';</script>";
        //header("location:apoteker/index-apoteker.php");
      } else {
        die("error");
      }
    } else {
?>
      <script language="JavaScript">
        alert('Username atau Password Salah !');
        setTimeout(function() {
          window.location.href = 'login.php'
        }, 10);
      </script>
<?php
    }
  }
}

?>