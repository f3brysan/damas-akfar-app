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
				<table width="100%" border="0">
					<tr>
						<td width="100%" align="center"><img src="assets/images/kop.png" alt="" width="680px""></td>
					</tr>
				</table>
				<div class="row">
					<div class="col-4 offset-4">
						<div class="col-md-4-2">
							<h4 align="center">KARTU RENCANA STUDI (KRS)</h4>
							<p class="b" align="center"> Semester <?php echo $tahunajaran->semester; ?> Tahun Ajaran <?php echo $tahunajaran->tahunajaran ?></p>
						</div>
						</div><!-- end col -->
						<div class="col-4 offset-2">
							<table width="100%" border="0" class="b">
								<tr>
									<td width="9%">NIM</td>
									<td width="0%">:</td>
									<td width="45%"><?php echo $mhs->nim ?></td>
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
									<td>Semester</td>
									<td>:</td>
									<td><?php if (count($semestermhs) > 0): ?>
										<?php foreach ($semestermhs as $sm): ?>
										<?php echo $sm['total'] ?>
										<?php endforeach?>
										<?php else: ?>
										<?php echo "-" ?>
									<?php endif?></td>
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
						<div class="row mt-3">
							<table width="100%" border="1" class="c">
								<thead>
									<tr>
										<th  width="3%">No</th>
										<th>Kode Mata Kuliah </th>
										<th>Nama Mata Kuliah</th>
										<th width="5%">SKS</th>
										<th width="10%">Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($pickedkrs) > 0): ?>
									<?php $no = 1;
foreach ($pickedkrs as $pk): ?>
									<tr>
										<td align="right"><?php echo $no++; ?></td>
										<td><?php echo $pk['kode'] ?></td>
										<td width="60%"><?php echo $pk['nama'] ?></td>
										<td align="right"><?php echo $pk['sks'] ?></td>
										<td> </td>
									</tr>
									<?php endforeach;?>
									<tr>
										<td colspan="3" align="center">TOTAL SKS</td>
										<td align="right">
											<?php foreach ($totalsks as $sks): ?>
											<?php echo $sks['total'] ?>
										<?php endforeach?></td>
										<td></td>
									</tr>
								</tbody>
								<?php else: ?>
								-
								<?php endif?>
							</table>
						</div>
						<div class="row">
							<?php $date = date('Y-m-d')?>
							<h5 class="text-muted" align="center"><?php echo tanggal($date) ?></h5>
							<table width="100%" border="0" class="b" >
								<tr>
									<td align="center" width="33%"><strong>Dosen Pembimbing Akademik</strong></td>
									<td width="33%">&nbsp;</td>
									<td align="center" width="33%"><strong>Mahasiswa</strong></td>
								</tr>
								<tr>
									<td height="65px" align="center"> (ttd) </td>
									<td height="90" align="center">
										<?php //foreach ($validasicode as $code): ?>
											
										<?php
									// $qrdate = date('d-m-Y'); 
									// $isi = 'KRS a.n. '.$code['namalengkap'].' dengan NIM '.$code['nim'].' telah disetujui oleh '.$code['nama'].', '.$code['gelarbelakang'].' NIDN : '.$code['nidn'].' pada tanggal '.$code['tanggal_disetujui'].'.'; ?>			
								<?php
								// $qrCode = new Endroid\QrCode\Qrcode($isi);
								// $qrCode->writeFile('uploads/qrcode/qrcode_krs_'.$username.'.png');
								?>								
								<img src="uploads/qrcode/qrcode_krs_<?php echo $mhs->nim; ?>.png" alt="" width="100px"">
							<?php //endforeach ?></td>
									<td align="center"> (ttd) </td>
								</tr>
								<tr>
									<td align="center"><?php if (count($dosenwalimhs) > 0): ?>
										<?php foreach ($dosenwalimhs as $dw): ?>
										<?php if ($dw['depan'] == NULL): ?>
										<?php else: ?>
										<?php echo $dw['nama'] ?>.
										<?php endif?><?php echo $dw['nama'] ?>, <?php echo $dw['belakang'] ?>
										<?php endforeach?>
										<?php else: ?>
										<?php echo "-" ?>
									<?php endif?>    	</td>
									<td>&nbsp;</td>
									<td align="center"><?php echo $mhs->namalengkap ?></td>
								</tr>
								<tr>
									<td align="center">NIDN. <?php if (count($dosenwalimhs) > 0): ?>
										<?php foreach ($dosenwalimhs as $dw): ?>
										<?php echo $dw['nidn'] ?>
										<?php endforeach?>
										<?php else: ?>
										<?php echo "-" ?>
										<?php endif?></td>
									<td>&nbsp;</td>
									<td align="center">NIM. <?php echo $mhs->nim ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!-- end row -->
				</div> <!-- container -->
				</div> <!-- content -->
