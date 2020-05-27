<?php
session_start();
require ("../koneksi.php");
include '../session.php';
include 'akses.php';
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Antrian Klinik | Form Periksa</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../vendors/linericon/style.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="../vendors/animate-css/animate.css">
	<link rel="stylesheet" href="../vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<link rel="icon" href="../img/service.png">

	
</head>

<body>

	<?php 
		$id_user = $_GET['id_user'];
		if (isset($id_user) AND !empty($id_user)) {
			// Select id_poli
			$query = mysqli_query($koneksi, "SELECT id_poli FROM tb_antrian WHERE id_user = '$id_user' and tanggal=CURRENT_DATE()");
			$poli = mysqli_fetch_array($query); 
			$idpoli = $poli['id_poli'];

			var_dump($id_user); var_dump($idpoli);
			
			// Update id status perikas
			$querysprks = mysqli_query($koneksi, "UPDATE tb_periksa SET id_status_periksa = 3 WHERE id_user='$id_user' AND id_poli = '$idpoli'");

			// Select data user periksa

			$queryuser = mysqli_query($koneksi, "SELECT a.tanggal, b.nama, b.no_identitas FROM tb_antrian a LEFT JOIN tb_user b ON a.id_user = b.id_user WHERE a.id_user = '$id_user'");
			$user = mysqli_fetch_array($queryuser); 
			$namaa = $user['nama'];
			$noidentitas = $user['no_identitas'];
			date_default_timezone_set('Asia/Jakarta');
			$tanggal =  date("Y-m-d");
			
		}	
	?>

	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container">
				<div class="float-left">
					<ul class="left_side">
						<li>
							<a href="#">
								<i class="fa fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-instagram"></i>
							</a>
						</li>
					</ul>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<a href="#">
								<i class="lnr lnr-phone-handset"></i>
								+62 8515 6041 424
							</a>
						</li>
						<li>
							<a href="#">
								<i class="lnr lnr-envelope"></i>
								official.iwars@gmailcom
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index-drg.php">
						<img src="../img/antik.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row ml-0 w-100">
							<div class="col-lg-12 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item ">
										<a class="nav-link" href="index-drg.php">Home</a>
									</li>
									<li class="nav-item active">
										<a class="nav-link" href="gigi-antrian.php">Antrian</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="gigi-gantipass.php">Ganti Password</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="../logout.php" data-toggle="modal" data-target="#logoutModal">Logout </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

	
	<section class="feedback_area section_gap relative">
		<div class="container">
			<br>
			<h3>Data Periksa</h3>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<form action="gigi-insert.php" method="post">
						<div class="form-group row" hidden="true" >
		                  <label class="col-sm-2 col-form-label">Id User</label>
		                  <div class="col-sm-10">
		                    <input type="text" name="id_user" class="form-control" required value="<?php echo $id_user ?>">
		                  </div>
		                </div>
		                <div class="form-group row" hidden="true">
		                  <label class="col-sm-2 col-form-label">Id Poli</label>
		                  <div class="col-sm-10">
		                    <input type="text" name="id_poli" class="form-control" required value="<?php echo $idpoli ?>">
		                  </div>
		                </div>
						<div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Nama</label>
		                  <div class="col-sm-10">
		                    <input type="text" disabled name="nama" class="form-control" required value="<?php echo $namaa ?>">
		                  </div>
		                </div>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">No. Identitas</label>
		                  <div class="col-sm-10">
		                    <input type="text" disabled name="no_identitas" class="form-control" required value="<?php echo $noidentitas ?>">
		                  </div>
		                </div>
						<div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Tanggal Periksa</label>
		                  <div class="col-sm-10">
		                    <input type="date" disabled name="tanggal_periksa" class="form-control" required value="<?php echo $tanggal ?>">
		                  </div>
		                </div>
		             	<div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Tensi Darah</label>
		                  <div class="col-sm-10">
		                    <input type="text" name="tensi_darah" class="form-control" size="4" required>
		                  </div>
		                </div>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Riwayat Penyakit</label>
		                  <div class="col-sm-10">
		                    <input type="text" name="riwayat_penyakit" class="form-control" size="4" required>
		                  </div>
		                </div>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Gejala</label>
		                  <div class="col-sm-10">
		                    <textarea type="text" name="gejala" class="form-control" required></textarea>
		                  </div>
		                </div>
		               <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Diagnosa</label>
		                  <div class="col-sm-10">
		                     <textarea type="text" name="diagnosa" class="form-control" required></textarea>
		                  </div>
		                </div>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Tindakan</label>
		                  <div class="col-sm-10">
		                    <input type="text" name="tindakan" class="form-control" size="4" required>
		                  </div>
		                 </div>
		                 

		                <br>
		                <hr>

		                <h3>Resep Obat</h3>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Obat</label>
		                  <div class="col-sm-10">
		                     <textarea type="text" name="obat" class="form-control" required></textarea>
		                  </div>
		                </div>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Keterangan</label>
		                  <div class="col-sm-10">
		                     <textarea type="text" name="keterangan" class="form-control" required></textarea>
		                  </div>
		                </div>

		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">&nbsp;</label>
		                  <div class="col-sm-10">
		                  	<a href="gigi-antrian.php?id_user=<?php echo $id_user?>" class="btn btn-primary" name="periksa" value="submit" >KEMBALI</a>
		                  	<button class="btn btn-primary">SELESAI</button>
		                  </div>
		                </div>
		              </form>
				</div>
			</div>
		</div>
	</section>

<footer class="footer-area section_bar bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
           <span>Copyright &copy;2020 by iWARS</span>
          </div>
        </div>
     </footer>

<!-- end modal -->




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



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="../js/jquery.ajaxchimp.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="../js/mail-script.js"></script>
	<script src="../js/custom.js"></script>
</body>

</html>
