<?php
session_start();
require '../koneksi.php';
include '../session.php';
include 'assets/akses.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'assets/header.php'; ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'assets/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include 'assets/navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LAPORAN KUNJUNGAN & PERIKSA</h1>
          </div>

          <form method="get" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Filter Berdasarkan</label>
              <div class="col-sm-5">
                <select class="form-control" name="filter" id="filter">
                  <option value="" selected="">Pilih</option>
                  <option value="1">Per Tanggal</option>
                  <option value="2">Per Bulan</option>
                  <option value="3">Per Tahun</option>
                </select>
              </div>
            </div>

            <div class="form-group row" id="form-tanggal">
              <label class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-5">
                <input type="date" name="tanggal" class="form-control" size="4" /><!-- class="input-tanggal"  -->
              </div>
            </div>

            <div class="form-group row" id="form-bulan">
              <label class="col-sm-2 col-form-label">Bulan</label>
              <div class="col-sm-5">
                <select class="form-control" name="bulan">
                  <option value="">Pilih</option>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row" id="form-tahun">
              <label class="col-sm-2 col-form-label">Tahun</label>
              <div class="col-sm-5">
                <select class="form-control" name="tahun">
                  <option value="">Pilih</option>
                  <?php
                  $query = "SELECT YEAR(tanggal_periksa) AS tahun FROM tb_periksa GROUP BY YEAR(tanggal_periksa)"; // Tampilkan tahun sesuai di tabel transaksi
                  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

                  while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">&nbsp;</label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" value="">Tampilkan</button>
                <a href="laporan.php" class="btn btn-danger">Reset Filter</a>
              </div>
            </div>

            <!-- <button type="submit">Tampilkan</button>
                        <a href="laporan.php">Reset Filter</a> -->
          </form>
          <hr />

          <?php
          if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)

              $tgl = date('d-m-y', strtotime($_GET['tanggal']));

              echo '<b>Data Kunjungan Tanggal ' . $tgl . '</b><br /><br />';
              echo '<a href="print.php?filter=1&tanggal=' . $_GET['tanggal'] . '" class="btn btn-success"><i class="fas fa-print"></i>Cetak PDF</a><br /><br />';

              $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user and DATE(tanggal_periksa)='" . $_GET['tanggal'] . "'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)

              $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

              echo '<b>Data Kunjungan Bulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b><br /><br />';
              echo '<a href="print.php?filter=2&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '" class="btn btn-success"><i class="fas fa-print"></i>Cetak PDF</a><br /><br />';

              $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user and MONTH(tb_periksa.tanggal_periksa)='" . $_GET['bulan'] . "' AND YEAR(tb_periksa.tanggal_periksa)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
            } else { // Jika filter nya 3 (per tahun)
              echo '<b>Data Kunjungan Tahun ' . $_GET['tahun'] . '</b><br /><br />';
              echo '<a href="print.php?filter=3&tahun=' . $_GET['tahun'] . '" class="btn btn-success"><i class="fas fa-print"></i>Cetak PDF</a><br /><br />';

              $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user and YEAR(tanggal_periksa)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
            }
          } else { // Jika user tidak mengklik tombol tampilkan
            echo '<b>Semua Data Kunjungan</b><br /><br />';
            echo '<a href="print.php" class="btn btn-success"><i class="fas fa-print"></i> Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user ORDER BY tanggal_periksa"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
          }
          ?>

          <table class="table table-bordered">
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
              if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)

                while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                  $tgl = date('d-m-Y', strtotime($data['tanggal_periksa'])); // Ubah format tanggal jadi dd-mm-yyyy
                  echo "<tr>";
                  echo "<td>" . $tgl . "</td>";
                  echo "<td>" . $data['no_identitas'] . "</td>";
                  echo "<td>" . $data['nama'] . "</td>"; ?>
                  <td><?php if ($data['id_poli'] == 1) {
                        echo "UMUM";
                      } else {
                        echo "GIGI";
                      } ?>
                  </td>
              <?php echo "<td>" . $data['diagnosa'] . "</td>";
                  echo "<td>" . $data['resep_obat'] . "</td>";
                  echo "</tr>";
                }
              } else { // Jika data tidak ada
                echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
              }
              ?>
            </tbody>
            <!-- <tfoot>  
               <tr>  
                     <th colspan="3"> Total Pengunjung</th>
                     <th><?php //echo number_format($totalbelanja) 
                          ?> </th>
               </tr>
         </tfoot> -->
          </table>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include 'assets/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin untuk Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" jika ingin Keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php include 'assets/js.php'; ?>

</body>

</html>