<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<form role="form" action="" method="post" enctype="multipart/form-data">
						<?php if (is_array($submit) && count($submit) > 0): ?>
							<div class="card-body">
								<img class="image-responsive" src="<?php echo base_url() ?>uploads/wisuda/<?php echo $submit['0']['picture']; ?>" alt="<?php echo $submit['0']['picture']; ?>" width="180">
                  <hr>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Cover KTI</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto1" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                      
                    </div>
                  </div>                  
                  <div class="form-group">                   
                    <label for="validationDefault02">Judul KTI</label>
                 <textarea class="form-control" name="kti" id='textarea' rows="8"><?php echo $submit['0']['kti'] ?></textarea>
                  </div>                                    
                </div>
                <!-- /.card-body -->     
                <div class="card-footer">
                  <div class="col col-xs-12 text-right">
                                <a class="text-white btn btn-warning" href="<?php echo site_url("mahasiswa/wisuda");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="edit" class="btn btn-primary" value="Perbarui">
                              </div>
                </div>
              <?php echo form_close(); ?>           
							<?php else: ?>
								<div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Cover KTI</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto1" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                      
                    </div>
                  </div>                  
                  <div class="form-group">                   
                    <label for="validationDefault02">Judul KTI</label>
                 <textarea class="form-control" name="kti" id='textarea' rows="8"></textarea>
                  </div>                                    
                </div>
                <div class="card-footer">
                  <div class="col col-xs-12 text-right">
                                <a class="text-white btn btn-warning" href="<?php echo site_url("mahasiswa/wisuda");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                              </div>
                </div>
              <?php echo form_close(); ?>
					</div> <!-- end col -->
						<?php endif ?>                
                <!-- /.card-body -->
                
				</div>
			</div>
			</div> <!-- container -->
			</div> <!-- content --><!-- Start Page content -->
