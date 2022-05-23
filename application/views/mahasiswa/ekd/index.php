<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<?php $total_ekd = $ekd['0']['total'] + $ekd['1']['total'] +  $ekd['2']['total']; ?>
					<?php $total_terisi = $ekd['0']['filled'] + $ekd['1']['filled'] +  $ekd['2']['filled']; ?>					
					<h4 class="header-title mb-4">Koresponden Evaluasi Kinerja Dosen</h4>
					<div class="row">
						<?php foreach ($ekd as $ekd): ?>
						<div class="col-sm-6 col-lg-6 col-xl-4">
							<div class="card-box mb-0 widget-chart-two">
								<div class="float-right">
									<?php $data = number_format($ekd['filled'] / $ekd['total'] * 100, 2)?>
									<input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
									data-fgColor="#0acf97" value="<?php echo $data ?>" data-skin="tron" data-angleOffset="180"
									data-readOnly=true data-thickness=".1"/>
								</div>
								<div class="widget-chart-two-content">
									<h5><?php echo strtoupper($ekd['jenis_status']); ?></h5>
									<a href="<?php echo site_url("mahasiswa/survey_ekd/$ekd[jenis_status]/$ekd[nim]") ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-external-link"></i> Masuk</a>
								</div>
							</div>
						</div>
						<?php endforeach?>						
					</div>
					<!-- end row -->
				</div>
			</div>
		</div>
		<!-- end row -->
		</div> <!-- container -->
		</div> <!-- content -->