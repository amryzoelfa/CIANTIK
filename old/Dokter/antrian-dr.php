<?php
session_start();
require("../koneksi.php");
include '../session.php';
include 'akses.php';
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Aplikasi Antrian Klinik</title>
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
	if (isset($id_user) and !empty($id_user)) {
		// Select id_poli
		$query = mysqli_query($koneksi, "SELECT id_poli FROM tb_antrian WHERE id_user = '$id_user'");
		$poli = mysqli_fetch_array($query);
		$idpoli = $poli['id_poli'];

		var_dump($id_user);
		var_dump($idpoli);
		// Update id status perikas
		$querysprks = mysqli_query($koneksi, "UPDATE tb_periksa SET id_status_periksa = 1 WHERE id_user='$id_user' AND id_poli = '$idpoli' and tanggal_periksa = CURRENT_DATE()");

		// 
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
					<a class="navbar-brand logo_h" href="index.php">
						<img src="../img/antik.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
										<a class="nav-link" href="index.php">Home</a>
									</li>
									<li class="nav-item active">
										<a class="nav-link" href="antrian-dr.php">Antrian</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="gantipass-dr.php">Ganti Password</a>
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
			<font size="+6" color="lightblue" face="arial">
				<center>
					<h2>Daftar Antrian</h2>
				</center>
			</font>
			<table class="table table-bordered" method="post">
				<thead>
					<tr>
						<th>No Antrian</th>
						<th>Nama</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = mysqli_query($koneksi, "SELECT tb_antrian.no_antrian, tb_user.nama, tb_periksa.id_status_periksa, tb_periksa.id_user FROM tb_antrian , tb_user , tb_periksa WHERE tb_antrian.id_user =  tb_user.id_user AND tb_user.id_user = tb_periksa.id_user AND tb_periksa.tanggal_periksa = CURRENT_DATE() AND tb_periksa.id_poli = 1 AND tb_antrian.id_poli=1 AND tb_antrian.tanggal = CURRENT_DATE()  GROUP BY tb_periksa.id_periksa");
					while ($data = mysqli_fetch_array($query)) {
					?>

						<tr>
							<td><?php echo $data['no_antrian']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php if ($data['id_status_periksa'] == 1) {
									echo "BELUM";
								} else if ($data['id_status_periksa'] == 2) {
									echo "SUDAH";
								} else {
									echo "PROSES";
								} ?></td>
							<td>
								<?php
								if ($data['id_status_periksa'] == 2) {
								?>
									<button class="btn btn-primary" disabled="true">Periksa</button>
								<?php
								} else {
								?>
									<a href="data-periksa.php?id_user=<?php echo $data['id_user'] ?>" class="btn btn-primary" name="periksa" value="submit">Periksa</a>
								<?php
								}
								?>
							</td>
						<?php

					}

					if (isset($_POST['periksa'])) {
						$id_user = $_GET['id_user'];
						$query = "UPDATE tb_periksa SET id_status_periksa = 3 where id_poli = 1 and tanggal_periksa = CURRENT_DATE() where id_user='$id_user' and tanggal_periksa = CURRENT_DATE()";
						$sql = mysqli_query($koneksi, $query);
					} else {
					}
						?>
						</tr>
				</tbody>
			</table>
		</div>
	</section>

	<footer class="footer-area section_bar bg-white">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>Copyright &copy;2020 by iWARS</span>
			</div>
		</div>
	</footer>


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