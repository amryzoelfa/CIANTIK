<?php ob_start(); ?>
<html>
<head>

  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }    
  </style>
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

  <?php
  // Load file koneksi.php
  include "../koneksi.php";

  if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
    $filter = $_GET['filter']; // Ambil data filder yang dipilih user

    if($filter == '1'){ // Jika filter nya 1 (per tanggal)
      $tgl = date('d-m-y', strtotime($_GET['tanggal']));

      echo '<h1><b>Data Kunjungan Tanggal '.$tgl.'</b></h1><br /><br />';

      $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user AND DATE(tanggal_periksa)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
      $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

      echo '<b>Data Kunjungan Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';

      $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user and MONTH(tb_periksa.tanggal_periksa)='".$_GET['bulan']."' AND YEAR(tb_periksa.tanggal_periksa)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
      //$query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user AND MONTH(tanggal)='".$_GET['bulan']."' AND YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
      
    }else{ // Jika filter nya 3 (per tahun)
      echo '<b>Data Kunjungan Tahun '.$_GET['tahun'].'</b><br /><br />';

      $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user and YEAR(tanggal_periksa)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
      //$query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user AND YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }
  }else{ // Jika user tidak memilih filter
    echo '<b>Semua Data Kunjungan</b><br /><br />';

     $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user ORDER BY tanggal_periksa"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    //$query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user ORDER BY tanggal"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
  }
  ?>
      <table border="1" cellpadding="8" > 
         <thead>  
               <tr>  
                  <th>Tanggal Periksa</th>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Poli</th>
                  <th>Diagnosa</th> 
                  <th>Obat</th>
               </tr>
         </thead>
         <tbody>  
               <?php
                  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                  $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                  if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

                     while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                           $tgl = date('d-m-Y', strtotime($data['tanggal_periksa'])); // Ubah format tanggal jadi dd-mm-yyyy
                           echo "<tr>";
                           echo "<td>".$tgl."</td>";
                           echo "<td>".$data['no_identitas']."</td>";
                           echo "<td>".$data['nama']."</td>";?>
                           <td><?php if($data['id_poli']==1){
                            echo "UMUM";}
                            else{
                              echo "GIGI";}?>
                            </td>
                           <?php echo "<td>".$data['diagnosa']."</td>";
                           echo "<td>".$data['resep_obat']."</td>";
                           echo "</tr>";
                     }
           
                     }else{ // Jika data tidak ada
                     echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
                     }
                  ?>
         </tbody>
         <!-- <tfoot>  
               <tr>  
                     <th colspan="3"> total belanja</th>
                     <th>Rp. <?php echo number_format($totalbelanja) ?> </th>
               </tr>
         </tfoot> -->
      </table> 
      
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data-Transaksi.pdf', 'D');
?>
