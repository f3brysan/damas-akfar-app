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
	.style2 {
		font-size: 9px;
		font-family: Californian FB;
	}
	ol.jus {
		text-align:justify;
	}
	ul.jus { text-align:justify;
	}
</style>
<style>
@page { margin: 50px 50px; }
	/* #header { position: fixed; left: 0px; top: -50px; right: 0px; height: 50px; background-color: orange; text-align: center; }   */
#footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 50px; font-size:12px; }
#footer .page:after { content: counter(page, upper-arial); }
	
</style>
<style>
	td.a {
		font-size: 12px;
		color: black;
		border: 1px solid #999;
		font-family: "Californian FB", AppleMyungjo;
		padding: 10px;
	}
	td.a2 {
		font-size: 12px;
		color: black;
		border: 1px solid #999;
		font-family: "Californian FB", AppleMyungjo;
	}
	td.a3 {
		font-size: 12px;
				color: black;
		font-family: "Californian FB", AppleMyungjo;
	}
	table.a {
		font-size: 12px;
		color: black;
		border: 1px solid #999;
		font-family: "Californian FB", AppleMyungjo;
		padding: 10px;
	}
	table.a2 {
		font-size: 12px;
				color: black;
		font-family: "Californian FB", AppleMyungjo;
		padding: 10px;
	}
	table.b {
		font-size: 11px;
		color: black;
		font-family: "Californian FB", AppleMyungjo;
	}
	p.b {
		font-size: 12px;
		color: black;
		font-family: "Times New Roman";
	}
	p.c {
		font-size: 9px;
		color: black;
	}
	p.a {
		font-size: 11px;
		color: black;
	}
	p.d {
		color: black;
		font-family: Garamond;
	}
	table.c {
		font-size: 13px;
		color: black;
	}
	.page_break {
		page-break-before: always;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<table width="100%" border="0">
					<tr>
						<td width="100%" align="center"><img src="assets/images/kop_2021.png" alt="" width="650px""></td>
					</tr>
				</table>			
					
		
				<div class=" row">
					<div class="col-4 offset-4">
						<div class="col-md-4-2">
							<h1 style="font-size:12pt;" align="center">FORMULIR PERMOHONAN MENGIKUTI YUDISIUM
							<br>
							AKADEMI FARMASI SURABAYA
							<br>
							<?php foreach ($get as $g): ?>
							TAHUN AKADEMIK : <?php echo $g['tahunajaran'] ?>
							<?php endforeach ?>
							</h1>
							<br>
							<p class="b" align="left"> Yth. Direktur
								<br>
								u.p. Kepala Program Studi D – III FARMASI
								<br>
								Akademi Farmasi Surabaya
							</p>
						</div>
						</div><!-- end col -->
						<div class="col-4 offset-2">
							<p class="b" align="left"> Yang bertanda tangan dibawah ini saya :
							</p>
							<table width="100%" class="a2">
								<?php foreach ($get as $g1): ?>
									
								
								<tr>
									<td width="20%">Nama</td>
									<td width="2%">:</td>
									<td width="78%"><?php $namamhs = strtolower($g1['namalengkap']); ?><?php echo ucwords($namamhs) ?> </td>
								</tr>
								<tr>
									<td>NIM</td>
									<td>:</td>
									<td><?php echo $g1['nim'] ?></td>
								</tr>
								<tr>
									<td>Kelas</td>
									<td>:</td>
									<td><?php echo $g1['kelas'] ?></td>
								</tr>
								<tr>
									<td>No Telp / HP</td>
									<td>:</td>
									<td><?php echo $g1['hp'] ?></td>
								</tr>
								<?php endforeach ?>
							</table>
						</div>
						
						<!-- end row -->
						<div class="col-4 offset-2">
							
							
							<p class="b" align="justify"> Saya telah memenuhi semua persyaratan akademis dan administratif yang ditetapkan untuk mengikuti Yudisium. Berikut adalah berkas persyaratan Yudisium yang telah terverifikasi.
							</p>
							
							<div>
								<table width="100%" class="a2">
									<tr>
										<td>1.</td>
										<td>Bebas Administratif SPP Semester 1 s/d 6. </td>
									</tr>
									<tr>
										<td>2.</td>
										<td>Bebas Perpustakaan (Pengembalian Pinjaman Buku, Pengumpulan Naskah Proposal, PKL, dan KTI).</td>
									</tr>
									<tr>
										<td>3.</td>
										<td>Bebas Laboratorium. </td>
									</tr>
									<tr>
										<td>4.</td>
										<td>Telah Unggah Artikel KTI.</td>
									</tr>
									<tr>
										<td>5.</td>
										<td>Telah Menyelesaikan PKL dan SE.</td>
									</tr>
									<tr>
										<td>6.</td>
										<td>Telah Menyelesaikan Kuliah Pengabdian Masyarakat. </td>
									</tr>
									<tr>
										<td>7.</td>
										<td>Tidak Memiliki Nilai D dan E Pada KHS. </td>
									</tr>
								</table>
							</div>
							<p class="b" align="justify"> Demikian atas perhatiannya, terima kasih.
							</p>
						</div>
						
						
					</div>
					<div class="col-4 offset-2">
						<table width="100%" class="a2">
							<?php foreach ($get as $g2): ?>
							<tr>
								<td width="33%"><div align="center">Mengetahui / Menyetejui</div></td>
								<td width="34%">&nbsp;</td>
								<td width="33%"><div align="center">Surabaya, <?php $date = date_create($g['acc_at']) ?> <?php $date2 = date_format($date, 'Y-m-d') ?><?php echo tanggal($date2) ?></div></td>
							</tr>
							<tr>
								<td><div align="center">Kepala Prodi D - III Farmasi</div></td>
								<td>&nbsp;</td>
								<td><div align="center">Mahasiswa,</div></td>
							</tr>
							<tr>
								<td><div align="center">Akademi Farmasi Surabaya </div></td>
								<td>&nbsp;</td>
								<td><div align="center"></div></td>
							</tr>
							<tr>
								<td height="90" align="center">
										
								<img src="uploads/qrcode/qrcode_bebas_yudisium_<?php echo $username; ?>.png" alt="" width="100px""></td>
								<td>&nbsp;</td>
								<td><div align="center"></div></td>
							</tr>
							<tr>
								<td><div align="center">apt. Damaranie Dipahayu, S.Farm., M.Farm.</div></td>
								<td>&nbsp;</td>
								<td><div align="center"><?php echo ucwords($namamhs) ?></div></td>
							</tr>
							<tr>
								<td><div align="center">NIDN 0703038304</div></td>
								<td>&nbsp;</td>
								<td><div align="center"><?php echo $g2['nim'] ?></div></td>
							</tr>
							<?php endforeach ?>
						</table>
					</div>
					<div class="col-4 offset-2">
						
					</div>
					<div class="row mt-3">
					</div>
				</div>
			</div>		
			<!-- end row -->
			</div> <!-- container -->
			</div> <!-- content -->