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
                                    <li class="nav-item active">
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

    <!--================ Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-left">
                    <h2>Kontak Kami</h2>
                    <div class="page_link">
                        <a href="<?php echo base_url('Welcome'); ?>">Home</a>
                        <a href="<?php echo base_url('Welcome/Kontak'); ?>">Kontak Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area p_50">
        <div class="container">
            <div class="row justify-content-center section-title-wrap">
                <div class="col-lg-12">
                    <h1>Hubungi Kami</h1>
                    <p>
                        Kirimkan Kritikan, Masukan, Pengaduan maupun Saran untuk Pengembangan.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Jember, Indonesia</h6>
                            <p>Politeknik Negeri Jember</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>
                                <a href="https://api.whatsapp.com/send?phone=6285156041424">+62 8515 6041 424</a>
                            </h6>
                            <p>Senin-Jumat, 07.00 am - 04.00 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>
                                <a href="#">official.iwars@gmail.com</a>
                            </h6>
                            <p>Kirim Saran atau Kritik kapanpun</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="fa fa-instagram"></i>
                            <h6>
                                <a href="https://www.instagram.com/iwarsofficial/?hl=id">iwarsofficial</a>
                            </h6>
                            <p>Follow kami di Instagram</p>
                        </div>
                        <div class="info_item">
                            <i class="fa fa-youtube"></i>
                            <h6>
                                <a href="https://www.youtube.com/watch?v=w_54pA-ScBA">iwarsofficial</a>
                            </h6>
                            <p>Subscribe, Like dan Komen Kami di Youtube</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--================Contact Area =================-->


    <footer class="footer-area section_bar">
        <div class="container">
            <div class="copyright text-center">
                <span>Copyright &copy; 2020 by iWARS</span>
            </div>
        </div>
    </footer>


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