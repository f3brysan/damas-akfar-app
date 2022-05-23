<!-- Start Page content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php if ($this->session->flashdata('success_message') == true): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $this->session->flashdata('success_message'); ?>
        </div>
        <?php elseif ($this->session->flashdata('failed_message') == true): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $this->session->flashdata('failed_message'); ?>
        </div>
        <?php endif?>
        <div class="card-box">
          <h4 class="header-title m-t-0"> File Upload</h4>
          <?php foreach ($get as $g): ?>
          <?php if ($g['upload_kti'] == null): ?>
          <p>Anda Belum Mengunggah Bukti Bebas Artikel KTI.</p>
          <?php else: ?>
          <p>Nama Berkas : <?php echo $g['upload_kti'] ?></p> <a href="<?php echo base_url(); ?>uploads/yudisium/<?php echo $g['upload_kti'] ?>" target="_blank"><span class="badge badge-success"><em class="fa fa-eye"></em> Lihat Berkas</span></a>
          <?php endif?>
          <?php endforeach?>
          <div class="text-right">
            <a class="btn btn-link" href="<?php echo site_url("mahasiswa/yudisium"); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <form role="form" action="" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data">
            <div class="fallback">
              <input name="file" type="file" id="img" accept="image/*"  multiple />
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