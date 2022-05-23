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
		font-size: 8pt;
		font-family: "Times New Roman", Times, serif;
	}
	ol.jus {
		text-align:justify;
	}
	ol.sub {
		text-align:justify;
		padding-left: 15px;
	}
	ul.jus { text-align:justify;
	}
</style>
<style>
@page {
	size: legal potrait;
	margin: 10px 90px; }
	/* #header { position: fixed; left: 0px; top: -50px; right: 0px; height: 50px; background-color: orange; text-align: center; }   */
#footer { position: fixed; left: 0px; bottom: 70px; right: 0px; height: 50px; font-size:10px; }
#footer .page:after { content: counter(page, upper-arial); }
</style>
<style>
	td.a {
		font-size: 12px;
		color: black;
		border: 1px solid #999;
		font-family: "Times New Roman", Times, serif;
		padding: 10px;
	}
	td.a2 {
		font-size: 10pt;
		color: black;
		border: 1px solid #999;
		padding-top: 0px;
	}
	td.a3 {
		font-size: 10pt;
		color: black;
		font-family: "Times New Roman", Times, serif;
		padding-left: 10px;
		padding-right: 10px;
	}
	td.a-transkrip {
	font-size: 12pt;
		color: black;
		font-family: "Times New Roman", Times, serif;
		text-align: center;
	}
	table.a {
		font-size: 12px;
		color: black;
		border: 1px solid #999;
		font-family: "Times New Roman", Times, serif;
		padding: 10px;
	}
	table.a2 {
		font-size: 10pt;
		color: black;
		font-family: "Times New Roman", Times, serif;		
		padding: 10px;
	}
	table.b {
		font-size: 10pt;
		color: black;
	font-family: "Times New Roman", Times, serif;	
}
	p.b {
		font-size: 10pt;
		color: black;
	font-family: "Times New Roman", Times, serif;	
}
	p.c {
		font-size: 9pt;
		color: black;
	}
	p.a {
		font-size: 11px;
		color: black;
	}
	p.d {
		color: black;
	font-family: "Times New Roman", Times, serif;	
}
	table.c {
		font-size: 13px;
		color: black;
	}
	.page_break {
		page-break-before: always;
	}
