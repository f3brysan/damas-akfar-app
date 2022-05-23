<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<?php if (is_array($check_matkul_picked) && count($check_matkul_picked) > 0): ?>
			<?php foreach ($check_matkul_picked as $list): ?>
			<?php if ($list['kodematkul'] == 'A606605317'): ?>
			<div class="col-md-4">
				<div class="card m-b-30 text-white bg-danger">
					<div class="card-body">
						<h5 class="card-title">Proposal Karya Tulis Ilmiah</h5>
						<p class="card-text">Masuk untuk layanan pengesahan Proposal Karya Tulis Ilmiah.</p>
						<a href="<?php echo site_url("mahasiswa/proposal_kti") ?>" class="btn btn-custom waves-effect waves-light">Masuk</a>
					</div>
				</div>
			</div>
			<?php else: ?>
			<div class="col-md-4">
				<div class="card m-b-30 text-white bg-primary">
					<div class="card-body">
						<h5 class="card-title">Karya Tulis Ilmiah</h5>
						<p class="card-text">Masuk untuk layanan pengesahan Karya Tulis Ilmiah.</p>
						<a href="<?php echo site_url("mahasiswa/kti") ?>" class="btn btn-custom waves-effect waves-light">Masuk</a>
					</div>
				</div>
			</div>
			<?php endif?>
			<?php endforeach?>
			<?php endif?>
			</div> <!-- container -->
		</div>
	</div>
	<!-- content -->