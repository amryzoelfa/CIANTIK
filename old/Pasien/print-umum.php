<?php ob_start(); ?>
<?php 
  session_start();
  include '../koneksi.php';
  include '../session.php';
?>
<html>
<head>

  <title>Print Antrian Poli Umum</title>
 
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
      <td align="center"> APLIKASI ANTRIAN KLINIK</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">Melayani dengan Sepenuh Hati</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"> Jalan Mastrip No.45 Jember</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center"> 082 234 121 604</td>
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
      <td align="center">POLI UMUM</td>
      <td>&nbsp;</td>
  </tr>
  <tr>
      <td>&nbsp;</td>
      <td align="center">TERIMA KASIH KUNJUNGAN ANDA</td>
      <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('antrianku.pdf', 'D');
?>
