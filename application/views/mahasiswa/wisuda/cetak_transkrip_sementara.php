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
<!-- <style>
@page { margin: 50px 50px; }
/* #header { position: fixed; left: 0px; top: -50px; right: 0px; height: 50px; background-color: orange; text-align: center; }   */
#footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 50px; font-size:12px; }
#footer .page:after { content: counter(page, upper-arial); }
</style> -->
<style>
td.a-no {
	font-size: 10px;
		color: black;
	font-family: "Times New Roman", Times, serif;	
		text-align: center;
}
td.a {
	font-size: 10px;
		color: black;
	font-family: "Times New Roman", Times, serif;
		border: 1px solid #999;
		text-align: center;
}
td.a-left {
	font-size: 10px;
		color: black;
	font-family: "Times New Roman", Times, serif;
		border: 1px solid #999;
		text-align: left;
}
td.a-right {
	font-size: 10px;
		color: black;
	font-family: "Times New Roman", Times, serif;
		border: 1px solid #999;
		text-align: right;
}

td.a-jus {
	font-size: 10px;
		color: black;
	font-family: "Times New Roman", Times, serif;
		border: 1px solid #999;
		text-align: justify;
}

table.a {
	font-size: 12px;
	color: black;
	border: 1px solid #999;
	font-family: "Californian FB", AppleMyungjo;
	padding: 10px;
}
table.pertama {
	font-size: 10px;
		color: black;
		font-family: "Times New Roman", Times, serif;
}
table.nilai {
	border-collapse: collapse;
	font-size: 10px;
		color: black;
	font-family: "Times New Roman", Times, serif;
		border: 1px solid #999;
}
p.b {
	font-size: 10px;
	color: black;
	font-family: "Californian FB", AppleMyungjo;
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

@page { margin: 0cm 1cm; }.
</style>
<div class="content">	
		
				<table width="100%" border="0">
					<tr>
						<td width="100%" align="center"><img src="assets/images/kop_skpi.png" alt="" width="600px""></td>
					</tr>
				</table>
				
					
						<div class="col-4 offset-2">
							<table width="100%" border="0">
					<tr>
						<td width="100%" align="center" class="a-no"><strong>TRANSKRIP SEMENTARA</strong></td>
					</tr>
				</table>
						
						
						<div class="col-4 offset-2">
							<table width="100%" class="pertama">
								<tr class="nilai">
									<td width="20%">Program</td>
									<td width="1%">:</td>
									<td width="23%">Diploma III </td>
									<td width="10%">&nbsp;</td>
									<td width="18%">Akreditasi Institusi</td>
									<td width="1%">:</td>
									<td width="47%">Peringkat &quot;B&quot; No.SK: 4268/SK/BAN-PT/Akred/PT/XI/2017</td>
								</tr>
								<tr>
									<td>Program Studi </td>
									<td>:</td>
									<td>Farmasi</td>
									<td>&nbsp;</td>
									<td>Akreditasi Prodi </td>
									<td>:</td>
									<td>Peringkat &quot;B&quot; No.SK: 0208/LAM-PTKes/Akr/Dip/IV/2019</td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $nav->namalengkap ?></td>
									<td>&nbsp;</td>
									<td>Tanggal Kelulusan</td>
									<td>:</td>
									<td>2 Oktober 2020</td>
								</tr>
								<tr>
									<td>NIM</td>
									<td>:</td>
									<td><?php echo $nav->nim ?></td>
									<td>&nbsp;</td>
									<td>Nomor Ijazah Institusi </td>
									<td>:</td>
									<td><?php echo $no_surat['0']['no_ijazah'] ?></td>
								</tr>
								<tr>
									<td>Tempat &amp;Tanggal Lahir</td>
									<td>:</td>
									<td><?php echo $nav->lahirmahasiswa ?>, <?php $date = date('Y-m-d')?><?php echo tanggal($nav->tgllahirmahasiswa) ?></td>
									<td>&nbsp;</td>
									<td>Nomor Transkrip </td>
									<td>:</td>
									<td><?php echo $no_surat['0']['no_transkrip'] ?></td>
								</tr>
								<tr>
									<td>Disetejui pada</td>
									<td>:</td>
									<td><?php echo $app['0']['create_at'] ?></td>
									<td>&nbsp;</td>
									<td>Nomor PIN</td>
									<td>:</td>
									<td><?php echo $no_surat['0']['no_pin'] ?></td>
								</tr>								
							</table>
						</div>
						<!-- end row -->
						<div class="col-4 offset-2">
							<table width="100%" class='nilai'>
								<tr>
									<td class="a" width="4%"><strong>Nomor</strong></td>
									<td class="a" width="7%"><strong>Kode</strong></td>
									<td class="a" width="25%"><strong>Mata Kuliah</strong></td>
									<td class="a" width="3%"><strong>SKS</strong></td>
									<td class="a" width="4%"><strong>Nilai</strong></td>
									<td class="a" width="5%"><strong>Bobot</strong></td>
									<td class="a" width="4%"><strong>Nomor</strong></td>
									<td class="a" width="7%"><strong>Kode</strong></td>
									<td class="a" width="25%"><strong>Mata Kuliah</strong></td>
									<td class="a" width="3%"><strong>SKS</strong></td>
									<td class="a" width="4%"><strong>Nilai</strong></td>
									<td class="a" width="4%"><strong>Bobot</strong></td>
								</tr>
								<tr>
									<td colspan="6">SEMESTER I </td>
									<td class="a-left" colspan="6">SEMESTER IV </td>
								</tr>
								<tr>
									<td class="a">1</td>
									<td class="a"><?php echo $satu['0']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['0']['nama'] ?></td>
									<td class="a"><?php echo $satu['0']['sks'] ?></td>
									<td class="a"><?php echo $satu['0']['huruf'] ?></td>
									<td class="a"><?php echo $satu['0']['bobot'] ?></td>
									<td class="a">1</td>
									<td class="a"><?php echo $empat['0']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['0']['nama'] ?></td>
									<td class="a"><?php echo $empat['0']['sks'] ?></td>
									<td class="a"><?php echo $empat['0']['huruf'] ?></td>
									<td class="a"><?php echo $empat['0']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">2</td>
									<td class="a"><?php echo $satu['1']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['1']['nama'] ?></td>
									<td class="a"><?php echo $satu['1']['sks'] ?></td>
									<td class="a"><?php echo $satu['1']['huruf'] ?></td>
									<td class="a"><?php echo $satu['1']['bobot'] ?></td>
									<td class="a">2</td>
									<td class="a"><?php echo $empat['1']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['1']['nama'] ?></td>
									<td class="a"><?php echo $empat['1']['sks'] ?></td>
									<td class="a"><?php echo $empat['1']['huruf'] ?></td>
									<td class="a"><?php echo $empat['1']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">3</td>
									<td class="a"><?php echo $satu['2']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['2']['nama'] ?></td>
									<td class="a"><?php echo $satu['2']['sks'] ?></td>
									<td class="a"><?php echo $satu['2']['huruf'] ?></td>
									<td class="a"><?php echo $satu['2']['bobot'] ?></td>
									<td class="a">3</td>
									<td class="a"><?php echo $empat['2']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['2']['nama'] ?></td>
									<td class="a"><?php echo $empat['2']['sks'] ?></td>
									<td class="a"><?php echo $empat['2']['huruf'] ?></td>
									<td class="a"><?php echo $empat['2']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">4</td>
									<td class="a"><?php echo $satu['3']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['3']['nama'] ?></td>
									<td class="a"><?php echo $satu['3']['sks'] ?></td>
									<td class="a"><?php echo $satu['3']['huruf'] ?></td>
									<td class="a"><?php echo $satu['3']['bobot'] ?></td>
									<td class="a">4</td>
									<td class="a"><?php echo $empat['3']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['3']['nama'] ?></td>
									<td class="a"><?php echo $empat['3']['sks'] ?></td>
									<td class="a"><?php echo $empat['3']['huruf'] ?></td>
									<td class="a"><?php echo $empat['3']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">5</td>
									<td class="a"><?php echo $satu['4']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['4']['nama'] ?></td>
									<td class="a"><?php echo $satu['4']['sks'] ?></td>
									<td class="a"><?php echo $satu['4']['huruf'] ?></td>
									<td class="a"><?php echo $satu['4']['bobot'] ?></td>
									<td class="a">5</td>
									<td class="a"><?php echo $empat['4']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['4']['nama'] ?></td>
									<td class="a"><?php echo $empat['4']['sks'] ?></td>
									<td class="a"><?php echo $empat['4']['huruf'] ?></td>
									<td class="a"><?php echo $empat['4']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">6</td>
									<td class="a"><?php echo $satu['5']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['5']['nama'] ?></td>
									<td class="a"><?php echo $satu['5']['sks'] ?></td>
									<td class="a"><?php echo $satu['5']['huruf'] ?></td>
									<td class="a"><?php echo $satu['5']['bobot'] ?></td>
									<td class="a">6</td>
									<td class="a"><?php echo $empat['5']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['5']['nama'] ?></td>
									<td class="a"><?php echo $empat['5']['sks'] ?></td>
									<td class="a"><?php echo $empat['5']['huruf'] ?></td>
									<td class="a"><?php echo $empat['5']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">7</td>
									<td class="a"><?php echo $satu['6']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['6']['nama'] ?></td>
									<td class="a"><?php echo $satu['6']['sks'] ?></td>
									<td class="a"><?php echo $satu['6']['huruf'] ?></td>
									<td class="a"><?php echo $satu['6']['bobot'] ?></td>
									<td class="a">7</td>
									<td class="a"><?php echo $empat['6']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['6']['nama'] ?></td>
									<td class="a"><?php echo $empat['6']['sks'] ?></td>
									<td class="a"><?php echo $empat['6']['huruf'] ?></td>
									<td class="a"><?php echo $empat['6']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">8</td>
									<td class="a"><?php echo $satu['7']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['7']['nama'] ?></td>
									<td class="a"><?php echo $satu['7']['sks'] ?></td>
									<td class="a"><?php echo $satu['7']['huruf'] ?></td>
									<td class="a"><?php echo $satu['7']['bobot'] ?></td>
									<td class="a">8</td>
									<td class="a"><?php echo $empat['7']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['7']['nama'] ?></td>
									<td class="a"><?php echo $empat['7']['sks'] ?></td>
									<td class="a"><?php echo $empat['7']['huruf'] ?></td>
									<td class="a"><?php echo $empat['7']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">9</td>
									<td class="a"><?php echo $satu['8']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['8']['nama'] ?></td>
									<td class="a"><?php echo $satu['8']['sks'] ?></td>
									<td class="a"><?php echo $satu['8']['huruf'] ?></td>
									<td class="a"><?php echo $satu['8']['bobot'] ?></td>
									<td class="a">9</td>
									<td class="a"><?php echo $empat['8']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['8']['nama'] ?></td>
									<td class="a"><?php echo $empat['8']['sks'] ?></td>
									<td class="a"><?php echo $empat['8']['huruf'] ?></td>
									<td class="a"><?php echo $empat['8']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">10</td>
									<td class="a"><?php echo $satu['9']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['9']['nama'] ?></td>
									<td class="a"><?php echo $satu['9']['sks'] ?></td>
									<td class="a"><?php echo $satu['9']['huruf'] ?></td>
									<td class="a"><?php echo $satu['9']['bobot'] ?></td>
									<td class="a">10</td>
									<td class="a"><?php echo $empat['9']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['9']['nama'] ?></td>
									<td class="a"><?php echo $empat['9']['sks'] ?></td>
									<td class="a"><?php echo $empat['9']['huruf'] ?></td>
									<td class="a"><?php echo $empat['9']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">11</td>
									<td class="a"><?php echo $satu['10']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['10']['nama'] ?></td>
									<td class="a"><?php echo $satu['10']['sks'] ?></td>
									<td class="a"><?php echo $satu['10']['huruf'] ?></td>
									<td class="a"><?php echo $satu['10']['bobot'] ?></td>
									<td class="a">11</td>
									<td class="a"><?php echo $empat['10']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['10']['nama'] ?></td>
									<td class="a"><?php echo $empat['10']['sks'] ?></td>
									<td class="a"><?php echo $empat['10']['huruf'] ?></td>
									<td class="a"><?php echo $empat['10']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">12</td>
									<td class="a"><?php echo $satu['11']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['11']['nama'] ?></td>
									<td class="a"><?php echo $satu['11']['sks'] ?></td>
									<td class="a"><?php echo $satu['11']['huruf'] ?></td>
									<td class="a"><?php echo $satu['11']['bobot'] ?></td>
									<td class="a">12</td>
									<td class="a"><?php echo $empat['11']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['11']['nama'] ?></td>
									<td class="a"><?php echo $empat['11']['sks'] ?></td>
									<td class="a"><?php echo $empat['11']['huruf'] ?></td>
									<td class="a"><?php echo $empat['11']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">13</td>
									<td class="a"><?php echo $satu['12']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $satu['12']['nama'] ?></td>
									<td class="a"><?php echo $satu['12']['sks'] ?></td>
									<td class="a"><?php echo $satu['12']['huruf'] ?></td>
									<td class="a"><?php echo $satu['12']['bobot'] ?></td>
									<td class="a">13</td>
									<td class="a"><?php echo $empat['12']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['12']['nama'] ?></td>
									<td class="a"><?php echo $empat['12']['sks'] ?></td>
									<td class="a"><?php echo $empat['12']['huruf'] ?></td>
									<td class="a"><?php echo $empat['12']['bobot'] ?></td>
								</tr>
								<tr>
									<td colspan="6">SEMESTER II </td>
									<td class="a">14</td>
									<td class="a"><?php echo $empat['13']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $empat['13']['nama'] ?></td>
									<td class="a"><?php echo $empat['13']['sks'] ?></td>
									<td class="a"><?php echo $empat['13']['huruf'] ?></td>
									<td class="a"><?php echo $empat['13']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">1</td>
									<td class="a"><?php echo $dua['0']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['0']['nama'] ?></td>
									<td class="a"><?php echo $dua['0']['sks'] ?></td>
									<td class="a"><?php echo $dua['0']['huruf'] ?></td>
									<td class="a"><?php echo $dua['0']['bobot'] ?></td>
									<td colspan="6">SEMESTER V </td>
								</tr>
								<tr>
									<td class="a">2</td>
									<td class="a"><?php echo $dua['1']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['1']['nama'] ?></td>
									<td class="a"><?php echo $dua['1']['sks'] ?></td>
									<td class="a"><?php echo $dua['1']['huruf'] ?></td>
									<td class="a"><?php echo $dua['1']['bobot'] ?></td>
									<td class="a">1</td>
									<td class="a"><?php echo $lima['0']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $lima['0']['nama'] ?></td>
									<td class="a"><?php echo $lima['0']['sks'] ?></td>
									<td class="a"><?php echo $lima['0']['huruf'] ?></td>
									<td class="a"><?php echo $lima['0']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">3</td>
									<td class="a"><?php echo $dua['2']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['2']['nama'] ?></td>
									<td class="a"><?php echo $dua['2']['sks'] ?></td>
									<td class="a"><?php echo $dua['2']['huruf'] ?></td>
									<td class="a"><?php echo $dua['2']['bobot'] ?></td>
									<td class="a">2</td>
									<td class="a"><?php echo $lima['1']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $lima['1']['nama'] ?></td>
									<td class="a"><?php echo $lima['1']['sks'] ?></td>
									<td class="a"><?php echo $lima['1']['huruf'] ?></td>
									<td class="a"><?php echo $lima['1']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">4</td>
									<td class="a"><?php echo $dua['3']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['3']['nama'] ?></td>
									<td class="a"><?php echo $dua['3']['sks'] ?></td>
									<td class="a"><?php echo $dua['3']['huruf'] ?></td>
									<td class="a"><?php echo $dua['3']['bobot'] ?></td>
									<td class="a">3</td>
									<td class="a"><?php echo $lima['2']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $lima['2']['nama'] ?></td>
									<td class="a"><?php echo $lima['2']['sks'] ?></td>
									<td class="a"><?php echo $lima['2']['huruf'] ?></td>
									<td class="a"><?php echo $lima['2']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">5</td>
									<td class="a"><?php echo $dua['4']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['4']['nama'] ?></td>
									<td class="a"><?php echo $dua['4']['sks'] ?></td>
									<td class="a"><?php echo $dua['4']['huruf'] ?></td>
									<td class="a"><?php echo $dua['4']['bobot'] ?></td>
									<td class="a">4</td>
									<td class="a"><?php echo $lima['3']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $lima['3']['nama'] ?></td>
									<td class="a"><?php echo $lima['3']['sks'] ?></td>
									<td class="a"><?php echo $lima['3']['huruf'] ?></td>
									<td class="a"><?php echo $lima['3']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">6</td>
									<td class="a"><?php echo $dua['5']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['5']['nama'] ?></td>
									<td class="a"><?php echo $dua['5']['sks'] ?></td>
									<td class="a"><?php echo $dua['5']['huruf'] ?></td>
									<td class="a"><?php echo $dua['5']['bobot'] ?></td>
									<td class="a">5</td>
									<td class="a"><?php echo $lima['4']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $lima['4']['nama'] ?></td>
									<td class="a"><?php echo $lima['4']['sks'] ?></td>
									<td class="a"><?php echo $lima['4']['huruf'] ?></td>
									<td class="a"><?php echo $lima['4']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">7</td>
									<td class="a"><?php echo $dua['6']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['6']['nama'] ?></td>
									<td class="a"><?php echo $dua['6']['sks'] ?></td>
									<td class="a"><?php echo $dua['6']['huruf'] ?></td>
									<td class="a"><?php echo $dua['6']['bobot'] ?></td>
									<td class="a">6</td>
									<td class="a"><?php echo $lima['5']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $lima['5']['nama'] ?></td>
									<td class="a"><?php echo $lima['5']['sks'] ?></td>
									<td class="a"><?php echo $lima['5']['huruf'] ?></td>
									<td class="a"><?php echo $lima['5']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">8</td>
									<td class="a"><?php echo $dua['7']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['7']['nama'] ?></td>
									<td class="a"><?php echo $dua['7']['sks'] ?></td>
									<td class="a"><?php echo $dua['7']['huruf'] ?></td>
									<td class="a"><?php echo $dua['7']['bobot'] ?></td>
									<td class="a">7</td>
									<td class="a"><?php echo $lima['6']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $lima['6']['nama'] ?></td>
									<td class="a"><?php echo $lima['6']['sks'] ?></td>
									<td class="a"><?php echo $lima['6']['huruf'] ?></td>
									<td class="a"><?php echo $lima['6']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">9</td>
									<td class="a"><?php echo $dua['8']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['8']['nama'] ?></td>
									<td class="a"><?php echo $dua['8']['sks'] ?></td>
									<td class="a"><?php echo $dua['8']['huruf'] ?></td>
									<td class="a"><?php echo $dua['8']['bobot'] ?></td>
									<td class="a">8</td>
									<td class="a"><?php echo $lima['7']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $lima['7']['nama'] ?></td>
									<td class="a"><?php echo $lima['7']['sks'] ?></td>
									<td class="a"><?php echo $lima['7']['huruf'] ?></td>
									<td class="a"><?php echo $lima['7']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">10</td>
									<td class="a"><?php echo $dua['9']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['9']['nama'] ?></td>
									<td class="a"><?php echo $dua['9']['sks'] ?></td>
									<td class="a"><?php echo $dua['9']['huruf'] ?></td>
									<td class="a"><?php echo $dua['9']['bobot'] ?></td>
									<td colspan="6">SEMESTER VI </td>
								</tr>
								<tr>
									<td class="a">11</td>
									<td class="a"><?php echo $dua['10']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['10']['nama'] ?></td>
									<td class="a"><?php echo $dua['10']['sks'] ?></td>
									<td class="a"><?php echo $dua['10']['huruf'] ?></td>
									<td class="a"><?php echo $dua['10']['bobot'] ?></td>
									<td class="a">1</td>
									<td class="a"><?php echo $enam['0']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $enam['0']['nama'] ?></td>
									<td class="a"><?php echo $enam['0']['sks'] ?></td>
									<td class="a"><?php echo $enam['0']['huruf'] ?></td>
									<td class="a"><?php echo $enam['0']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">12</td>
									<td class="a"><?php echo $dua['11']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['11']['nama'] ?></td>
									<td class="a"><?php echo $dua['11']['sks'] ?></td>
									<td class="a"><?php echo $dua['11']['huruf'] ?></td>
									<td class="a"><?php echo $dua['11']['bobot'] ?></td>
									<td class="a">2</td>
									<td class="a"><?php echo $enam['1']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $enam['1']['nama'] ?></td>
									<td class="a"><?php echo $enam['1']['sks'] ?></td>
									<td class="a"><?php echo $enam['1']['huruf'] ?></td>
									<td class="a"><?php echo $enam['1']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">13</td>
									<td class="a"><?php echo $dua['12']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['12']['nama'] ?></td>
									<td class="a"><?php echo $dua['12']['sks'] ?></td>
									<td class="a"><?php echo $dua['12']['huruf'] ?></td>
									<td class="a"><?php echo $dua['12']['bobot'] ?></td>
									<td class="a">3</td>
									<td class="a"><?php echo $enam['2']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $enam['2']['nama'] ?></td>
									<td class="a"><?php echo $enam['2']['sks'] ?></td>
									<td class="a"><?php echo $enam['2']['huruf'] ?></td>
									<td class="a"><?php echo $enam['2']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">14</td>
									<td class="a"><?php echo $dua['13']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['13']['nama'] ?></td>
									<td class="a"><?php echo $dua['13']['sks'] ?></td>
									<td class="a"><?php echo $dua['13']['huruf'] ?></td>
									<td class="a"><?php echo $dua['13']['bobot'] ?></td>
									<td class="a-right" colspan="4">SUB TOTAL KREDIT</td>
									<td class="a" colspan="2"><?php echo $sks_2['0']['total'] ?></td>
								</tr>
								<tr>
									<td class="a">15</td>
									<td class="a"><?php echo $dua['14']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $dua['14']['nama'] ?></td>
									<td class="a"><?php echo $dua['14']['sks'] ?></td>
									<td class="a"><?php echo $dua['14']['huruf'] ?></td>
									<td class="a"><?php echo $dua['14']['bobot'] ?></td>
									<td class="a-right" colspan="4">TOTAL KREDIT </td>
									<td class="a" colspan="2"><?php echo $sks_1['0']['total']+$sks_2['0']['total'] ?></td>
								</tr>
								<tr>
									<td class="a-left" colspan="6">SEMESTER III </td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td class="a">1</td>
									<td class="a"><?php echo $tiga['0']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['0']['nama'] ?></td>
									<td class="a"><?php echo $tiga['0']['sks'] ?></td>
									<td class="a"><?php echo $tiga['0']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['0']['bobot'] ?></td>
									<td colspan="6" rowspan="16">
										<table width="100%">
                                      <tr>
                                        <td colspan="2" class="a">JUDUL KARYA TULIS ILMIAH</td>
                                        </tr>                                      
                                      <tr>
                                        <td colspan="2" class="a"><?php echo $kti['0']['kti'] ?></td>
                                        </tr>
                                      <tr>
                                        <td width="40%" class="a-left">Jumlah Satuan Kredit Semester</td>
                                        <td width="60%" class="a"><?php echo $sks_1['0']['total']+$sks_2['0']['total'];?> SKS</td>
                                      </tr>
                                      <tr>
                                        <td class="a-left">Index Prestasi Kumulatif</td>
                                        <td class="a"><?php echo number_format($ipk['0']['bobot']/$ipk['0']['totalsks'],2); ?></td>
                                      </tr>
                                      <tr>
                                        <td class="a-left">Predikat Index Prestasi Kumulatif</td>
                                        <td class="a"><?php if (($ipk['0']['bobot']/$ipk['0']['totalsks'])>=3.5): ?>
                                        	Lulus dengan Pujian
                                        	<?php elseif(($ipk['0']['bobot']/$ipk['0']['totalsks'])>=3.01): ?>
                                        	Lulus dengan Sangat Memuaskan
                                        	<?php elseif (($ipk['0']['bobot']/$ipk['0']['totalsks'])>=2.76): ?>
                                        	Lulus dengan Memuaskan
                                        	<?php else: ?>
                                        	Lulus
                                        <?php endif ?></td>
                                      </tr>                                      
                                    </table>
                                <table width="100%">
                                      <tr>
                                        <td colspan="4" class="a"><strong>Konversi Nilai</strong></td>
                                      </tr>
                                      <tr>
                                        <td width="40%" class="a-left">Nilai Mutlak </td>
                                        <td width="40%" class="a-left">Nilai Relatif </td>
                                        <td width="40%" class="a-left">Bobot Nilai </td>
                                        <td width="60%" rowspan="6" class="a"><img src="uploads/foto/<?php echo $nav->foto; ?>" alt="" height="75px"></td>
                                      </tr>
                                      <tr>
                                        <td class="a">&gt;= 76 </td>
                                        <td class="a">A</td>
                                        <td class="a">4.00</td>
                                      </tr>
                                      <tr>
                                        <td class="a">66 - 75.99</td>
                                        <td class="a">B</td>
                                        <td class="a">3.00</td>
                                      </tr>
                                      <tr>
                                        <td class="a">51 - 65.99</td>
                                        <td class="a">C</td>
                                        <td class="a">2.00</td>
                                      </tr>
                                      <tr>
                                        <td class="a">40 - 50.99</td>
                                        <td class="a">D</td>
                                        <td class="a">1.00</td>
                                      </tr>
                                      <tr>
                                        <td class="a">&lt;= 39.99</td>
                                        <td class="a">E</td>
                                        <td class="a">0.00</td>
                                      </tr>
                                  </table>
                              </td>
								</tr>
								<tr>
									<td class="a">2</td>
									<td class="a"><?php echo $tiga['1']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['1']['nama'] ?></td>
									<td class="a"><?php echo $tiga['1']['sks'] ?></td>
									<td class="a"><?php echo $tiga['1']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['1']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">3</td>
									<td class="a"><?php echo $tiga['2']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['2']['nama'] ?></td>
									<td class="a"><?php echo $tiga['2']['sks'] ?></td>
									<td class="a"><?php echo $tiga['2']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['2']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">4</td>
									<td class="a"><?php echo $tiga['3']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['3']['nama'] ?></td>
									<td class="a"><?php echo $tiga['3']['sks'] ?></td>
									<td class="a"><?php echo $tiga['3']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['3']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">5</td>
									<td class="a"><?php echo $tiga['4']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['4']['nama'] ?></td>
									<td class="a"><?php echo $tiga['4']['sks'] ?></td>
									<td class="a"><?php echo $tiga['4']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['4']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">6</td>
									<td class="a"><?php echo $tiga['5']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['5']['nama'] ?></td>
									<td class="a"><?php echo $tiga['5']['sks'] ?></td>
									<td class="a"><?php echo $tiga['5']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['5']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">7</td>
									<td class="a"><?php echo $tiga['6']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['6']['nama'] ?></td>
									<td class="a"><?php echo $tiga['6']['sks'] ?></td>
									<td class="a"><?php echo $tiga['6']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['6']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">8</td>
									<td class="a"><?php echo $tiga['7']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['7']['nama'] ?></td>
									<td class="a"><?php echo $tiga['7']['sks'] ?></td>
									<td class="a"><?php echo $tiga['7']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['7']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">9</td>
									<td class="a"><?php echo $tiga['8']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['8']['nama'] ?></td>
									<td class="a"><?php echo $tiga['8']['sks'] ?></td>
									<td class="a"><?php echo $tiga['8']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['8']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">10</td>
									<td class="a"><?php echo $tiga['9']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['9']['nama'] ?></td>
									<td class="a"><?php echo $tiga['9']['sks'] ?></td>
									<td class="a"><?php echo $tiga['9']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['9']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">11</td>
									<td class="a"><?php echo $tiga['10']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['10']['nama'] ?></td>
									<td class="a"><?php echo $tiga['10']['sks'] ?></td>
									<td class="a"><?php echo $tiga['10']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['10']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">12</td>
									<td class="a"><?php echo $tiga['11']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['11']['nama'] ?></td>
									<td class="a"><?php echo $tiga['11']['sks'] ?></td>
									<td class="a"><?php echo $tiga['11']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['11']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">13</td>
									<td class="a"><?php echo $tiga['12']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['12']['nama'] ?></td>
									<td class="a"><?php echo $tiga['12']['sks'] ?></td>
									<td class="a"><?php echo $tiga['12']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['12']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">14</td>
									<td class="a"><?php echo $tiga['13']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['13']['nama'] ?></td>
									<td class="a"><?php echo $tiga['13']['sks'] ?></td>
									<td class="a"><?php echo $tiga['13']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['13']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a">15</td>
									<td class="a"><?php echo $tiga['14']['kodematkul'] ?></td>
									<td class="a-left"><?php echo $tiga['14']['nama'] ?></td>
									<td class="a"><?php echo $tiga['14']['sks'] ?></td>
									<td class="a"><?php echo $tiga['14']['huruf'] ?></td>
									<td class="a"><?php echo $tiga['14']['bobot'] ?></td>
								</tr>
								<tr>
									<td class="a-right" colspan="4">SUB TOTAL KREDIT</td>
									<td class="a" colspan="2"><?php echo $sks_1['0']['total'] ?></td>
								</tr>
							</table>

						</div>						
						<div class="col-4 offset-2">
							<table width="100%" class="pertama">
								<tr>
									<td>&nbsp;</td>
									<td class="a-no">
										Ditetapkan di Surabaya,										
									</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td class="a-no">
										WAKIL DIREKTUR I<br />
										BIDANG AKADEMIK
									</td>
									<td>&nbsp;</td>
									<td class="a-no">
										DIREKTUR<br />
										AKADEMI FARMASI SURABAYA
									</td>
								</tr>
								<tr>
									<td height="20">&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td class="a-no">
										<u>Tri Puji Lestari Sudarwati, S.Si.,
										M.Si.</u><br>NIDN. 0714128304</p>
									</td>
									<td>&nbsp;</td>
									<td class="a-no">
										<u>Dr. ABD. SYAKUR, M.Pd.</u><br>NIDN.
										0704108405</p>
									</td>
								</tr>
							</table>
						</div>						
					</div>
				</div>
				<!-- end row -->
				</div> <!-- container -->
				</div> <!-- content -->