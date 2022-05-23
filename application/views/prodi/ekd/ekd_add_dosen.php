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
                        <input type="text" class="form-control" value="<?php echo $selected_kode_ekd; ?>" name="rel_kode_ekd" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Dosen</label>
                        <select class="form-control js-example-basic-single" name="rel_nidn">
                          <option value="">- - - Silahkan Dipilih - - - </option>
                          <?php foreach ($dosen as $d): ?>
                          <option value="<?php echo $d['nidn'] ?>"><?php echo $d['nidn'] ?> - <?php echo $d['gelardepan'] ?> <?php echo $d['nama'] ?>, <?php echo $d['gelarbelakang'] ?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Kode Matkul</label>
                        <input type="text" class="form-control" value="<?php echo $selected_kodematkul; ?>" name="rel_matkul" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Kelas</label>
                        <input type="text" class="form-control" value="<?php echo $selected_kelas; ?>" name="rel_kelas" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <div class="col col-xs-12 text-right">
                      <a class="btn btn-warning" href="<?php echo site_url("prodi/dosen_ekd/$selected_kode_ekd/$selected_kodematkul/$selected_kelas"); ?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Tambah">
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