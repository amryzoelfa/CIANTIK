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

	<link href="../css/antrian.css" rel="stylesheet" text="text/css">

</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container">
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
										<a class="nav-link" href="index.php">Home</a>
									</li>
									<li class="nav-item active">
										<a class="nav-link" href="antrian.php">Antrian</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link" href="riwayat.php">Riwayat</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="gantipass.php">Ganti Password</a>
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

	<section class="procedure_category section_gap_custom"><!-- contact_area p_120 -->
		<div class="container">
			<br>
			<center><h1>ANTRIAN</h1></center>
			<center><h3><?php include '../jam.php'; ?></h3></center>
			<br>
			<div class="row">
	            <!-- Pie Chart -->
	            <div class="col-xl-6 col-lg-6">
	              <div class="card shadow mb-4 bg-primary">
	                <div class="card-body">
	                    <form action="" method="post">
	                      <div class="form-group row">
	                        <table  id="dataTable" width="100%" cellspacing="0">
	                        	<?php
										$queryumum = "SELECT COUNT(tb_periksa.id_user) FROM tb_periksa WHERE id_poli = 1 AND id_status_periksa = 1 AND tanggal_periksa = CURRENT_DATE()";
										$sqlumum = mysqli_query($koneksi, $queryumum);
										while($drowumum = mysqli_fetch_array($sqlumum)){
									?>
		                        	<tr>
		                        		<td>&nbsp;</td>
		                        		<td align="center"><H1>POLI UMUM</H1></td>
		                        		<td>&nbsp;</td>
		                        	</tr>
		                        	<TR><TD>&nbsp;</TD></TR>
		                        	<tr>
		                        		<?php
		                        					                        			
										    $querypro = mysqli_query($koneksi, "SELECT tb_antrian.no_antrian FROM tb_periksa, tb_poli, tb_antrian WHERE tb_poli.id_poli=tb_antrian.id_poli AND tb_periksa.id_poli=tb_poli.id_poli AND tb_periksa.id_status_periksa=3 AND tb_periksa.id_poli=2 AND tb_periksa.tanggal_periksa=CURRENT_DATE() and tb_antrian.tanggal=CURRENT_DATE() GROUP BY tb_periksa.id_periksa");
										    while($pro = mysqli_fetch_array($querypro)){
										    	 //var_dump($pro); die;
										?>
		                        		<td>&nbsp;</td>
		                        		<td align="center"><h2>A - <?php  print_r($pro['no_antrian']); ?></h2></td>
		                        		<td>&nbsp;</td>
		                        		<?php 
		                        	
		                        	} ?>
		                        	</tr>
		                        	<tr>
		                        		<td>&nbsp;</td>
		                        		<td align="center"><h5>Jumlah Antrian : <?php echo $drowumum[0]; ?></h5></td>
		                        		<td>&nbsp;</td>
		                        	</tr>
		                        	<TR><TD>&nbsp;</TD></TR>
		                        	<tr>
		                        		<td>&nbsp;</td>
		                        		<td><button type="submit" class="btn btn-user btn-block btn-danger" name="ambil1" value="submit"> Ambil Antrian Anda</button></td>
		                        		<td>&nbsp;</td>
		                        		<?php 
		                        		    $querytambah = "SELECT MAX(no_antrian) FROM tb_antrian WHERE tanggal=CURRENT_DATE() AND id_poli=1";
		                        		    $sqltambah = mysqli_query($koneksi, $querytambah);
		                        		    while($tambah = mysqli_fetch_array($sqltambah)){

	   										date_default_timezone_set('Asia/Jakarta');
											$tanggal1 = date("Y-m-d");
											
	                            			$id_antrian = $_POST['id_antrian'];
	                            			$id_user = $login_session;
	                            			$id_poli = 1;
	                            			$antrian = $tambah[0] + 1;

											if (isset($_POST['ambil1'])) {
											  $sql1 = "INSERT INTO tb_antrian (id_user, id_poli, tanggal, no_antrian) VALUES ('$id_user', '$id_poli', '$tanggal1', '$antrian')";

											  $sql2 = "INSERT INTO tb_periksa (id_user, id_poli, tanggal_periksa, id_status_periksa, id_status_obat) VALUES ('$id_user', '$id_poli', '$tanggal1', 1, 1)";
											  mysqli_query($koneksi,$sql1);
											  mysqli_query($koneksi,$sql2);
											  	echo '<META HTTP-EQUIV="Refresh" Content="0; url=umum.php">';
											  		//header("location: print-umum.php");
											 } else {
											 	//tidak berhasil
											 }
											}
										?>
		                        	</tr>
		                        	<?php } ?>	        
	                        </table>
	                      </div>
	                    </form>
	                  </div>
	              </div>
	            </div>
	            <!-- Area Chart -->
	            <div class="col-xl-6 col-lg-6">
	                <div class="card shadow mb-4 bg-success">
	                  <div class="card-body">
	                      <form action="" method="post">
	                          <div class="form-group row">
	                          	<table  id="dataTable" width="100%" cellspacing="0">
	                          		<?php
										$querygigi = "SELECT COUNT(tb_periksa.id_user) from tb_periksa WHERE id_poli = 2 and id_status_periksa = 1 and tanggal_periksa = CURRENT_DATE()";
										$sqlgigi = mysqli_query($koneksi, $querygigi);
										while($drowgigi = mysqli_fetch_array($sqlgigi)){
									?>
		                        	<tr>
		                        		<td>&nbsp;</td>
		                        		<td align="center"><H1>POLI GIGI</H1></td>
		                        		<td>&nbsp;</td>
		                        	</tr>
		                        	<TR><TD>&nbsp;</TD></TR>
		                        	<tr>
		                        		<?php
		                        			//$tgl = date("d-m-Y h:i:s");
										    $querypros = mysqli_query($koneksi, "SELECT tb_antrian.no_antrian FROM tb_periksa, tb_poli, tb_antrian WHERE tb_poli.id_poli=tb_antrian.id_poli AND tb_periksa.id_poli=tb_poli.id_poli AND tb_periksa.id_status_periksa=3 AND tb_periksa.id_poli=2 AND tb_periksa.tanggal_periksa=CURRENT_DATE() and tb_antrian.tanggal=CURRENT_DATE() GROUP BY tb_periksa.id_periksa");
			    							while($pros = mysqli_fetch_array($querypros)){
										?>
		                        		<td>&nbsp;</td>
		                        		<td align="center"><h2>B - <?php print_r($pros['no_antrian']); ?></h2></td>
		                        		<td>&nbsp;</td>
		                        		<?php } ?>
		                        	</tr>
		                        	<tr>
		                        		<td>&nbsp;</td>
		                        		<td align="center"><h5>Jumlah Antrian : <?php echo $drowgigi[0]; ?></h5></td>
		                        		<td>&nbsp;</td>
		                        	</tr>
		                        	<TR><TD>&nbsp;</TD></TR>
		                        	<tr>
		                        		<td>&nbsp;</td>
		                        		<td align="center"><button type="submit" class="btn btn-user btn-block btn-danger" name="ambil2" value="submit"> Ambil Antrian Anda</button></td>
		                        		<td>&nbsp;</td>
		                        		<?php 
		                        			$querytambahg = "SELECT MAX(no_antrian) FROM tb_antrian WHERE tanggal=CURRENT_DATE() AND id_poli=2";
		                        		    $sqltambahg = mysqli_query($koneksi, $querytambahg);
		                        		    while($tambahg = mysqli_fetch_array($sqltambahg)){

	   										date_default_timezone_set('Asia/Jakarta');
											$tanggal= date("Y-m-d");
											
	                            			$id_antrian2 = $_POST['id_antrian'];
	                            			$id_user2 = $login_session;
	                            			$id_poli2 = 2;
	                            			$antrian2 = $tambahg[0] + 1;

											if (isset($_POST['ambil2'])) {
											  $sql3 = "INSERT INTO tb_antrian (id_user, id_poli, tanggal, no_antrian) values('$id_user2', '$id_poli2', '$tanggal', '$antrian2')";
											  $sql4 = "INSERT INTO tb_periksa(id_user,id_poli,tanggal_periksa,id_status_periksa,id_status_obat) values ('$id_user2','$id_poli2','$tanggal',1,1)";
											  mysqli_query($koneksi,$sql3);
											  mysqli_query($koneksi,$sql4);
											  	echo '<META HTTP-EQUIV="Refresh" Content="0; url=gigi.php">';
											  		//header("location:print-gigi.php");
											 } else {
											 	//tidak berhasil
											 }
											}
										?>
		                        	</tr>
		                        	<?php } ?>
	                        	</table>
	                          </div>
	                      </form>
	                  </div>
	                </div>
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



<!-- Modal -->
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
  

<!-- end modal -->





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