
<!--Slider-->
<section class="rev_slider_wrapper text-center">
<!-- START REVOLUTION SLIDER 5.0 auto mode -->
  <div id="rev_slider" class="rev_slider"  data-version="5.0">
    <ul>
    <!-- SLIDE  -->
    <?php foreach ($banner as $b): ?>
      <li data-transition="fade">
        <!-- MAIN IMAGE -->
        <img src="<?php echo base_url();?>uploads/gambar/<?php echo $b['gambar']; ?>" width="1600" height="730" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg">
        <!-- LAYER NR. 1 -->
        <div class="tp-caption tp-resizeme"
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['326','270','270','150']" data-voffset="['0','0','0','0']"
        data-responsive_offset="on"
        data-visibility="['on','on','on','on']"
        data-transform_idle="o:1;"
        data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
        data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
        data-start="800"><h1><?php echo $b['judul'] ?></h1>
        </div>
        <div class="tp-caption tp-resizeme"
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['380','340','300','350']" data-voffset="['0','0','0','0']"
        data-responsive_offset="on"
        data-visibility="['on','on','off','off']"
        data-transform_idle="o:1;"
        data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
        data-transform_out="opacity:0;s:1000;s:1000;"
        data-start="1500"><?php echo $b['keterangan'] ?>
        </div>
        <div class="tp-caption  tp-resizeme"
        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
        data-y="['450','390','350','250']" data-voffset="['0','0','0','0']"
        data-responsive_offset="on"
        data-visibility="['on','on','on','on']"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
        data-mask_out="x:0;y:0;s:inherit;e:inherit;"
        data-start="2000">
        <a href="#." class="border_radius btn_common white_border">our services</a>
        <a href="#." class="border_radius btn_common blue">Get a quote</a>
        </div>
      </li>
  <?php endforeach; ?>
    </ul>
  </div><!-- END REVOLUTION SLIDER -->
</section>


<!--ABout US-->
<section id="about" class="padding">
  <div class="container margin_top">
    <div class="row">
      <div class="col-md-7 col-sm-6 priorty wow fadeInLeft" data-wow-delay="300ms">
        <h2 class="heading bottom25">Selamat Datang di Akademi Farmasi Surabaya <span class="divider-left"></span></h2>
        <?php foreach ($sejarah as $s): ?>
        <p class="half_space"><?php echo $s->isi ?> </p>
          <?php endforeach; ?>
        <div class="row">
          <div class="col-md-6">
            <div class="about-post">
            <a href="<?php echo site_url("home/visimisi") ?>" class="border_radius"><img src="<?php echo base_url();?>assets/images/hands.png" alt="hands"></a>
            <h4>Visi Misi</h4>
            <p>Baca Selengkapnya</p>
            </div>
            <div class="about-post">
            <a href="<?php echo site_url("home/sambutan_direktur") ?>" class="border_radius"><img src="<?php echo base_url();?>assets/images/awesome.png" alt="hands"></a>
            <h4>Sambutan Direktur</h4>
            <p>Baca Selengkapnya</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="about-post">
            <a href="<?php echo site_url ("home/struktur_organisasi") ?>" class="border_radius"><img src="<?php echo base_url();?>assets/images/maintenance.png" alt="hands"></a>
            <h4>Struktur Organisasi</h4>
          <p>Baca Selengkapnya</p>
            </div>
            <div class="about-post">
            <a href="<?php echo site_url("home/dosen") ?>" class="border_radius"><img src="<?php echo base_url();?>assets/images/home.png" alt="hands"></a>
            <h4>Pengajar Kami</h4>
            <p>Baca Selengkapnya</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 col-sm-6 wow fadeInRight" data-wow-delay="300ms">
         <img src="<?php echo base_url();?>assets/images/bg-1.jpg" alt="our priorties" class="img-responsive" style="width:100%;">
      </div>
    </div>
  </div>
</section>
<!--ABout US-->


<!-- Courses -->

<!-- News-->
<section id="news" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 wow fadeInDown">
       <h2 class="heading heading_space">Berita Terbaru <span class="divider-left"></span></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="slider_wrapper">
          <div id="news_slider" class="owl-carousel">
            <?php foreach ($allpost as $p): ?>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="<?php echo base_url();?>uploads/artikel/<?php echo $p['gambar']; ?>" alt="Edua" class="border_radius"  width="352" height="234">
                </div>
                <div class="news_box border_radius">
                  <h4><a href="<?php echo site_url("home/postdetail/$p[url]") ?>"><?php echo $p['judul']; ?></a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="fa fa-calendar"></i><?php echo $p['tanggal']; ?></a></li>
                    <li><a href="#."><i class="fa fa-user"></i> <?php echo $p['author']; ?></a></li>
                  </ul>
                  <p><?php echo word_limiter($p['isi'], 10)?>
                  <a href="<?php echo site_url("home/postdetail/$p[url]") ?>" class="readmore">Read More</a></p>
                </div>
              </div>
            </div>
              <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
