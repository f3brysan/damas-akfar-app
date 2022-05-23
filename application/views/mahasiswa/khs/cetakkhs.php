<style>
div.a {
	text-align: center;
}
div.b {
	text-align: left;
}
div.c {
	text-align: right;
}
div.d {
	text-align: justify;
}
</style>
<style>
td.a {font-size: 12px;color: black;}
table.b {font-size: 14px;color: black;}
p.b {font-size: 14px;color: black;}
table.c {font-size: 13px;color: black;}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card-box table-responsive">
					<table width="100%" border="0">
						<tr>
							<td width="100%" align="center"><img src="assets/images/kop.png" alt="" width="680px""></td>
						</tr>
					</table>
					<div class="row">
						<div class="col-4 offset-4">
							<div class="col-md-4-2">
								<h4 align="center">KARTU HASIL STUDI (KHS)</h4>
								<p class="b" align="center"> Semester <?php echo $tahunajaran->semester; ?> Tahun Ajaran <?php echo $tahunajaran->tahunajaran ?></p>
							</div>
						</div><!-- end col -->
						<div class="col-md-6 offset-2">
							<table width="100%" border="0" class="b">
								<tr>
									<td width="9%">NIM</td>
									<td width="0%">:</td>
									<td width="45%"><?php echo $username ?></td>
									<td width="1%">&nbsp;</td>
									<td width="17%">Program Studi</td>
									<td width="0%">:</td>
									<td width="45%">D3 Farmasi</td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $mhs->namalengkap ?></td>
									<td>&nbsp;</td>
									<td>NIDN Dosen</td>
									<td>:</td>
									<td><?php if (count($dosenwalimhs) > 0): ?>
									<?php foreach ($dosenwalimhs as $dw): ?>
										<?php echo $dw['nidn'] ?>
									<?php endforeach?>
									<?php else: ?>
										<?php echo "-" ?>
									<?php endif?>
								</td>
							</tr>
							<tr>
								<td>Angkatan</td>
								<td>:</td>
								<td><?php echo $nav->angkatan; ?></td>
								<td>&nbsp;</td>
								<td>DPA</td>
								<td>:</td>
								<td><?php if (count($dosenwalimhs) > 0): ?>
								<?php foreach ($dosenwalimhs as $dw): ?>
									<?php if ($dw['depan'] == NULL): ?>
										<?php else: ?>
											<?php echo $dw['nama'] ?>.
										<?php endif?><?php echo $dw['nama'] ?>, <?php echo $dw['belakang'] ?>
									<?php endforeach?>
									<?php else: ?>
										<?php echo "-" ?>
										<?php endif?>    	</td>
									</tr>
								</table>
							</div>
							<hr>
							<!-- end row -->
							<div class="col-md-12">
								<table width="100%" border="1" class="c">
									<thead>
										<tr>
											<th  width="3%" align="center">No</th>
											<th>Kode Mata Kuliah </th>
											<th>Nama Mata Kuliah</th>
											<th width="5%">Nilai</th>
											<th width="5%">SKS</th>
											<th width="5%">Bobot</th>
											<th width="5%">K x B</th>
										</tr>
									</thead>
									<tbody>
										<?php if (count($khs) > 0): ?>
											<?php $no = 1;
											foreach ($khs as $pk): ?>
												<tr>
													<td align="right"><?php echo $no++; ?></td>
													<td><?php echo $pk['kodematkul'] ?></td>
													<td width="60%"><?php echo $pk['nama'] ?></td>
													<td align="center"><?php if ($pk['nilai']>=$pk['nilai_remed']): ?>						
													<?php 
													$nilai = $pk['nilai'];
													if ($nilai == "") {
														echo "NA";
													} elseif ($nilai <= '39.99') {
														echo "E";
													} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
														echo "D";
													} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
														echo "C";
													} elseif ($nilai >= '66.00' && $nilai <= '75.99') {
														echo "B";
													} else {
														echo "A";
													}?>
													<?php else: ?>
														<?php
														$nilai = $pk['nilai_remed'];
														if ($nilai == "") {
															echo "NA";
														} elseif ($nilai <= '39.99') {
															echo "E";
														} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
															echo "D";
														} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
															echo "C";
														}  else {
															echo "B";
														}?>
													<?php endif ?>
												</td>
												<td align="center"><?php echo $pk['sks'] ?></td>
												<td align="center">
													<?php if ($pk['nilai']>=$pk['nilai_remed']): ?>										
														<?php
														$e = '0.00';
														$d = '1.00';
														$c = '2.00';
														$b = '3.00';
														$a = '4.00';
														$nilai = $pk['nilai'];
														if ($nilai <= '39.99') {
															$hasile = number_format($e, 2);
															echo $hasile;
														} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
															$hasild = number_format($d, 2);
															echo $hasild;
														} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
															$hasilc = number_format($c, 2);
															echo $hasilc;
														} elseif ($nilai >= '66.00' && $nilai <= '75.99') {
															$hasilb = number_format($b, 2);
															echo $hasilb;
														} else {
															echo number_format($a, 2);
														}?>
														<?php else: ?>
															<?php
															$e = '0.00';
															$d = '1.00';
															$c = '2.00';
															$b = '3.00';
															$a = '4.00';
															$nilai = $pk['nilai_remed'];
															if ($nilai <= '39.99') {
																$hasile = number_format($e, 2);
																echo $hasile;
															} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
																$hasild = number_format($d, 2);
																echo $hasild;
															} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
																$hasilc = number_format($c, 2);
																echo $hasilc;
															} else {
																echo number_format($b, 2);
															}?>
														<?php endif ?>
													</td>
													<td align="center">
														<?php if ($pk['nilai']>=$pk['nilai_remed']): ?>
															
															
															<?php
															$e = '0.00';
															$d = '1.00';
															$c = '2.00';
															$b = '3.00';
															$a = '4.00';
															$nilai = $pk['nilai'];
															if ($nilai <= '39.99') {
																$hasile = number_format($pk['sks'] * $e, 2);
																echo $hasile;
															} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
																$hasild = number_format($pk['sks'] * $d, 2);
																echo $hasild;
															} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
																$hasilc = number_format($pk['sks'] * $c, 2);
																echo $hasilc;
															} elseif ($nilai >= '66.00' && $nilai <= '75.99') {
																$hasilb = number_format($pk['sks'] * $b, 2);
																echo $hasilb;
															} else {
																echo number_format($pk['sks'] * $a, 2);
															}?>
															<?php else: ?>
																<?php
																$e = '0.00';
																$d = '1.00';
																$c = '2.00';
																$b = '3.00';
																$nilai = $pk['nilai_remed'];
																if ($nilai <= '39.99') {
																	$hasile = number_format($pk['sks'] * $e, 2);
																	echo $hasile;
																} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
																	$hasild = number_format($pk['sks'] * $d, 2);
																	echo $hasild;
																} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
																	$hasilc = number_format($pk['sks'] * $c, 2);
																	echo $hasilc;
																}  else {
																	echo number_format($pk['sks'] * $b, 2);
																}?>
															<?php endif ?>
														</td>

													</tr>
												<?php endforeach;?>
												<tr>
													<td colspan="4" align="center">INDEKS PRESTASI SEMESTER</td>
													<td colspan="3" align="center"><?php foreach ($ips as $ips): ?>
													<?php echo number_format($ips['bobot'] / $ips['totalsks'], 2) ?>
												<?php endforeach?>
											</td>
										</tr>
										<tr><?php foreach ($ipk as $ipk): ?>
										<td colspan="4" align="center">INDEKS PRESTASI KUMULATIF</td>
										<td colspan="3" align="center">
											<?php echo number_format($ipk['bobot'] / $ipk['totalsks'], 2) ?>

										</td>
									</tr>
								</tr>
								<tr>
									<td colspan="4" align="center">SKS Kumulatif </td>
									<td colspan="3" align="center">
										<?php echo number_format($ipk['totalsks']) ?> SKS</td>	<?php endforeach?>
									</tr>

								</tbody>
								<?php else: ?>
									-
								<?php endif?>
							</table>
						</div>
					</div>


				</div>

				<!-- end row -->
			</div> <!-- container -->
		</div> <!-- content -->
