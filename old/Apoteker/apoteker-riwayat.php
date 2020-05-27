<?php
session_start();
require ("../koneksi.php");
include '../session.php';
include 'akses.php';
?>
  <!--query untuk membaca  tabel pada database-->

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
									<li class="nav-item">
										<a class="nav-link" href="index.php">Home</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="apoteker-antrian.php">Antrian</a>
									</li>
								<li class="nav-item">
										<a class="nav-link" href="apoteker-gantipass.php">Ganti Password</a>
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
			<h3>Data Pasien</h3></br>
			<br>
			<div class="container"></div>
			<div class="row">
				<?php 
					if (isset($_GET['id_antrian'])) {
						$idantrian = $_GET['id_antrian'];
				 		$query = mysqli_query($koneksi, "SELECT * FROM tb_user a LEFT JOIN tb_periksa b ON a.id_user = b.id_user WHERE no_identitas='$idantrian'");

				 		while($data = mysqli_fetch_array($query)) {
				 		
				 		$tgllahir = new DateTime($data ['tanggal_lahir']);
				 		$tglsekarang = new DateTime();
				  	
				  		 $idperiksa = $data ['id_periksa'];
				  		 $iduser = $data['id_user'];
				  		 $idpoli = $data['id_poli'];
				         $nama = $data ['nama'];
				         $jk = $data ['jenis_kelamin'];
				         $tmpl = $data ['tempat_lahir'];
				         $tgll = $data ['tanggal_lahir'];
				         $umr = $tglsekarang->diff($tgllahir)->format("%y");
				         $almt = $data ['alamat'];
				         $resepobat = $data ['resep_obat'];
				         $ket = $data ['keterangan'];
						}
					} else {
						 $idperiksa = '';
				         $nama = '';
				         $jk = '';
				         $tmpl = '';
				         $tgll = '';
				         $umr = '';
				         $almt = '';
				         $resepobat = '';
				         $ket = '';
					}
				?>


				<div class="col-lg-12">
					<form action="" method="post">
						<div class="form-group row">
		                  <label class="col-sm-2 col-form-label">ID</label>
		                  <div class="col-sm-10">
		                    <input type="text" disabled name="id" class="form-control" value="<?php echo $idperiksa ?>" required>
		                  </div>
		                </div>
		              <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Nama</label>
		                  <div class="col-sm-10">
		                    <input type="text" disabled name="nama" class="form-control" size="4" value="<?php echo $nama ?>" required>
		                  </div>
		                </div>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
		                  <div class="col-sm-10">
		                    <input type="text" disabled name="jk" class="form-control" size="4" value="<?php if ($jk=='L'){
		                    	echo "Laki-Laki";}else{
		                    		echo "Perempuan";
		                    
		                    } ;?>" required>
		                  </div>
		                </div>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">TTL</label>
		                 <div class="col-sm-10">
		                    <input type="text" disabled name="ttl" class="form-control" size="4" value="<?php echo $tmpl ?>, <?php echo $tgll ?>" required>
		                  </div>
		                </div>
		               <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Umur</label>
		                  <div class="col-sm-10">
		                    <input type="text" disabled name="umur" class="form-control" size="4" value="<?php echo $umr ?>" required>
		                  </div>
		                </div>
		                 <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Alamat</label>
		                  <div class="col-sm-10">
		                     <textarea type="text" disabled name="alamat" class="form-control" required><?php echo $almt ?></textarea>
		                  </div>
		                  </div>
		              </div>
		          </form>
		      </div>
		  </div>

		               <div class="container">
		                <br>
		                <h3>Resep Obat</h3>
		                <br>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">Obat</label>
		                  <div class="col-sm-10">
		                     <textarea type="text" disabled name="obat" class="form-control" required><?php echo $resepobat; ?></textarea>
		                  </div>
		                </div>
		                <div class="form-group row">
		                	<label class="col-sm-2 col-form-label">Keterangan</label>
		                		<div class="col-sm-10">
		                			<textarea type="text" disabled name="keterangan" class="form-control" required><?php echo $ket; ?></textarea>
		                		</div> 
		                </div></br>
		                <div class="form-group row">
		                  <label class="col-sm-2 col-form-label">&nbsp;</label>
		                  <div class="col-sm-10">
		                  	<input type="submit" name="kembali" class="btn btn-primary" value="KEMBALI">
		                  	<a class="btn btn-primary" href="apoteker-antrian.php?id_user=<?php echo $iduser; ?>&id_poli=<?php echo $idpoli; ?>">SELESAI</a>                   
		                    
		                   

		                   
		      
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
            <span>Copyright &copy; 2020 by iWARS</span>
          </div>
        </div>
     </footer>


  <!-- Modal -->
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