<html>

<head>

  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse: collapse;
      table-layout: fixed;
      width: 630px;
    }

    table td {
      word-wrap: break-word;
      width: 20%;
    }
  </style>
  <!-- BOOTSTRAP STYLES-->
  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="<?php echo base_url('assets/plugin/jquery-ui/jquery-ui.min.css') ?>" /> <!-- Load file css jquery-ui -->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script> <!-- Load file jquery -->

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
      <td align="center"> 085 156 041 424</td>
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
          <h1>A - <?php echo $key->umum; ?></h1>
        </td>
        <td>&nbsp;</td>
    </tr>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><?php $tanggal = date("d-m-Y h:i:s");
                        echo $tanggal;  ?></td>
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