<div class="content"> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<h4 class="header-title mb-4">Koresponden Evaluasi Kinerja Dosen (<?php echo $dosen_ekd['0']['nama_dosen'] ?>, <?php echo $dosen_ekd['0']['gelarbelakang'] ?> - <?php echo $dosen_ekd['0']['nama_matkul'] ?>)</h4>
					<div class="row">
						<div class="card-body">
							<form action="<?php echo base_url("mahasiswa/insert_ekd/$matkul/$nidn") ?>" method="post" enctype="multipart/form-data" role="form">
								<table class="table table-sm table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Soal Kuisioner</th>
											<th>Penilaian</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($soal as $s): ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $s['soal'] ?>
												<input type="text" class="form-control" value="<?php echo $s['id']; ?>" name="id_soal[]" hidden>
											</td>
											<td><?php foreach ($nilai as $n): ?>
											<div class="radio radio-info form-check-inline">
												<input type="radio" id="<?php echo $s['id']; ?>_<?php echo $n['id'] ?>" value="<?php echo $n['nilai'] ?>" name="nilai[<?php echo $s['id']; ?>]">
												<label for="<?php echo $s['id']; ?>_<?php echo $n['id'] ?>>"> <?php echo $n['keterangan'] ?> </label>
											</div>
											<?php endforeach ?></td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
								<div class="col col-xs-12 text-right">
									<input type="submit" name="sbmt" class="btn btn-primary" value=" Simpan" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
								</div>
							</form>
						</div>
					</div>
					<!-- end row -->
				</div>
			</div>
		</div>
		<!-- end row -->
		</div> <!-- container -->
		</div> <!-- content -->