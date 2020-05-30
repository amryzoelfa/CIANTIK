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
      <td>&nbsp;</td>
      <td align="center"><h1>B - <?php echo $gigi[0]['ambil']; ?></h1></td>
      <td>&nbsp;</td>
    <?php ?>
    </tr>
  <tr>
      <td>&nbsp;</td>
      <td align="center"><?php echo $gigi[0]['tanggal']; ?></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
      <td>&nbsp;</td>
      <td align="center"><h6>POLI GIGI</h6></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
      <td>&nbsp;</td>
      <td align="center"><h5>TERIMA KASIH KUNJUNGAN ANDA</h5></td>
      <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="<?php echo site_url().'Pasien/Antrian' ?>" class="btn btn-primary" name="kembali">KEMBALI</a></td>
      <td align="center"></td>
      <td align="center"><a href="print-umum.php" class="btn btn-danger" name="cetak">DOWNLOAD</a>&nbsp;(Gunakan menu Download, apabila ingin mencetak Nomer Antrian Anda)</td>
  </tr>

  </table>

</body>