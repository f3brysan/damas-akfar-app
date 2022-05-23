
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                      <div class="row">
                            <div class="col-12">
                              <div class="alert alert-info alert-dismissible fade show" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          Silahkan pilih sesuai <strong>Jenis Data</strong> yang Anda akan inputkan. Untuk jenis data <strong>Seminar dan Pelatihan</strong> hanya isi tanggal selesai saja.
                                      </div>
                                    <div class="col-md-12">
                                      <div class="col col-xs-12 text-right">
                                            <a class="btn btn-primary" href="<?php echo site_url('mahasiswa/cetakSKPI') ?>" role="button" target='new'>Cetak</a>
                                          </div>
                                          <br>
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Input Data</h4>
                                    <div class="box-body">
                                    <form action="" method="post" enctype="multipart/form-data" role="form">
                                      <div class="form-group row">
                                                      <label class="col-2 col-form-label">Upload Scan Sertifikat</label>
                                                      <img src="<?php echo base_url() ?>uploads/sertifikasi/<?php echo $getsertifikasi->gambar ?>"
                                                      class="img-responsive" style="padding-bottom:10px;">
                                                      <div class="col-8">
                                                          <input type="file" class="form-control" name="file">
                                                      </div>
                                                      <div class="col-md-4" style="padding-left:0px;">
                                                        <input type="submit" name="sbmt1" class="btn btn-primary" value="Upload">
                                                      </div>
                                                  </div>
                                      <div class="form-group has-feedback">
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="example-email">NIM</label>
                                            <div class="col-10">
                                                <input type="text" id="nim" name="nim" class="form-control" value="<?php echo $nav->nim ?>" disabled>
                                            </div>
                                          </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Jenis</label>
                                            <div class="col-10">
                                                <select class="form-control" name="jenis">
                                                    <option value="Seminar">Seminar</option>
                                                    <option value="Pelatihan">Pelatihan</option>
                                                    <option value="Organisasi">Organisasi</option>
                                                    <option value="PKL">PKL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="example-email">Nama Kegiatan</label>
                                            <div class="col-10">
                                                <input type="text" id="nik" name="nama" class="form-control" placeholder="Contoh : Seminar . . . ." >
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-2 col-form-label" for="example-email">Sebagai</label>
                                              <div class="col-10">
                                                  <input type="text" id="nik" name="sebagai" class="form-control" placeholder="Contoh : Peserta" >
                                              </div>
                                            </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="example-email">Tanggal Mulai</label>
                                            <div class="col-4">
                                                <input type="date" id="datetimepicker"  name="mulai" class="form-control" >
                                            </div><label class="col-2 col-form-label" for="example-email">Tanggal Selesai</label>
                                            <div class="col-4">
                                                <input type="date" id="datepicker" name="selesai" class="form-control"  >
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                    <div class="box-footer">
                                      <div class="col col-xs-12 text-right">
                                              <input type="submit" name="sbmt" class="btn btn-primary" value="Simpan">
                                          </div>
                                    </div>
                                          <?php echo form_close(); ?>
                                </div>
                            </div> <!-- end col -->
                            </div>

                        </div> <!-- end row -->


                      </div> <!-- container -->
