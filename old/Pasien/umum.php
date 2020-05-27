<?php 
  session_start();
  include '../koneksi.php';
  include '../session.php';
?>
<html>
<head>

  <title>Antrian Anda</title>
  
  <!-- BOOTSTRAP STYLES-->
  <link href="../css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
  <script src="../js/jquery.min.js"></script> <!-- Load file jquery -->

</head>
<body>
  <table>
    <tr>
      <td>&nbsp;</td>
      <td align="center"> <h3>APLIKASI ANTRIAN KLINIK</h3></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"><h5>Melayani dengan Sepenuh Hati</h5></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"> <h6>Jalan Mastrip No.45 Jember</h6></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"> <h6>082 234 121 604</h6></td>
      <td>&nbsp;</td>
    </tr>
  <tr>&nbsp;</tr>
  <tr>
      <td>&nbsp;</td>
      <td align="center">Nomor Antrian Anda :</td>
      <td>&nbsp;</td>
  </tr>
    <tr>
      <?php
        $tgl = date("d-m-Y h:i:s");
        $queryambil = mysqli_query($koneksi, "SELECT MAX(no_antrian) FROM tb_antrian WHERE id_poli = 1 AND tanggal=CURRENT_DATE() AND id_user='$login_session'");
        while($ambil = mysqli_fetch_array($queryambil)){
      ?>
      <td>&nbsp;</td>
      <td align="center"><h1>A - <?php echo $ambil[0]; ?></h1></td>
      <td>&nbsp;</td>
    <?php } ?>
    </tr>
  <tr>
      <td>&nbsp;</td>
      <td align="center"><?php echo $tgl; ?></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
      <td>&nbsp;</td>
      <td align="center"><h6>POLI UMUM</h6></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
      <td>&nbsp;</td>
      <td align="center"><h5>TERIMA KASIH KUNJUNGAN ANDA</h5></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
      <td align="center"><a href="antrian.php" class="btn btn-primary" name="kembali">KEMBALI</a></td>
      <td align="center"></td>
      <td align="center"><a href="print-umum.php" class="btn btn-danger" name="cetak">DOWNLOAD</a>&nbsp;(Gunakan menu Download, apabila ingin mencetak Nomer Antrian Anda)</td>
  </tr>

  </table>

</body>
</html>
