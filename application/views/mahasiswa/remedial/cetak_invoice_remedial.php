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
td.a {font-size: 10px;color: black;}
table.b {font-size: 10px;color: black;}
p.b {font-size: 10px;color: black;}
p.z {font-size: 16px;color: black;}
table.c {font-size: 10px;color: black;}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">

							<div style="position:absolute;top:0;right:0;font-size:10px"><em>Untuk Biro Keuangan</em></div>
							<p class="z" align="center">AKADEMI FARMASI SURABAYA</p>
							<p class="z" align="center">AKADEMI FARMASI SURABAYA</p>
							<p class="z" align="center">INVOICE REMEDIAL</p>
							<p class="b" align="center"> Semester <?php echo $getkoderemedial->semester; ?> Tahun Ajaran <?php echo $getkoderemedial->tahunajaran ?></p>								
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
						
						<!-- end row -->
						<div class="col-md-12">
							<table width="100%" border="1" class="c">
								<thead>
									<tr>
										<th  width="3%" align="center">No</th>
										<th>Kode Mata Kuliah </th>
										<th>Nama Mata Kuliah</th>										
										<th width="5%">SKS</th>
										<th width="12%">Biaya</th>
										<th width="18%">Total Biaya</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($pickedremedial) > 0): ?>
									<?php $no = 1;
foreach ($pickedremedial as $pk): ?>
									<tr>
										<td align="right"><?php echo $no++; ?></td>
										<td><?php echo $pk['kode'] ?></td>
										<td width="50%"><?php echo $pk['nama'] ?></td>										
										<td align="center"><?php echo $pk['sks'] ?></td>
										<td align="center">Rp 25.000</td>
											<td align="center">Rp 
												<?php 
												$biaya = $pk['sks']*25000;
												echo number_format($biaya,2,',','.'); ?> 
											</td>

									</tr>
									<?php endforeach;?>
									<tr>
										<td colspan="3" align="center"><b>TOTAL</b></td>
										<td colspan="2" align="center"><b><?php echo $sks ?> SKS</b>
										<td colspan="1" align="center"><b>Rp
											<?php 
												$totalbiaya = $sks*25000;
												echo number_format($totalbiaya,2,',','.'); ?> 	</b>									
										</td>								
									</tr>
								</tbody>
								<?php else: ?>
								-
								<?php endif?>
							</table>
					</div>
					<div class="row">
							<?php $date = date('Y-m-d')?>
							<p class="b" align="center"><?php echo tanggal($date) ?></p>
							<table width="100%" border="0" class="b" >
								<tr>
									<td align="center" width="33%"><strong>Mahasiswa</strong></td>
									<td width="33%">&nbsp;</td>
									<td align="center" width="33%"><strong>Bendahara Keuangan</strong></td>
								</tr>
								<tr>
									<td height="10px">&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td align="center"><?php echo $mhs->namalengkap ?></td>
									<td>&nbsp;</td>
									<td align="center">(____________________)</td>
								</tr>
								<tr>
									<td align="center">NIM. <?php echo $username ?></td>
									<td>&nbsp;</td>
									<td align="center">(____________________)</td>
								</tr>
							</table>
						</div>				
			</div>

				<!-- end row -->
				</div> <!-- container -->
				</div> <!-- content -->
			<hr style="border-top: dotted 1px;" />


				<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">				
<!-- <div style="position:absolute;bottom:0%;right:0;font-size:10px"><em>Untuk Mahasiswa</em></div> -->
				<p class="z" align="center">AKADEMI FARMASI SURABAYA</p>									
					<p class="z" align="center">INVOICE REMEDIAL</p>
							<p class="b" align="center"> Semester <?php echo $getkoderemedial->semester; ?> Tahun Ajaran <?php echo $getkoderemedial->tahunajaran ?></p>																
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
						<!-- end row -->
						<div class="col-md-12">
							<table width="100%" border="1" class="c">
								<thead>
									<tr>
										<th  width="3%" align="center">No</th>
										<th>Kode Mata Kuliah </th>
										<th>Nama Mata Kuliah</th>										
										<th width="5%">SKS</th>
										<th width="12%">Biaya</th>
										<th width="18%">Total Biaya</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($pickedremedial) > 0): ?>
									<?php $no = 1;
foreach ($pickedremedial as $pk): ?>
									<tr>
										<td align="right"><?php echo $no++; ?></td>
										<td><?php echo $pk['kode'] ?></td>
										<td width="50%"><?php echo $pk['nama'] ?></td>										
										<td align="center"><?php echo $pk['sks'] ?></td>
										<td align="center">Rp 25.000</td>
											<td align="center">Rp 
												<?php 
												$biaya = $pk['sks']*25000;
												echo number_format($biaya,2,',','.'); ?> 
											</td>

									</tr>
									<?php endforeach;?>
									<tr>
										<td colspan="3" align="center"><b>TOTAL</b></td>
										<td colspan="2" align="center"><b><?php echo $sks ?> SKS</b>
										<td colspan="1" align="center"><b>Rp
											<?php 
												$totalbiaya = $sks*25000;
												echo number_format($totalbiaya,2,',','.'); ?> 	</b>									
										</td>								
									</tr>
								</tbody>
								<?php else: ?>
								-
								<?php endif?>
							</table>
					</div>
					<div class="row">
							<?php $date = date('Y-m-d')?>
							<p class="b" align="center"><?php echo tanggal($date) ?></p>
							<table width="100%" border="0" class="b" >
								<tr>
									<td align="center" width="33%"><strong>Mahasiswa</strong></td>
									<td width="33%">&nbsp;</td>
									<td align="center" width="33%"><strong>Bendahara Keuangan</strong></td>
								</tr>
								<tr>
									<td height="10px">&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td align="center"><?php echo $mhs->namalengkap ?></td>
									<td>&nbsp;</td>
									<td align="center">(____________________)</td>
								</tr>
								<tr>
									<td align="center">NIM. <?php echo $username ?></td>
									<td>&nbsp;</td>
									<td align="center">(____________________)</td>
								</tr>
							</table>
						</div>
				</div>


			</div>

				<!-- end row -->
				</div> <!-- container -->
				</div> <!-- content -->
