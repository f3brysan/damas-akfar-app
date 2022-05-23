<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <h1>Dosen</h1>
        <p>Daftar Dosen Akademi Farmasi Surabaya</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="<?php echo site_url('home') ?>">Home</a> <span><i class="fa fa-angle-double-right"></i>Dosen</span>
      </div>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->



<!-- Teachers -->
<section id="teachers" class="padding-bottom">
  <div class="container">
    <div class="row">
      <?php foreach ($alldosen as $a):
//dump($a);
        ?>


      <div class="col-sm-6 col-md-4">
        <div class="teacher margin_top wow fadeIn" data-wow-delay="300ms">
          <div class="image bottom25">
            <img class="img-responsive"  width="358" height="264" src="<?php echo base_url("uploads/dosen/$a[picture]");?>" alt="Teachers" class=" border_radius">
            <span class="post"> <?php echo $a['jenis_dosen'] ?></span>
          </div>
          <h3><?php echo $a['nama'] ?></h3>
          <p class="bottom10 margin10">NIDN : <?php echo $a['nidn'] ?></p>
          <p class="bottom10 margin10">Matakuliah : <?php echo $a['jenis_dosen'] ?></p>
          <p class="bottom20 margin10">Email : <?php echo $a['email'] ?></p>
          <ul class="social_icon black bottom5">
            <li><a href="#."> <i class="fa fa-eye"></i></a></li>
            <li><a href="#." class="twitter"><i class="icon-twitter4"></i></a></li>
            <li><a href="#." class="dribble"><i class="icon-dribbble5"></i></a></li>
          </ul>
        </div>
      </div>
        <?php endforeach; ?>


    </div>
  </div>
</section>
<!-- Teachers -->