</style>
<?php foreach ($skpibiodata as $sb): ?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<table width="100%" border="0">
					<tr>
						<td width="100%" align="center"><img src="assets/images/kop_2021.png" alt="" width="625px"></td>
					</tr>
				</table>
				<table width="100%" border="0">
					<tr>
						<td width="100%" align="center" class="a-transkrip"><strong>SURAT KETERANGAN PENDAMPING IJAZAH</strong>
							<br>
							<p class="b" align="center"> Nomor : <?php echo $sb['no_skpi'] ?></p>
							<p class="c" align="center">Surat keterangan pendamping ijazah (SKPI) ini
								dikeluarkan oleh AKADEMI FARMASI SURABAYA, <br> sebagai pelengkap ijazah
								yang menerangkan pencapaian pembelajaran pemegang ijazah.<br><em>The Diploma
								Supplement as a to Diploma that Describe
								Learning Outcomes and Achivements of the Holder of the Diploma during the
								Study
							Period.</em></p></td>
						</tr>
					</table>
					<table width="100%" class="b" style="border-collapse: collapse;">
						<tr>
							<td colspan="2">
								<p align="center"><strong>1.&nbsp; INFORMASI TENTANG IDENTITAS DIRI PEMEGANG
									SKPI</strong><br />
									<em>Information of Personal Information Diploma Supplement Holder</em>
								</p>
							</td>
						</tr>
						<tr>
							<td class="a2" width="" valign="top">
								<p class="style2">1.1 Nama Lengkap / <em>Full Name</em></p>
								<p align="center">
								<strong><?php echo ucwords(strtolower($sb['namalengkap'])) ?></strong></p>
							</td>
							<td class="a2" width="">
								<p class="style2">1.5 Tahun Masuk / <em>Enroll year</em></p>
								<p align="center"><strong><?php echo $sb['angkatan'] ?></strong></p>
							</td>
						</tr>
						<tr>
							<td class="a2" width="">
								<p class="style2">1.2 Tempat dan Tanggal Lahir / <em>Place and date of birth
								</em></p>
								<p align="center"><strong><?php echo ucwords(strtolower($sb['lahirmahasiswa'])) ?>,
								<?php echo tanggal($sb['tgllahirmahasiswa']) ?></strong></p>
							</td>
							<td class="a2" width="50%">
								<p class="style2">1.6 Tahun Lulus / <em>Graduation Year</em></p>
								<p align="center"><strong><?php echo $sb['tahun'] ?></strong></p>
							</td>
						</tr>
						<tr>
							<td class="a2" width="50%">
								<p class="style2">1.3 NIM / <em>Student identification number</em></p>
								<p align="center"><strong><?php echo $sb['nim'] ?></strong></p>
							</td>
							<td class="a2" width="50%">
								<p class="style2">1.7 Nomor Ijazah / <em>Certificate Serial Number</em> </p>
								<p align="center"><strong><?php echo $sb['no_ijazah'] ?></strong></p>
							</td>
						</tr>
						<tr>
							<td class="a2" width="50%">
								<p class="style2">1.4 Gelar / <em>Degree</em></p>
								<p align="center"><strong>A.Md.Farm.</strong></p>
							</td>
							<td class="a2" width="50%">&nbsp;</td>
						</tr>
					</table>
				</div>
				<!-- end row -->
				<div class="col-4 offset-2">
					<table style="border-collapse: collapse;" width="100%" class="b">
						<tr>
							<td colspan="2">
								<p align="center"><strong>2.&nbsp; INFORMASI TENTANG IDENTITAS PENYELENGGARA
									PROGRAM</strong><br />
								<em>Information of Identity Higher Education Institution</em></p>
							</td>
						</tr>
						<tr>
							<td class="a2" width="50%">
								<p class="style2">2.1 SK Ijin Operasional / <em>Operating
								Institution&rsquo;s License</em></p>
								<p align="center"><strong>192/E/O/2012&nbsp;&nbsp; Tanggal 21 Mei
								2012</strong></p>
							</td>
							<td class="a2" width="50%">
								<p class="style2">2.7 Persyaratan Penerimaan / <em>Entry Requirement</em>
								</p>
								<p align="center"><strong>Sekolah Menengah Atas dan yang Sederajat</strong>
								</p>
							</td>
						</tr>
						<tr>
							<td class="a2">
								<p class="style2">2.2 Nama Perguruan Tinggi /&nbsp; <em>Name of&nbsp;
								Institution</em></p>
								<p align="center"><strong>Akademi Farmasi Surabaya</strong></p>
							</td>
							<td class="a2">
								<p class="style2">2.8 Bahasa Pengantar Kuliah / <em>Language of
								Instruction</em></p>
								<p align="center"><strong>Bahasa Indonesia </strong></p>
							</td>
						</tr>
						<tr>
							<td class="a2">
								<p class="style2">2.3 Nama Program Studi / <em>Major</em></p>
								<p align="center"><strong>D-III Farmasi</strong></p>
							</td>
							<td class="a2">
								<p class="style2">2.9 Sistem Penilaian / <em>Grading System</em></p>
								<p align="center"><strong>Skala 1-4, A=4; AB=3,5; B=3; BC=2,5; C=2;
								D=1</strong></p>
							</td>
						</tr>
						<tr>
							<td class="a2">
								<p class="style2">2.4 Jenis Pendidikan / <em>Type of Education</em></p>
								<p align="center"><strong>Vokasi</strong></p>
							</td>
							<td class="a2">
								<p class="style2">2.10 Lama Studi Reguler / <em>Regular Length of Study</em>
								</p><?php $semester = ($sb['tahun'] - $sb['angkatan']) * 2?>
								<p align="center"><strong><?php echo $sb['tahun'] - $sb['angkatan'] ?>
								(<?php echo $semester ?> Semester)</strong></p>
							</td>
						</tr>
						<tr>
							<td class="a2">
								<p class="style2">2.5 Jenjang Pendidikan / <em>Level of</em> Education</p>
								<p align="center"><strong>Diploma III </strong></p>
							</td>
							<td class="a2">
								<p class="style2">2.11 Jenis dan Jenjang Pendidikan Lanjutan <em>/ Access to
								Further Study</em></p>
								<p align="center"><strong>Strata (S1) </strong></p>
							</td>
						</tr>
						<tr>
							<td class="a2">
								<p class="style2">2.6 Jenjang Kualifikasi sesuai KKNI /<br />
									<em>Level of Qualification in the National Qualification Framework</em>
								</p>
								<p align="center"><strong>Level 5 </strong></p>
							</td>
							<td class="a2">&nbsp;</td>
						</tr>
					</table>
				</div>
				<div id="footer">
					<p class="page" align="right ">akfarsurabaya.ac.id | Halaman <?php $PAGE_NUMS;?></p>
				</div>
				<div class="page_break">
					<p class="b" align="center"><strong>3.&nbsp; INFORMASI TENTANG KUALIFIKASI DAN HASIL
						YANG DICAPAI</strong><br />
					<em>Information on the Qualification and Outcomes Obtained</em></p>
					<table class="a2">
						<tr>
							<td>
								<p align="justify"><strong>3.1.&nbsp; CAPAIAN PEMBELAJARAN (CP) LULUSAN</strong><br />
								&nbsp;3.1.1. SIKAP</p>
								<ol class="jus">
									<li>Bertakwa  kepada Tuhan Yang Maha Esa dan mampu menunjukkan sikap religious </li>
									<li>Menjunjung tinggi nilai kemanusiaan dalam  menjalankan tugas berdasarkan agama,moral, dan etika </li>
									<li>Menginternalisasi nilai, norma, dan etika  akademik </li>
									<li>Berperan sebagai warga negara yang bangga  dan cinta tanah air, memiliki nasionalisme serta rasa tanggungjawab pada negara  dan bangsa </li>
									<li>Menghargai keanekaragaman budaya,  pandangan, agama, dan kepercayaan, serta pendapat atau temuan orisinal orang  lain</li>
									<li>Berkontribusi dalam peningkatan mutu  kehidupan bermasyarakat, berbangsa, bernegara, dan kemajuan peradaban berdasarkan  Pancasila </li>
									<li>Bekerja sama dan memiliki kepekaan sosial  serta kepedulian terhadap masyarakat dan lingkungan</li>
									<li>Taat hukum dan disiplin dalam kehidupan  bermasyarakat dan bernegara </li>
									<li>Menginternalisasi semangat kemandirian,  kejuangan, dan kewirausahaan</li>
								</ol>
							</td>
						</tr>
						<tr>
							<td>
								<p align="justify">&nbsp;3.1.2. KETERAMPILAN UMUM</p>
								<ol class="jus">
									<li>Mampu menyelesaikan pekerjaan berlingkup  luas dan menganalisis data dengan beragam metode yang sesuai, baik yang belum  maupun yang sudah baku; </li>
									<li>Mampu menunjukkan kinerja bermutu dan  terukur </li>
									<li>Mampu memecahkan masalah pekerjaan dengan  sifat dan konteks yang sesuai dengan bidang keahlian terapannya didasarkan pada  pemikiran logis, inovatif, dan bertanggung jawab atas hasilnya secara mandiri </li>
									<li>Mampu menyusun laporan hasil dan proses  kerja secara akurat dan sahih serta mengomunikasikannya secara efektif kepada  pihak lain yang membutuhkan</li>
									<li>Mampu melakukan proses evaluasi diri  terhadap kelompok kerja yang berada dibawah tanggung jawabnya, dan mengelola  pengembangan kompetensi kerja secara mandiri </li>
									<li>Mampu mendokumentasikan, menyimpan,  mengamankan, dan menemukan kembali data untuk menjamin kesahihan dan mencegah  plagiasi
									</ol>
								</td>
							</tr>
							<tr>
								<td>
									<p align="justify">&nbsp;3.1.3. KETERAMPILAN KHUSUS</p>
									<ol class="jus">
										<li>Teknisi Pelayanan dan Penyuluh Informasi Kefarmasian:</li>
										<ol type="a" class="sub">
											<li>Mampu  menyelesaikan pekerjaan berlingkup luas dan menganalisis data dengan beragam  metode yang sesuai, baik yang belum maupun yang sudah baku. </li>
											<li>Mampu  menunjukkan kinerja bermutu dan terukur </li>
											<li>Mampu  memecahkan masalah pekerjaan dengan sifat dan konteks yang sesuai dengan bidang  keahlian terapannya, didasarkan pada pemikiran logis, inovatif, dan  bertanggungjawab atas hasilnya secara mandiri. </li>
											<li>Mampu  memberikan pelayanan , informasi, edukasi dan swamedikasi terhadap pasien  mengenai obat bebas, bebas terbatas dan obat tradisional serta perbekalan  farmasi lainnya </li>
											<li>Mampu  menyusun laporan hasil dan proses kerja secara akurat dan sahih, serta  mengomunikasikannya secara efektif kepada pihak lain yang membutuhkan </li>
											<li>Mampu bekerja sama, berkomunikasi, dan  berinovatif dalam pekerjaannya </li>
											<li>Menguasai  konsep teoritis tentang ilmu yang kesehatan masyarakat </li>
											<li>Menguasai  teori mengenai undang undang kebijakan pemerintah dan sistem kesehatan tentang  program kesehatan nasionalstandart</li>
										</ol>
									</td>
								</tr>
								<tr>
									<td>
										<ol class="jus" start="2">
											<li>Teknisi pembuatan sediaan farmasi:</li>
											<ol class="sub" type="a">
												<li>Mampu  bertanggungjawab atas pecapaian hasil kerja kelompok&nbsp; dan melakukan supervise da evaluasi terhadap  penyelesaian pekejaan yang ditugaskan kepada pekerja yang berada dibawah  tanggungjawabnya. </li>
												<li>Mampu  melakukan proses evaluasi diri terhadap kelompok kerja yang berada dibwah  tanggungjawabnya, dan mengelola pengembangan kompetensi kerja secara mandiri</li>
												<li>Mampu  mendokumentasikan, menyimpan, mengamankan, dan menemukan Kembali data untuk  menjamin kesahihan dan mencegah plagiasi.</li>
											</ol>
										</ol>
									</td></tr>
									<tr><td><ol start="3" class="jus">
										<li>Pelaksana pengelolaan obat:</li>
										<ol type="a" class="sub">
											<li>Menguasai  konsep teoritis dan prinsip manajemen secara umum dan managemen pengelolaan  perbekalan farmasi meliputi inventarisasi, distribusi, penyimpanan, pemasaran  dan pembuatan laporan</li>
											<li>Mampu  membuat perencanaan, pengadaan, penerimaan penyimpanan pendistribusian, pencatatan  dan pelaporan obat dan sediaan farmasi lain dibawah pengawasan apoteker</li>
											<li>Melakukan  monitoring terhadap penggunaan obat, efek samping, barang expired, barang  obsolet serta proses penanganan dan pemusnahannya dibawah pengawasan apoteker</li>
										</ol>
									</ol>
								</td></tr>
								<tr><td>
									<ol start="4" class="jus"><li>Asisten peneliti:</li>
									<ol class="sub" type="a">
										<li>Menguasai  konsep teoritis mengenai klasifikasi penelitian berdasarkan metodenya, masalah  masalah dalam penelitian, hipotesis, sampel, alat penelitian dan tipe/desain  penelitian terutama yang berkaitan dengan kesehatan</li>
										<li>Mampu  untuk memilih beragam metode, teknik penelitian dan cara mengumpulkan data  penelitian</li>
										<li>Mampu  untuk menyiapkan, memaparkan, menyusun dan menguraian data hasil penelitian  serta menyusun laporan penelitian.</li>
									</ol></ol>
								</td></tr>
								<tr><td>
									<ol start="5" class="jus">
										<li>Wirausahawan:</li>
										<ol class="sub" type="a">
											<li>Mampu  berkomunikasi dan menciptakan kerja sama yang baik dan dapat bekerjasama dalam  suatu tim dalam berkewirausahaan.</li>
											<li>Mampu  berpikir kreatif, inovatif dan produktif serta bertanggungjawab dalam  mengevaluasi kerja kelompok dibawah tanggungjawabnya pada proses manajemen,  produksi, pemasaran dan berwirausaha</li>
											<li>Mampu  berwirausaha dibidang kefarmasian khusunya farmasi bahan alam. </li>
										</ol>
									</ol>
								</td></tr>
								<tr>
									<td>
										<p><strong>3.2. INFORMASI TAMBAHAN<br />
											3.2.1 Prestasi dan Penghargaan / <em>Achievements and
											Awards</em></strong>
											<ul class="jus">
												<?php if (count($skpiprestasi) < 1): ?>
												<br>
												<br>
												<br>
												<?php else: ?>
												<?php foreach ($skpiprestasi as $sp): ?>
												<?php $kegiatan = $sp['nama'];?>
												<?php $kegiatan = str_ireplace('<p>', '', $kegiatan);
												$kegiatan                   = str_ireplace('</p>', '', $kegiatan);?>
												<?php $peran    = strtolower($sp['sebagai']);?>
												<li><?php if ($sp['mulai'] !== null && $sp['selesai'] !== null): ?>
													<?php echo ucwords($kegiatan); ?> Pada Tanggal
													<?php echo tanggal($sp['mulai']) ?> Sampai
													<?php echo tanggal($sp['selesai']) ?> Sebagai
													<?php echo ucwords($peran); ?>
													<?php elseif ($sp['mulai'] !== null && $sp['selesai'] == null): ?>
													<?php echo ucwords($kegiatan) ?> Pada Tanggal
													<?php echo tanggal($sp['mulai']) ?> Sebagai
													<?php echo ucwords($peran); ?>
													<?php elseif ($sp['mulai'] == null && $sp['selesai'] !== null): ?>
													<?php echo ucwords($kegiatan) ?> Pada Tanggal
													<?php echo tanggal($sp['selesai']) ?> Sebagai
													<?php echo ucwords($peran); ?>
													<?php else: ?>
													<?php echo ucwords($kegiatan) ?> Sebagai <?php echo ucwords($sp['sebagai']) ?>
												<?php endif?> </li>
												<?php endforeach;?>
												<?php endif?>
											</ol>
										</td>
									</tr>
									<tr>
										<td>
											<p><strong>3.2.2&nbsp; Keikutsertaan dalam Organisasi /<em>
												Participation in Organization</em></strong>
												<ul class="jus"><?php if (count($skpiorganisasi) < 1): ?>
													<br>
													<br>
													<?php else: ?>
													<?php foreach ($skpiorganisasi as $so): ?>
													<?php $kegiatan = $so['nama'];?>
													<?php $kegiatan = str_ireplace('<p>', '', $kegiatan);
													$kegiatan                    = str_ireplace('</p>', '', $kegiatan);?>
													<?php $peran    = strtolower($so['sebagai']);?>
													<li><?php if ($so['mulai'] !== null && $so['selesai'] !== null): ?>
														<?php echo ucwords($kegiatan); ?> Pada Tanggal
														<?php echo tanggal($so['mulai']) ?> Sampai
														<?php echo tanggal($so['selesai']) ?> Sebagai
														<?php echo ucwords($peran); ?>
														<?php elseif ($so['mulai'] !== null && $so['selesai'] == null): ?>
														<?php echo ucwords($kegiatan) ?> Pada Tanggal
														<?php echo tanggal($so['mulai']) ?> Sebagai
														<?php echo ucwords($peran); ?>
														<?php elseif ($so['mulai'] == null && $so['selesai'] !== null): ?>
														<?php echo ucwords($kegiatan) ?> Pada Tanggal
														<?php echo tanggal($so['selesai']) ?> Sebagai
														<?php echo ucwords($peran); ?>
														<?php else: ?>
														<?php echo ucwords($kegiatan) ?> Sebagai <?php echo ucwords($peran) ?>
													<?php endif?> </li>
													<?php endforeach;?>
													<?php endif?>
												</ul>
											</td>
										</tr>
										<tr>
											<td>
												<p><strong>3.2.3&nbsp; Sertifikat Keahlian / <em>Competency
												Certificate</em></strong></p>
												<ul class="jus">
													<li>Sertifikat Kompetensi Tenaga Teknis Kefarmasian Persatuan
													Ahli Farmasi Indonesia </li>
												</td>
											</tr>
											<tr>
												<td>
													<p><strong>3.2.4&nbsp; Praktek Kerja Lapangan / <em>Practice Working
													and Intership</em></strong></p>
													<ul class="jus"><?php if (count($skpipkl) < 1): ?>
														<br>
														<?php else: ?>
														<?php foreach ($skpipkl as $sk): ?>
														<?php $kegiatan = $sk['nama'];?>
														<?php $kegiatan = str_ireplace('<p>', '', $kegiatan);
														$kegiatan                     = str_ireplace('</p>', '', $kegiatan);?>
														<?php $peran    = strtolower($sk['sebagai']);?>
														<li><?php if ($sk['mulai'] !== null && $sk['selesai'] !== null): ?>
															<?php echo ucwords($kegiatan); ?> Pada Tanggal
															<?php echo tanggal($sk['mulai']) ?> Sampai
															<?php echo tanggal($sk['selesai']) ?>
															<?php elseif ($sk['mulai'] !== null && $sk['selesai'] == null): ?>
															<?php echo ucwords($kegiatan) ?> Pada Tanggal
															<?php echo tanggal($sk['mulai']) ?>
															<?php elseif ($sk['mulai'] == null && $sk['selesai'] !== null): ?>
															<?php echo ucwords($kegiatan) ?> Pada Tanggal
															<?php echo tanggal($sk['selesai']) ?>
															<?php else: ?>
															<?php echo ucwords($kegiatan) ?>
														<?php endif?> </li>
														<?php endforeach;?>
														<?php endif?>
													</ul>
												</td>
											</tr>
											<tr>
												<td>
													<p><strong>3.2.5&nbsp; Karya Tulis Ilmiah / <em>Sainstification
													Papper</em> </strong></p>
													<ul class="jus">
														<?php if ($sb['judul'] == null): ?>
														<?php $karya = $judul_kti['0']['kti'];?>
														<?php $karya = str_ireplace('<p>', '', $karya);
														$karya                       = str_ireplace('</p>', '', $karya);
														$karya                       = str_ireplace('<br>', ' ', $karya);
														$karya                       = str_ireplace('</br>', ' ', $karya);
														$karya                       = str_ireplace('<br/>', ' ', $karya);
														$karya                       = str_ireplace('<br />', ' ', $karya);?>
														<?php echo $karya ?>
														<?php else: ?>
														<?php echo $sb['judul'] ?>
														<?php endif?>
													</ul>
												</td>
											</tr>
										</table>
									</div>
									<div class="col-4 offset-2 page_break">
										<table width="100%" class="b">
											<tr>
												<td>
													<p align="center"><strong>4.&nbsp; INFORMASI TENTANG PENDIDIKAN TINGGI DI
														INDONESIA DAN KERANGKA KUALIFIKASI </strong><br />
														<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NASIONAL
														INDONESIA / </strong><em>Information of Higher Education System
													Framework</em></p>
												</td>
											</tr>
											<tr>
												<td class="a3">
													<p align="justify">
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pendidikan
														Tinggi adalah jenjang pendidikan setelah pendidikan menengah yang
														mencakup program diploma, program sarjana, program magister, program
														doktor, program profesi, program spesialis yang diselenggarakan oleh
														perguruan tinggi berdasarkan kebudayaan bangsa Indonesia.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Standar
														Nasional Pendidikan Tinggi adalah satuan standar yang meliputi standar
														nasional pendidikan, ditambah dengan standar penelitian, dan standar
														pengabdian kepada masyarakat.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pendidikan
														vokasi merupakan Pendidikan Tinggi program diploma yang menyiapkan
														Mahasiswa untuk pekerjaan dengan keahlian terapan tertentu sampai
														program sarjana terapan.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Akademi adalah Perguruan Tinggi yang menyelenggarakan pendidikan vokasi
														dalam satu atau beberapa cabang ilmu pengetahuan dan atau teknologi
														tertentu.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Program
														Studi adalah kesatuan kegiatan Pendidikan dan pembelajaran yang memiliki
														kurikulum dan metode pembelajaran tertentu dalam satu jenis pendidikan
														akademik, pendidikan profesi, dan/atau pendidikan vokasi.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Kurikulum pendidikan tinggi merupakan seperangkat rencana dan pengaturan
														mengenai tujuan, isi, dan bahan ajar serta cara yang digunakan sebagai
														pedoman penyelenggaraan kegiatan pembelajaran untuk mencapai tujuan
														Pendidikan Tinggi. Kurikulum Pendidikan Tinggi dikembangkan oleh setiap
														Perguruan Tinggi dengan mengacu pada Standar Nasional Pendidikan Tinggi
														untuk setiap Program Studi yang mencakup pengembangan kecerdasan
														intelektual, akhlak mulia, dan keterampilan.&nbsp; <br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Satuan
														Kredit Semester (SKS) adalah takaran waktu kegiatan belajar yang
														dibebankan pada mahasiswa per minggu per semester dalam proses
														pembelajaran melalui berbagai bentuk pembelajaran atau besarnya
														pengakuan atas keberhasilan usaha mahasiswa dalam mengikuti kegiatan
														kurikuler di suatu program studi.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Satu
														SKS setara dengan 160 (seratus enam puluh) menit kegiatan belajar per
														minggu per semester. Setiap mata kuliah paling sedikit memiliki bobot 1
														(satu) SKS. Semester merupakan satuan waktu kegiatan pembelajaran
														efektif selama 16 (enam belas) minggu.
														<ul>1 (satu) SKS pada bentuk pembelajaran kuliah, responsi dan tutorial,
															mencakup:
															<li> Kegiatan belajar dengan tatap muka 50 (lima puluh) menit per
															minggu per semester;</li>
															<li> Kegiatan belajar dengan penugasan terstruktur 50 (lima puluh)
															menit per minggu per semester</li>
															<li> Kegiatan belajar mandiri 60 (enam puluh) menit per minggu per
															semester.</li>
														</ul>
														<ul>1 (satu) SKS pada bentuk pembelajaran seminar atau bentuk
															pembelajaran lain yang sejenis, mencakup:
															<li>Kegiatan belajar tatap muka 100 (seratus) menit per minggu per
															semester; dan</li>
															<li>Kegiatan belajar mandiri 60 (enam puluh) menit per minggu per
															semester.</li>
														</ul>
														<ul>1 (satu) SKS pada bentuk pembelajaran praktikum, praktik studio,
															praktik bengkel, praktik lapangan, penelitian, pengabdian kepada
															masyarakat, dan/atau bentuk pembelajaran lain yang setara, adalah
														160 (seratus enam puluh) menit per minggu per semester.</ul>
													</p>
												</td>
											</tr>
										</table>
									</div>
									<table width="100%" class="b">
										<tr>
											<td class="a3">
												<p align="justify">
													<p align="justify">
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Beban normal belajar mahasiswa adalah 8 (delapan) jam per hari atau
														48 (empat puluh delapan) jam per minggu setara dengan 18 (delapan
														belas) sks per semester, sampai dengan 9 (sembilan) jam per hari
														atau 54 (lima puluh empat) jam per minggu setara dengan 20 (dua
														puluh) sks per semester.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Untuk memenuhi capaian pembelajaran, lulusan program diploma tiga
														wajib menempuh beban belajar paling sedikit 108 SKS dengan masa
														studi tiga (3) sampai empat (4) tahun. Lulusan program diploma tiga
														paling sedikit menguasai konsep teoritis bidang pengetahuan dan
														keterampilan tertentu secara umum.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Ijazah diberikan kepada lulusan pendidikan akademik dan pendidikan
														vokasi sebagai pengakuan terhadap prestasi belajar dan/atau
														penyelesaian suatu program studi terakreditasi yang diselenggarakan
														oleh Perguruan Tinggi. Ijazah diterbitkan oleh Perguruan Tinggi yang
														memuat Program Studi dan gelar yang berhak dipakai oleh lulusan
														Pendidikan Tinggi.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Sertifikat kompetensi merupakan pengakuan kompetensi atas prestasi
														lulusan yang sesuai dengan keahlian dalam cabang ilmunya dan/atau
														memiliki prestasi di luar program studinya. Serifikat kompetensi
														diterbitkan oleh Perguruan Tinggi bekerja sama dengan organisasi
														profesi, lembaga pelatihan, atau lembaga sertifikasi yang
														terakreditasi kepada lulusan yang lulus uji kompetensi.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Kerangka Kualifikasi Nasional Indonesia, yang selanjutnya disingkat
														KKNI, adalah kerangka penjenjangan kualifikasi kompetensi yang dapat
														menyandingkan, menyetarakan, dan mengintegrasikan antara bidang
														pendidikan dan bidang pelatihan kerja serta pengalaman kerja dalam
														rangka pemberian pengakuan kompetensi kerja sesuai dengan struktur
														pekerjaan di berbagai sektor.<br />
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														KKNI merupakan perwujudan mutu dan jati diri Bangsa Indonesia
														terkait dengan sistem pendidikan dan pelatihan nasional yang
														dimiliki Indonesia. KKNI terdiri dari 9 (sembilan) jenjang
														kualifikasi, dimulai Kualifikasi-1 sebagai kualifikasi terendah dan
														Kualifikasi-9 sebagai kualifikasi tertinggi. Lulusan Program Diploma
													Tiga setara dengan jenjang Kualifikasi - 5 dari KKNI.</p>
												</p>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-4 offset-2">
									<table width="100%" class="b">
										<tr>
											<td>&nbsp;</td>
											<td align="center"><img src="assets/images/skpi-akuntabilitas.jpg" width="403">
											</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td align="center"><p class="b" align="center">Ditetapkan di Surabaya,
											<?php echo tanggal($sb['date']) ?></p>
										</td>
										<td>&nbsp;</td>
									</table>
								</div>
								<div class="col-4 offset-2">
									<table width="100%" class="b">
										<tr>
											<td width="220">&nbsp;</td>
											<td width="80"> &nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td>
												<p class="b" align="center">WAKIL DIREKTUR I<br />
												BIDANG AKADEMIK DAN KEMAHASISWAAN</p>
											</td>
											<td>&nbsp;</td>
											<td>
												<p class="b" align="center">DIREKTUR<br />
												AKADEMI FARMASI SURABAYA</p>
											</td>
										</tr>
										<tr>
											<td height="30">&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td> 
												<p class="b" align="center"><u>M.A. Hanny Ferry Fernanda, S.Farm., M.Farm., Apt.</u><br>NIDN. 0726018802</p>
											</td>
											<td>&nbsp;</td>
											<td>
												<p class="b" align="center"><u>Ninik Mas Ulfa, S.Si., Apt., Sp.FRS.</u><br>NIDN.
												0701027504</p>
											</td>
										</tr>
									</table>
								</div>
								<div class="row mt-3">
								</div>
							</div>
						</div>
						<!-- end row -->
						</div> <!-- container -->
						</div> <!-- content -->
						<div id="footer">
							<p class="page" align="right ">akfarsurabaya.ac.id | Halaman <?php $PAGE_NUMS;?></p>
						</div>
						<?php endforeach;?>