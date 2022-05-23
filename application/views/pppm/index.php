<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row text-center">
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box widget-flat border-custom bg-custom text-white">
                                    <i class="fi-check"></i>
                                    <?php if (array($count) && count($count)>0): ?>
                                    <?php foreach ($count as $c): ?>
                                    <h3 class="m-b-10"><?php echo $c['done'] ?>/<?php echo $c['total'] ?></h3> 
                                    <?php endforeach ?>
                                    <?php endif ?>
                                   <a href="<?php echo site_url('prodi/nilai_semester') ?>" class="btn btn-custom"><p class="text-uppercase m-b-5 font-13 font-600">Nilai Terisi</p></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card-box bg-primary widget-flat border-primary text-white">
                                    <i class="fi-head"></i>
                                    <h3 class="m-b-10">6952</h3>
                                    <a href="" class="btn btn-primary"><p class="text-uppercase m-b-5 font-13 font-600">Mahasiswa KRS</p></a>
                                </div>
                            </div>                                                       
                        </div>

	</div> <!-- container -->
</div> <!-- content -->
		<!-- Start Page content -->