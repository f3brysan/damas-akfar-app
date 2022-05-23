<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<h4 class="header-title m-t-0"> File Upload</h4>
					<div class="text-right">
						<a class="btn btn-link" href="<?php echo site_url("mahasiswa/yudisium");?>"><i class="fa fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="col-md-12">
						<img src="<?php echo base_url() ?>uploads/bebaskuliah/<?php echo $getmhs->bebaskuliah ?>"
                                        class="img-responsive" style="width:600px; padding-bottom:10px;">

                                      </div>
					<form role="form" action="" method="post" enctype="multipart/form-data">
						<div class="fallback">
							<input name="file" type="file" multiple />

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
