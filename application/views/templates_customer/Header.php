<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/animate.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_shop/') ?>css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('customer/Dashboard') ?>">Car<span>Book</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?php echo base_url('customer/Dashboard') ?>" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="<?php echo base_url('customer/Data_Mobil') ?>" class="nav-link">Mobil</a></li>
                    <?php if ($this->session->userdata('id_customer') == NULL) {
                    } else { ?>
                        <li class="nav-item"><a href="<?php echo base_url('customer/Transaksi') ?>" class="nav-link">Transaksi</a></li>
                    <?php } ?>

                    <?php if ($this->session->userdata('nama') == TRUE) { ?>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                Welcome, <?php echo $this->session->userdata('nama') ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Auth/logout') ?>" class="nav-link">
                                <span class="btn btn-sm btn-warning">Logout</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('Auth/ganti_password') ?>"  class="nav-link">
                                <span class="btn btn-sm btn-primary">Ganti Password</span>
                            </a>
                        </li> -->
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('register') ?>" type="button" class="nav-link">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Auth/login') ?>" type="button" class="nav-link">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->