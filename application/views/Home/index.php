<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Aplikasi Antrian Klinik</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/home/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/home/vendors/linericon/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/home/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/home/endors/nice-select/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/home/vendors/animate-css/animate.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/home/vendors/jquery-ui/jquery-ui.css') ?>">
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/home/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/home/css/responsive.css') ?>">
    <link rel="icon" href="<?php echo base_url('assets/home/img/service.png') ?>">

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
                        <img src="<?php echo base_url('assets/home/img/antik.png') ?>" alt="">
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
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?php echo base_url('Welcome'); ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('Welcome/Kontak'); ?>">Kontak</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('Welcome/Tentang'); ?>">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('Login'); ?>">LOGIN</a>
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

    <!--================ Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <h1>Selamat Datang di Website Antrian Klinik</h1>
                        <p>Silahkan Login jika sudah mendaftar. Jika belum ikuti petunjuk di bawah</p>
                        <a class="main_btn mr-10" href="<?php echo base_url('Login'); ?>">LOGIN</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Offered Services Area =================-->
    <section class="service_area p_50">
        <div class="container">
            <div class="row justify-content-center section-title-wrap">
                <div class="col-lg-12">
                    <h1>Petunjuk</h1>
                    <p>
                        di bawah ini adalah petunjuk untuk penggunaan Aplikasi ANTIK
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                        <span class="lnr lnr-file-add"></span>
                        <a href="#">
                            <h4>Daftar</h4>
                        </a>
                        <p>
                            Daftarkan diri Anda ke admin untuk bisa mendapat username dan password untuk akses masuk web.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                        <span class="lnr lnr-enter"></span>
                        <a href="#">
                            <h4>Login</h4>
                        </a>
                        <p>
                            Setelah mendapat username dan password masuk web, tekan tombol Login di atas halaman ini.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                        <span class="lnr lnr-pointer-up"></span>
                        <a href="#">
                            <h4>Ambil Antrian</h4>
                        </a>
                        <p>
                            Sesudah Anda login pilih menu Antrian untuk mengambil antrian ke poli yang Anda tuju.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                        <span class="lnr lnr-users"></span>
                        <a href="#">
                            <h4>Menunggu Panggilan</h4>
                        </a>
                        <p>
                            Tunggu petugas memanggil nomer antrian yang Anda dapat
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Offered Services Area =================-->

    <!-- Footer -->
    <footer class="footer-area section_bar">
        <div class="container">
            <div class="copyright text-center">
                <span>Copyright &copy; 2020 by iWARS</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/home/js/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/home/js/popper.js') ?>"></script>
    <script src="<?php echo base_url('assets/home/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/home/vendors/nice-select/js/jquery.nice-select.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/home/js/jquery.ajaxchimp.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/home/js/mail-script.js') ?>"></script>
    <script src="<?php echo base_url('assets/home/js/custom.js') ?>"></script>
</body>

</html>