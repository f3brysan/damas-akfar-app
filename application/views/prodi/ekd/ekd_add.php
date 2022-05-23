<!-- Start Page content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card-box">
          <h4 class="m-t-0 header-title text-center">Tambah Master EKD</h4>
          <div class="row">
            <div class="col-12">
              <div class="p-20">
                <div class="box-body">
                  <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group has-feedback">
                      <div class="form-group">
                        <label for="exampleInputFile">Kode EKD</label>
                        <input type="text" class="form-control"  placeholder="EKD . . ." name="kode_ekd">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Tahun Ajaran</label>
                        <select class="form-control" name="rel_tahunajaran">
                          <option value=""> Pilih Semester</option>
                          <?php foreach ($tahunajaran as $t): ?>
                          <option value="<?php echo $t['kode'] ?>"><?php echo $t['semester'] ?> <?php echo $t['tahunajaran'] ?> (<?php echo $t['jenis'] ?>)</option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <div class="col col-xs-12 text-right">
                      <a class="btn btn-warning" href="<?php echo site_url("prodi/ekd");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Tambah">
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
            <!-- end row -->
            </div> <!-- end card-box -->
            </div><!-- end col -->
          </div>
          <!-- end row -->
          </div> <!-- container -->
          </div> <!-- content -->