
<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title text-center">Tambah Dosen PJMK</h4>

                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <div class="box-body">
                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                <?php foreach ($select as $s): ?>
                                  <div class="form-group has-feedback">                                              
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="example-email">Kode Matkul</label>
                                        <div class="col-2">
                                            <input type="text" id="nik" name="kode" class="form-control" value="<?php echo $s['kode'] ?>" readonly>
                                        </div>
                                        <div class="col-6"><?php foreach ($get as $g): ?>        
                                            <input type="text" id="nik" name="" class="form-control" value="<?php echo $g['nama'] ?>" readonly>
                                                  <?php endforeach ?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="example-email">Kode Tahun Ajaran</label>
                                        <div class="col-2">
                                            <input type="text" id="nik" name="tahunajaran" class="form-control" value="<?php echo $s['tahunajaran'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Dosen</label>
                                        <div class="col-10">
                                            <select class="form-control js-example-basic-single" name="nidn">
                                                <option value="<?php echo $s['nidn'] ?>"> <?php echo $s['gelardepan'] ?> <?php echo $s['nama'] ?> <?php echo $s['gelarbelakang'] ?></option>
                                                <?php foreach ($dosen as $d): ?>
                                                    <option value="<?php echo $d['nidn'] ?>"><?php echo $d['nidn'] ?> - <?php echo $d['gelardepan'] ?> <?php echo $d['nama'] ?>, <?php echo $d['gelarbelakang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">PJMK</label>
                                        <div class="custom-control custom-checkbox">
                                          <?php if ($s['koor']==1): ?>
                                            <input type="hidden" name="koor" value="0" class="custom-control-input">
                                                    <input type="checkbox" name="koor" value="1" class="custom-control-input" id="customCheck1" checked>
                                                    <?php else: ?>
                                                      <input type="hidden" name="koor" value="0" class="custom-control-input">
                                                    <input type="checkbox" name="koor" value="1" class="custom-control-input" id="customCheck1">
                                          <?php endif ?>                                                    
                                                    <label class="custom-control-label" for="customCheck1">Koor PJMK</label>
                                                </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Reguler</label>
                                        <div class="col-10">
                                            <select class="form-control" name="reguler">
                                                <option value="<?php echo $s['reguler'] ?>"> Reguler <?php echo $s['reguler'] ?></option>
                                                <option value="A"> Reguler A</option>
                                                <option value="B"> Reguler B</option>
                                            </select>
                                        </div>
                                    </div>                                                                                        
                                </div>
                                <?php endforeach ?>
                            </div>
                            <div class="box-footer">
                              <div class="col col-xs-12 text-right">
                                  <a class="btn btn-warning" href="<?php echo site_url("admin/pjmkbymatkul");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Edit">
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
