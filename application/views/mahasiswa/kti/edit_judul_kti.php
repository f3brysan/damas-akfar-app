<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="col-md-12">
					<div class="card-box">
						<form role="form" action="" method="post" enctype="multipart/form-data" >
							<?php foreach ($check_sign as $data): ?>
								
							
							<div class="form-group">
								<label for="validationDefault02">Judul Karya Tulis Ilmiah</label>
								<textarea class="form-control" name="judul" id='textarea' rows="8"><?php echo $data['judul'] ?></textarea>
							</div>
							<div class="form-group">
								<label for="validationDefault02">Sub Judul</label>
								<textarea class="form-control" name="sub_judul" id='textarea_subjudul' rows="8"><?php echo $data['sub_judul'] ?></textarea>
							</div>
							<input type="submit" name="edit" class="btn btn-block btn-primary" value="Perbarui" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
							<?php endforeach ?>
						</form>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		</div> <!-- container -->
		</div> <!-- content -->