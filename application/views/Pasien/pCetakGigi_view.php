<html>

<head>

  <title>Antrian Anda</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="<?php echo base_url('assets/home/css/bootstrap.css'); ?>" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="<?php echo base_url('assets/home/css/font-awesome.min.css'); ?>" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
  <script src="<?php echo base_url('assets/home/js/jquery.min.js'); ?>"></script> <!-- Load file jquery -->

</head>

<body>
  <table>
    <tr>
      <td>&nbsp;</td>
      <td align="center">
        <h3>APLIKASI ANTRIAN KLINIK</h3>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">
        <h5>Melayani dengan Sepenuh Hati</h5>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">
        <h6>Jalan Mastrip No.45 Jember</h6>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">
        <h6>085 156 041 424</h6>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>&nbsp;</tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">Nomor Antrian Anda :</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <?php foreach ($antrian as $key) {
      ?>
        <td align="center">
          <h1>B - <?php echo $key->gigi; ?></h1>
        </td>
        <td>&nbsp;</td>
    </tr>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><?php date_default_timezone_set('Asia/Jakarta');
                          echo date('d-m-Y H:i:s');
                         ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">
      <h6>POLI GIGI</h6>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">
      <h5>TERIMA KASIH KUNJUNGAN ANDA</h5>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="<?php echo site_url() . 'Pasien/Antrian' ?>" class="btn btn-primary" name="kembali">KEMBALI</a></td>
    <td align="center"></td>
    <td align="center"><a href="<?php echo site_url() . 'Pasien/printGigi' ?>" class="btn btn-danger" name="cetak">DOWNLOAD</a>&nbsp;(Gunakan menu Download, apabila ingin mencetak Nomer Antrian Anda)</td>
  </tr>
  </table>
</body>

</html>