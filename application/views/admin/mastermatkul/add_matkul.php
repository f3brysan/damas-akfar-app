
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title text-center">Tambah Mata Kuliah</h4>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <div class="box-body">
                                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group has-feedback">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">No Mata Kuliah</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="kode">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Nama Mata Kuliah</label>
                                                        <div class="col-10">
                                                            <input type="text" id="namalengkap" name="nama" class="form-control" placeholder="Contoh : Farmasi" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">SKS</label>
                                                        <div class="col-2">
                                                            <input type="number" id="nik" name="sks" class="form-control" placeholder="Contoh : 2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Semester</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="semester">                                                              
                                                                <option value=""> - </option>
                                                                <option value="1">Semester 1 </option>
                                                                <option value="2">Semester 2 </option> 
                                                                <option value="3">Semester 3 </option>
                                                                <option value="4">Semester 4 </option>
                                                                <option value="5">Semester 5 </option>
                                                                <option value="6">Semester 6 </option>                       
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Dosen</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="nidn">
                                                            <option value="">- - - Silahkan Dipilih - - - </option>
                                                              <?php foreach ($dosen as $d): ?>
                                                                <option value="<?php echo $d['nidn'] ?>"><?php echo $d['nidn'] ?> - <?php echo $d['gelardepan'] ?> <?php echo $d['nama'] ?>, <?php echo $d['gelarbelakang'] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                          <div class="col col-xs-12 text-right">
                                                  <a class="btn btn-warning" href="<?php echo site_url("admin/data_matkul");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Add">
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
