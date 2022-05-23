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
							<h4 align="center">KARTU RENCANA STUDI REMEDIAL</h4>
							<p class="b" align="center"> Semester <?php echo $getkoderemedial->semester; ?> Tahun Ajaran <?php echo $getkoderemedial->tahunajaran ?></p>
						</div>
						</div><!-- end col -->
						<div class="col-4 offset-2">
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
									<?php if (count($dataremedialprinted) > 0): ?>
									<?php $no = 1;
foreach ($dataremedialprinted as $pk): ?>
									<tr>
										<td align="right"><?php echo $no++; ?></td>
										<td><?php echo $pk['kode'] ?></td>
										<td width="45%"><?php echo $pk['nama'] ?></td>
										<td align="right"><?php echo $pk['sks'] ?></td>
										<td align="center">
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
										 (<?php
$nilai = $pk['nilai'];
if ($nilai <= '39.99') {
	echo "E";
} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
	echo "D";
} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
	echo "C";
} elseif ($nilai >= '66.00' && $nilai <= '75.99') {
	echo "B";
} else {
	echo "A";
}?>)</td>
									</tr>
									<?php endforeach;?>
									<tr>
										<td colspan="3" align="center">TOTAL SKS</td>
										<td align="right">
											<?php echo $sks ?> SKS										
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
									<td height="65px">&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
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
									<td align="center">NIM. <?php echo $username ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!-- end row -->
				</div> <!-- container -->
				</div> <!-- content -->