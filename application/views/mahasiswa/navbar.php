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

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
        <link href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />



        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <script type="text/javascript">
        function show() { document.getElementById('area').style.display = 'block'; }
        function hide() { document.getElementById('area').style.display = 'none'; }
      </script>

      <script type="text/javascript">
         function do_this() {
        var checkboxes = document.getElementsByName('kode[]');
        var button = document.getElementById('toggle');

        if (button.value == 'Select') {
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'Deselect';
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            button.value = 'Select';
        }
    }
</script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="<?php echo site_url('mahasiswa') ?>" class="logo">
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

                        <h5><a></a><?php echo $nav->namalengkap ?> </h5>
                        <p class="text-muted"><?php echo $username ?></p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                            <li>
                                <a href="<?php echo site_url('mahasiswa'); ?>">
                                    <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right">Home</span> <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-paper"></i> <span> Form Pengajuan </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo site_url("mahasiswa/layanan_kti"); ?>"> Karya Tulis Ilmiah</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/cek_nilai"); ?>"> Persetujuan Nilai</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/yudisium"); ?>"> Yudisium</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/wisuda"); ?>"> Wisuda</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-file-subtract"></i> <span> Menu Studi </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo site_url("mahasiswa/krs"); ?>"> KRS (Kartu Rencana Studi)</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/khs_semester"); ?>"> KHS (Kartu Hasil Studi)</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/remedial"); ?>"> Kartu Rencana Remedial</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/log_nilai"); ?>"> Histori Perubahan Nilai</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/krs_semester"); ?>"> Histori KRS</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo site_url('mahasiswa/data_sertifikat'); ?>">
                                    <i class="fi-archive"></i><span>Sertifikasi</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-head"></i> <span> Ubah Data Diri </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo site_url("mahasiswa/edit_data_diri/$nav->id"); ?>"> Data Pribadi</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/edit_data_tempat_tinggal/$nav->id"); ?>"> Tempat Tinggal</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/edit_data_kontak/$nav->id"); ?>"> Kontak</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/edit_data_pendidikan/$nav->id"); ?>"> Pendidikan/Pekerjaan</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/edit_data_wali/$nav->id"); ?>"> Data Orang Tua</a></li>
                                    <li><a href="<?php echo site_url("mahasiswa/edit_data_info/$nav->id"); ?>"> Lain - Lain</a></li>
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


                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <span class="ml-1"><i class="fi-cog"></i> Option<i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome, <?php echo $nav->namapanggil ?> !</h6>
                                    </div>
                                    <!-- item-->
                                    <a href="<?php echo site_url('mahasiswa/gantipassword') ?>" class="dropdown-item notify-item">
                                        <i class="fa-pencil"></i> <span>Ganti Password</span>
                                    </a>
                                    <a href="<?php echo site_url('mahasiswa/logout') ?>" class="dropdown-item notify-item">
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
                                        <li class="breadcrumb-item active">Welcome to DAMAS | Data Mahasiswa Panel !</li>
                                    </ol>
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->
