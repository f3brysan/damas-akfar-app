<!-- Start Page content -->
<div class="content">
  <div class="container-fluid">    
    <div class="row">
      <div class="col-12">
        <?php if ($this->session->flashdata('success_message') == TRUE): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $this->session->flashdata('success_message');?>
        </div>
        <?php elseif ($this->session->flashdata('failed_message') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $this->session->flashdata('failed_message');?>
        </div>
        <?php endif ?>
        <div class="card-box">
          <h4 class="header-title m-t-0"> File Upload</h4>
          <?php foreach ($get as $g): ?>
          <?php if ($g['bukti_perpus'] == NULL): ?>
          <p>Anda Belum Mengunggah Bukti Bebas Perpustakaan.</p>
          <?php else: ?>          
          <p>Nama Berkas : <?php echo $g['bukti_perpus'] ?></p> <a href="<?php echo base_url(); ?>uploads/yudisium/<?php echo $g['bukti_perpus'] ?>" target="_blank"><span class="badge badge-success"><em class="fa fa-eye"></em> Lihat Berkas</span></a>
          <?php endif ?>
          <?php endforeach ?>
          <div class="text-right">
            <a class="btn btn-link" href="<?php echo site_url("mahasiswa/yudisium");?>"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <form role="form" action="" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data">
            <div class="fallback">
              <input name="file" type="file" accept="application/pdf" multiple />
            </div>
            <div class="modal-footer">
              <input type="submit" name="sbmt" class="btn btn-primary" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
    </div> <!-- container -->
    </div> <!-- content -->