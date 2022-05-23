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
                        <label for="exampleInputFile">Soal EKD</label>
                        <input type="text" class="form-control"  placeholder=" " name="soal">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Tipe Soal</label>
                        <select class="form-control" name="type">
                          <option value=""> Pilih Jenis</option>  
                          <option value="dosen"> Dosen</option>  
                          <option value="laboran"> Laboran</option>  
                          <option value="perpus"> Pustakawan</option>                                                    
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <div class="col col-xs-12 text-right">
                      <a class="btn btn-warning" href="<?php echo site_url("prodi/soal_ekd");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Tambah">
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