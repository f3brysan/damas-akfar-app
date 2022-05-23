
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>Akademi Farmasi Surabaya</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/edua-icons.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cubeportfolio.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/settings.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootsnav.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/loader.css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png">

<!--[if lt IE 9]>
  <script src="<?php echo base_url();?>assets/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="<?php echo base_url();?>assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
<!--Loader-->
<div class="loader">
  <div class="bouncybox">
      <div class="bouncy"></div>
    </div>
</div>

<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="pull-left">
        <span class="info"><i class="icon-phone2"></i>(031) 828 0996</span>
        <span class="info"><i class="icon-mail"></i>info@akfarsurabaya.ac.id</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Header-->
<header>
  <nav class="navbar navbar-default navbar-fixed white no-background bootsnav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/images/logo-white.png" alt="logo" class="logo logo-display">
        <img src="<?php echo base_url();?>assets/images/logo.png" class="logo logo-scrolled" alt="">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
          <li><a href="<?php echo site_url('home')?>">Beranda</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Profil</a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('home/sejarah') ?>">Sejarah</a></li>
              <li><a href="<?php echo site_url('home/sambutan_direktur') ?>">Sambutan</a></li>
              <li><a href="<?php echo site_url('home/visimisi') ?>">Visi dan Misi</a></li>
              <li><a href="<?php echo site_url('home/lambang') ?>">Lambang Akfar</a></li>
              <li><a href="<?php echo site_url('home/struktur_organisasi') ?>">Struktur Organisasi</a></li>
            </ul>
          </li>

          <li class="dropdown megamenu-fw">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik & Lembaga Pendukung</a>
            <ul class="dropdown-menu megamenu-content" role="menu">
              <li>
                <div class="row">
                  <div class="col-menu col-md-6">
                    <h6 class="title">Akademik</h6>
                    <div class="content">
                      <ul class="menu-col">
                        <li><a href="about.html">Program Studi</a></li>
                        <li><a href="<?php echo site_url('home/dosen') ?>">Dosen</a></li>
                        <?php $url = $kalender[0]->url; ?>
                        <li><a href="<?php echo site_url("home/kalender_akademik/") ?><?php echo $url; ?>">Kalender Akademik</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-menu col-md-6">
                    <h6 class="title">Lembaga Pendukung</h6>
                    <div class="content">
                      <ul class="menu-col">
                        <li><a href="blog.html">LPM</a></li>
                        <li><a href="blog2.html">LPPM</a></li>
                        <li><a href="blog3.html">BAAK</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Kehidupan Kampus</a>
            <ul class="dropdown-menu">
              <li><a href="event.html">UKM</a></li>
              <li><a href="event_detail.html">Prestasi</a></li>
              <li><a href="event.html">Fasilitas Kampus</a></li>
              <li><a href="<?php echo site_url('home/galery') ?>">Gallery</a></li>
              <li><a href="event.html">Pusat Karir</a></li>
            </ul>
          </li>
          <li><a href="<?php echo site_url('home/post') ?>">Pengumuman & Berita</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>


<!--Search-->
<div id="search">
  <button type="button" class="close">×</button>
  <form>
    <input type="search" value="" placeholder="Search here...."  required/>
    <button type="submit" class="btn btn_common blue">Search</button>
  </form>
</div>
