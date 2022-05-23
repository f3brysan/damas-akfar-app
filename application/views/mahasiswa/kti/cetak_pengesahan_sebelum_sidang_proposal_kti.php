<style>
@page { margin: 100px 35px; }
	/* #header { position: fixed; left: 0px; top: -50px; right: 0px; height: 50px; background-color: orange; text-align: center; }   */
#footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 50px; font-size:12px; }
#footer .page:after { content: counter(page, upper-arial); }
	
</style>
<style>
	.style1 {
	font-size: 14pt;
	font-weight:bold;
	font-family: "Times New Roman", Times, serif;
}
td.judul {
	font-size: 14pt;
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
}
td.12bold {
	font-size: 12pt;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
.txt12bold {
	font-size: 12pt;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
	.page_break {
		page-break-before: always;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class=" row">
					<div class="col-4 offset-4">
						<div class="col-md-4-2">
							<h2 align="center" class="style1">LEMBAR PENGESAHAN</h2>
							<br>
							<br>
						</div>
						</div><!-- end col -->
					</div>
					<div class="col-4 offset-2">
						<table width="100%" border="0">
							<tr>
								<td width="10%">&nbsp;</td>
								<td align="center" class="judul"><?php echo $check_sign['0']['judul'] ?></td>
								<td width="10%">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td align="center" class="judul"><?php if ($check_sign['0']['sub_judul'] !== null): ?>
									<?php echo $check_sign['0']['sub_judul'] ?>
								<?php endif ?></td>
								<td>&nbsp;</td>
							</tr>
						</table>
						<br />
						<table width="100%" border="0">
							<tr>
								<td width="12%">&nbsp;</td>
								<td align="center" class="12bold"><u><?php echo $nav->namalengkap; ?></u><br />
								NIM. <?php echo $nav->nim; ?></td>
								<td width="12%">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td align="center" class="12bold">Proposal  Karya Tulis Ilmiah ini telah diperiksa dan disetujui isi serta  susunannya untuk dapat diuji dan dipertahankan dihadapan Tim Penguji Proposal  Karya Tulis Ilmiah Jenjang Pendidikan Diploma III Akademi Farmasi Surabaya</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td align="center" class="12bold">Surabaya, <?php $date = date('Y-m-d')?><?=tanggal($date)?></td>
								<td>&nbsp;</td>
							</tr>
						</table>
						<div align="center">
							<br />
							<span class="txt12bold">Disetujui oleh :</span></div>
							<?php if (is_array($dosen) && count($dosen) >= 2): ?>
							<table width="100%" border="0">
								<tr>
									<td align="center" width="45%" class="12bold">Pembimbing</td>
									<td>&nbsp;</td>
									<td align="center" width="45%" class="12bold">Pembimbing Serta</td>
								</tr>
								<tr>
									<td align="center"><img src="uploads/qrcode/qrcode_kti_<?php echo $dosen['0']['qrcode_id']; ?>.png" alt="" width="100px""></td>
									<td height="90px">&nbsp;</td>
									<td align="center"><img src="uploads/qrcode/qrcode_kti_<?php echo $dosen['1']['qrcode_id']; ?>.png" alt="" width="100px""></td>
								</tr>
								<tr>
									<td align="center" class="12bold"><u><?php echo $dosen['0']['nama'] ?>, <?php echo $dosen['0']['gelarbelakang'] ?></u><br />NIDN/NUP. <?php echo $dosen['0']['rel_nidn'] ?></td>
									<td>&nbsp;</td>
									<td align="center" class="12bold"><u><?php echo $dosen['1']['nama'] ?>, <?php echo $dosen['1']['gelarbelakang'] ?></u><br />NIDN/NUP. <?php echo $dosen['1']['rel_nidn'] ?></td>
								</tr>
							</table>
							<?php else: ?>
							<table width="100%" border="0">
								<tr>
									<td width="20%">&nbsp;</td>
									<td align="center" class="12bold">Pembimbing</td>
									<td width="20%">&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td align="center"><img src="uploads/qrcode/qrcode_kti_<?php echo $dosen['0']['qrcode_id']; ?>.png" alt="" width="100px""></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td align="center" class="12bold"><u><?php echo $dosen['0']['nama'] ?>, <?php echo $dosen['0']['gelarbelakang'] ?></u><br />NIDN/NUP. <?php echo $dosen['0']['rel_nidn'] ?></td>
									<td>&nbsp;</td>
								</tr>
							</table>
							<?php endif ?>							
						</div>
						
					</div>
				</div>
				<!-- end row -->
				</div> <!-- container -->
				</div> <!-- content -->