<!--Page Header-->
<?php foreach ($profil as $p): ?>


<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <h1><?php echo $p->nama; ?></h1>
        <p><?php echo $p->nama; ?>  Akademi Farmasi Surabaya</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="<?php echo site_url('home') ?>">Beranda</a> <span><i class="fa fa-angle-double-right"></i><?php echo $p->nama; ?></span>
      </div>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->


<!--ABout US-->
<section id="about" class="padding">
  <div class="container aboutus">
    <div class="row">
      <div class="col-md-12 wow fadeInLeft" data-wow-delay="300ms">
       <h2 class="heading heading_space"><?php echo $p->nama; ?> <span class="divider-left"></span></h2>
       <?php echo $p->isi; ?>
      </div>
    </div>
  </div>
</section>
<!--ABout US-->
<?php endforeach; ?>
