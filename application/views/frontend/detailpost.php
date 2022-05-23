<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <h1>Pengumuman & Berita</h1>
        <div class="page_nav">
      <span>You are here:</span> <a href="<?php echo site_url('home') ?>">Home</a> <span><i class="fa fa-angle-double-right">   <?php echo $post->judul ?></i></span>
      </div>
      </div>
    </div>
  </div>
</section>



<!--BLOG SECTION-->
<section id="blog" class="padding-bottom-half padding-top">
 <h3 class="hidden">hidden</h3>
 <div class="container">
     <div class="row">
      <div class="col-md-9 col-sm-8 wow fadeIn" data-wow-delay="400ms">
        <article class="blog_item padding-bottom-half heading_space">
          <div class="image bottom25">
            <img class="img-responsive"  width="822" height="370" src="<?php echo base_url("uploads/artikel/$post->gambar");?>" alt="blog">
          </div>
          <h3><?php echo $post->judul ?></h3>
          <ul class="comment margin10">
            <li><a><i class="fa fa-calendar"></i> <?php echo $post->tanggal ?></a></li>
            <li><a href="#."><i class="fa fa-user"></i> <?php echo $post->author ?></a></li>
          </ul>
          <p class="margin10"><?php echo $post->isi ?></p>
        </article>
      </div>
      <div class="col-md-3 col-sm-4 wow fadeIn" data-wow-delay="400ms">
        <aside class="sidebar bg_grey border-radius">
          <div class="widget heading_space">
            <h3 class="bottom20">Berita Terbaru</h3>
              <?php foreach ($otherpost as $op): ?>
            <div class="media">
              <a class="media-left" href="<?php echo site_url("home/postdetail/$op[id]") ?>"><img width="69" height="65" src="<?php echo base_url();?>uploads/artikel/<?php echo $op['gambar'];?>" alt="post"></a>
              <div class="media-body">
                <h5 class="bottom5"> <a href="<?php echo site_url("home/postdetail/$op[url]")?>"><?php echo $op['judul']; ?></a></h5>
                <span class="name"><?php echo $post->author; ?></span>
              </div>
            </div>
              <?php endforeach; ?>
          </div>
        </aside>
      </div>
    </div>
  </div>
</section>
