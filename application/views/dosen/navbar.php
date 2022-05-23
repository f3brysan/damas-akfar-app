<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>DAMAS | Data Mahasiswa Akademi Farmasi Surabaya</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
        <!-- DataTables -->
        <link href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>assets/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="<?php echo base_url(); ?>assets/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- Dropzone css -->
        <link href="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        
    </head>
    <?php foreach ($getdosen as $dosen): ?>
    
    
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="<?php echo site_url('dosen') ?>" class="logo">
                            <span>
                                <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height="22">
                            </span>
                            <i>
                            <img src="<?php echo base_url(); ?>assets/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>
                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        </div>
                        <h5><a><?php echo $dosen['gelardepan'] ?> <?php echo $dosen['nama'] ?></a> <?php echo $dosen['gelarbelakang'] ?></h5>
                        <p class="text-muted">NIDN/NUP : <?php echo $dosen['nidn'] ?></p>
                    </div>
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                            <!--<li class="menu-title">Navigation</li>-->
                            <li>
                                <a href="<?php echo site_url('dosen'); ?>">
                                    <i class="fi-air-play"></i><span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('dosen_wali'); ?>">
                                    <i class="fi-umbrella"></i><span> Pembimbing Akademik </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('dosen/hasil_ekd'); ?>">
                                    <i class="fi-star"></i><span> Hasil EKD </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Master Data </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">                                    
                                    <li><a href="<?php echo site_url("dosen/data_pjmk") ?>">Data Nilai</a></li>
                                    <li><a href="<?php echo site_url("dosen/nilai_kpm") ?>">Data Nilai KPM</a></li>
                                    <li><a href="<?php echo site_url("dosen/validasi_proposal_kti") ?>">Data Pengesahan Proposal KTI</a></li>
                                    <li><a href="<?php echo site_url("dosen/validasi_kti") ?>">Data Pengesahan KTI</a></li>
                                </ul>
                            </li>                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Top Bar Start -->
                <div class="topbar">
                    <nav class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li class="hide-phone app-search">
                                <form>
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1"><?php echo $username ?> <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome <?php echo $username ?>!</h6>
                                    </div>
                                    <!-- item-->
                                    <!-- item-->
                                    <a href="<?php echo site_url("dosen/gantipassword") ?>" class="dropdown-item notify-item">
                                        <i class="fi-cog"></i> <span>Ganti Password</span>
                                    </a>
                                    <a href="<?php echo site_url("dosen/logout") ?>" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to Highdmin admin panel !</li>
                                    </ol>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Top Bar End -->
                <?php endforeach ?>