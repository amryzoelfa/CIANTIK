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
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('Welcome'); ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('Welcome/Kontak'); ?>">Kontak</a>
                                    </li>
                                    <li class="nav-item active">
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

    <!--================ Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-left">
                    <h2>Tentang Kami</h2>
                    <div class="page_link">
                        <a href="<?php echo base_url('Welcome'); ?>">Home</a>
                        <a href="<?php echo base_url('Welcome/Tentang'); ?>">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="<?php echo base_url('assets/home/img/blog/1.jpg') ?>" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="#">
                                    <h5>Antrian Klinik</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Tak Perlu datang untuk ambil Antrian</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="<?php echo base_url('assets/home/img/blog/1.jpg') ?>" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="#">
                                    <h5>Dokter</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Di tangani oleh Dokter Terpercaya.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="<?php echo base_url('assets/home/img/blog/1.jpg') ?>" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="#">
                                    <h5>Pelayanan</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Poli Umum dan Poli Gigi<p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!-- Start Appointment Area -->
    <section class="appointment-area">
        <div class="container">
            <div class="row justify-content-between align-items-center appointment-wrap">
                <div class="col-lg-5 col-md-6 appointment-left">
                    <h1>
                        Jam Pelayanan
                    </h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <ul class="time-list">
                        <li class="d-flex justify-content-between">
                            <span>Senin-Kamis</span>
                            <span>08.00 am - 10.00 pm</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Jumat</span>
                            <span>08.00 am - 10.00 pm</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Sabtu-Minggu</span>
                            <span>08.00 am - 10.00 pm</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 appointment-right">
                    <h1>Antrian Klinik</h1>
                    <p>
                        Antrian Klinik adalah aplikasi pasien untuk bisa mengambil antrian secara online. Tanpa menggunakan kertas yang memungkinkan dapat hilang dan membutuhkan kertas yang banyak. Dengan aplikasi ini dapat mempermudah pasien dan admin untuk menyimpan dan menginputkan data.
                    </p><br><br><br><br><br><br><br><br>

                </div>
            </div>
        </div>
    </section>
    <!-- End Appointment Area -->

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