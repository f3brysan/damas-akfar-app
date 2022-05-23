
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
                                                <?php foreach ($getmatkul as $gm): ?>
                                                    
                                                
                                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group has-feedback">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">No Mata Kuliah</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" name="kode" value="<?php echo $gm['kode'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Nama Mata Kuliah</label>
                                                        <div class="col-10">
                                                            <input type="text" id="namalengkap" name="nama" class="form-control" value="<?php echo $gm['nama'] ?>" placeholder="Contoh : Farmasi" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">SKS</label>
                                                        <div class="col-2">
                                                            <input type="number" id="nik" name="sks" class="form-control" value="<?php echo $gm['sks'] ?>" placeholder="Contoh : 2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Semester</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="semester"> 
                                                            <option value="<?php echo $gm['semester'] ?>"> Semester <?php echo $gm['semester'] ?> </option>
                                                            <?php if ($gm['semester'] == '1'): ?>
                                                                <option value="2">Semester 2 </option> 
                                                                <option value="3">Semester 3 </option>
                                                                <option value="4">Semester 4 </option>
                                                                <option value="5">Semester 5 </option>
                                                                <option value="6">Semester 6 </option>  
                                                            <?php elseif ($gm['semester'] == '2'): ?>
                                                                <option value="1">Semester 1 </option>                                                                
                                                                <option value="3">Semester 3 </option>
                                                                <option value="4">Semester 4 </option>
                                                                <option value="5">Semester 5 </option>
                                                                <option value="6">Semester 6 </option>
                                                            <?php elseif ($gm['semester'] == '3'): ?>
                                                                <option value="1">Semester 1 </option>
                                                                <option value="2">Semester 2 </option>                                                                 
                                                                <option value="4">Semester 4 </option>
                                                                <option value="5">Semester 5 </option>
                                                                <option value="6">Semester 6 </option>
                                                            <?php elseif ($gm['semester'] == '4'): ?>
                                                                <option value="1">Semester 1 </option>
                                                                <option value="2">Semester 2 </option> 
                                                                <option value="3">Semester 3 </option>                                                                
                                                                <option value="5">Semester 5 </option>
                                                                <option value="6">Semester 6 </option>
                                                            <?php elseif ($gm['semester'] == '5'): ?>
                                                                <option value="1">Semester 1 </option>
                                                                <option value="2">Semester 2 </option> 
                                                                <option value="3">Semester 3 </option>
                                                                <option value="4">Semester 4 </option>                                                                
                                                                <option value="6">Semester 6 </option>
                                                            <?php else: ?>
                                                                <option value="1">Semester 1 </option>
                                                                <option value="2">Semester 2 </option> 
                                                                <option value="3">Semester 3 </option>
                                                                <option value="4">Semester 4 </option>
                                                                <option value="5">Semester 5 </option>                                                                                                                                                                                           
                                                                                                                         <?php endif ?>                                                                                                                                                                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Dosen</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="nidn">
                                                            <option value="<?php echo $gm['nidn'] ?>"><?php echo $gm['nidn'] ?> - <?php echo $gm['depan'] ?> <?php echo $gm['dosen'] ?>, <?php echo $gm['belakang'] ?></option>
                                                              <?php foreach ($dosen as $d): ?>
                                                                <option value="<?php echo $d['nidn'] ?>"><?php echo $d['nidn'] ?> - <?php echo $d['depan'] ?> <?php echo $d['nama'] ?>, <?php echo $d['belakang'] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                          <div class="col col-xs-12 text-right">
                                                  <a class="btn btn-warning" href="<?php echo site_url("admin/data_matkul");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Edit">
                                              </div>
                                        </div> 
                                        <?php endforeach ?>
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
