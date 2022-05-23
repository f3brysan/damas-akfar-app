<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <h1>Pengumuman dan Berita</h1>
        <div class="page_nav">
      <span>You are here:</span> <a href="<?php echo base_url(); ?>">Home</a> <span><i class="fa fa-angle-double-right"></i>Pengumuman dan Berita</span>
      </div>
      </div>
    </div>
  </div>
</section>



<!--BLOG SECTION-->
<section id="blog" class="padding">
  <div class="container">
    <h2 class="hidden">Our Blog</h2>
    <div class="row">
      <div class="col-md-12">
        <?php foreach ($allpost as $p): ?>
        <article class="blog_item heading_space wow fadeInLeft" data-wow-delay="300ms">
          <div class="row">
            <div class="col-md-5 col-sm-5 heading_space">
              <div class="image"><img src="<?php echo base_url();?>uploads/artikel/<?php echo $p['gambar']; ?>" alt="blog" class="border_radius"></div>
            </div>
            <div class="col-md-7 col-sm-7 heading_space">
              <a href="<?php echo site_url("home/postdetail/$p[url]") ?>"><h3><?php echo $p['judul'] ?></h3></a>
              <ul class="comment margin10">
                <li><a ><?php echo $p['tanggal'] ?></a></li>
                <li><a ><i class="icon-user"></i> <?php echo $p['author'] ?></a></li>
              </ul>
              <p class="margin10"><?php echo word_limiter($p['isi'], 35)?>
              </p>
              <a class=" btn_common btn_border margin10 border_radius" href="<?php echo site_url("home/postdetail/$p[url]") ?>"> Baca Lengkap</a>
            </div>
          </div>
        </article>
                      <?php endforeach; ?>
        <div class="pager_nav wow fadeIn" data-wow-delay="600ms">
          <ul class="pagination">
              <?php echo $page; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--BLOG SECTION-->
