<!-- Start Page content -->
<?php
if ($pickedkrs == null) {
$krsDiambil = 0;
} else {
$krsDiambil = count($pickedkrs);
}
?>
<?php
$ekd_dosen = (int)$ekd['0']['total'];
$fill_dosen = (int)$ekd_dosen_filled['0']['filled'];
?>
<?php if ($verifikasi == null): ?>
<div class="alert alert-danger" role="alert">
    Anda memiliki administrasi yang belum terselesaikan dibagian <strong>Keuangan</strong>.<br>
    Harap Segera Menghubungi 0821 3150 7773 (Keuangan AFS).
    <!-- Anda Belum Memverifikasikan <strong>Bukti Pembayaran </strong>Semester
    <?php echo $cek->semester; ?> Tahun Ajaran <?php echo $cek->tahunajaran; ?> ke BAAK! -->
</div>
<?php elseif ($ekd_dosen > $fill_dosen): ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Koresponden Evaluasi Kinerja Dosen</h4>
                    <div class="row">
                        <?php if ((is_array($get_ekd) && count($ekd) > 0)): ?>
                        
                        <?php foreach ($get_ekd as $ekd): ?>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <?php if ($ekd['jenis_status'] == 'dosen'): ?>
                                    <?php $persen_dosen = number_format($fill_dosen/$ekd_dosen*100) ?>
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                    data-fgColor="#2d7bf4" value="<?php echo $persen_dosen; ?>" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".1"/>
                                    <?php endif ?>
                                </div>
                                <div class="widget-chart-two-content">
                                    <h5>EKD <?php echo strtoupper($ekd['jenis_status']); ?></h5>
                                    <?php if ($ekd['jenis_status'] == 'dosen'): ?>
                                    <?php if ($ekd_dosen!=$fill_dosen): ?>
                                    <a href="<?php echo site_url("mahasiswa/survey_ekd/$ekd[jenis_status]/$ekd[nim]") ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-external-link"></i> Masuk</a>
                                    <?php else: ?>
                                    <a href="<?php echo site_url("mahasiswa/survey_ekd/$ekd[jenis_status]/$ekd[nim]") ?>" class="btn btn-success waves-effect waves-light disabled"><i class="fa fa-external-link"></i> Sudah Terisi</a>
                                    <?php endif ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach?>
                        <?php endif ?>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->
        </div> <!-- container -->
        </div> <!-- content -->
        <?php else: ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30"> Halaman Kartu Rencana Studi Mahasiswa</h4>
                                
                                <?php
                                $limit = 24;
                                if ($sks <= $limit): ?>
                                <div class="col col-xs-12 text-right">
                                    <?php if ($ajukan_krs == null): ?>
                                    <?php if ($krsDiambil > 0): ?>
                                    <form role="form" action="<?php echo base_url('mahasiswa/ajukan_krs') ?>" method="post" enctype="multipart/form-data" >
                                        <input type="submit" name="sbmt" class="btn btn-primary" value="Ajukan KRS" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
                                    </form>
                                    <?php endif ?>
                                    <?php else: ?>
                                    <?php if ($ajukan_krs->status == 0): ?>
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        Proses Validasi, Hubungi Dosen Pembimbing Akademik Anda
                                    </div>
                                    <?php else: ?>
                                    <?php if ($cek->status == 0): ?>
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <p align="left"> <strong>Info :</strong> Pengambilan KRS telah ditutup. Silahkan hubungi BAA jika terkendala dalam pengambilan KRS.</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php endif ?>
                                    <a class="btn btn-success"> KRS Telah Disetujui</a> <a class="btn btn-primary" href="<?php echo site_url("mahasiswa/cetak_krs") ?>"> Cetak</a>
                                    <?php endif ?>
                                    <?php endif ?>
                                    
                                </div>
                                <?php else: ?>
                                <div class="alert alert-danger" role="alert">
                                    Maaf jumlah SKS anda melebihi dari ketentuan batas (24 SKS). Mohon diambil sebijak mungkin.
                                </div>
                                <?php endif?>
                                <br>
                                <form action="<?php echo base_url('mahasiswa/insert_krs') ?>" method="post" enctype="multipart/form-data" role="form">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Mata Kuliah </th>
                                                <th>Nama Mata Kuliah</th>
                                                <th>SKS</th>
                                                <th>Semester</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($krsDiambil > 0): ?>
                                            <?php $no = 1;
                                            foreach ($pickedkrs as $pk): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $pk['kode'] ?></td>
                                                <td><?php echo $pk['nama'] ?></td>
                                                <td><?php echo $pk['sks'] ?></td>
                                                <td><?php echo $pk['semester'] ?></td>
                                                <td>
                                                    <?php if ($cek->status == 0): ?>
                                                       <a onclick="return confirm('Anda yakin menghapus matakuliah <?php echo $pk['nama']; ?> dari pilihan? ?');" data-toggle="tooltip" title="Hapus?" class="btn btn-success disabled"><em class="fa fa-check"></em></a> 
                                                        <?php else: ?>
                                                            <a href="<?php echo site_url("mahasiswa/hapuspilihankrs/$pk[idstudi]/$pk[idmatkul]") ?>" onclick="return confirm('Anda yakin menghapus matakuliah <?php echo $pk['nama']; ?> dari pilihan? ?');" data-toggle="tooltip" title="Hapus?" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                                    <?php endif ?>
                                                    
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        <?php else: ?>
                                        <div class="alert alert-danger" role="alert">
                                            Anda Belum Mengambil KRS Untuk Semester
                                            <?php echo $cek->semester; ?> Tahun Ajaran <?php echo $cek->tahunajaran; ?>!
                                        </div>
                                        <?php endif?>
                                    </table>
                                    <h4 class="header-title m-t-0 m-b-30"> Total SKS yang diambil saat ini : <?php echo $sks; ?> SKS.</h4>
                                </form>
                            </div>
                            </div> <!-- end col -->
                            <div class="col-lg-12">
                                <div id="accordion" role="tablist" aria-multiselectable="true" class="m-b-30">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTwo">
                                            <h5 class="mb-0 mt-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Daftar Mata Kuliah Yang Tersedia
                                            </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="card-body">
                                                <form action="<?php echo base_url('mahasiswa/insert_krs') ?>" method="post" enctype="multipart/form-data" role="form">
                                                    <div class="col col-xs-12 text-right">
                                                        <?php if ($cek->status == 0): ?>
                                                        <a href="" class="btn btn-danger disabled"><i class="fa fa-close"></i> KRS Ditutup</a>
                                                        <?php else: ?>
                                                        <input type="submit" name="sbmt" class="btn btn-primary" value="Ambil" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
                                                        <?php endif ?>
                                                        
                                                    </div>
                                                    <hr>
                                                    <table class="table table-sm table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode Mata Kuliah </th>
                                                                <th>Nama Mata Kuliah</th>
                                                                <th>SKS</th>
                                                                <th>Semester</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (count($datakrs) > 0): ?>
                                                            <?php $no = 1;
                                                            foreach ($datakrs as $m): ?>
                                                            <tr>
                                                                <td><?php echo $no++; ?></td>
                                                                <td><?php echo $m['kode'] ?></td>
                                                                <td><?php echo $m['nama'] ?></td>
                                                                <td><?php echo $m['sks'] ?></td>
                                                                <td><?php echo $m['semester'] ?></td>
                                                                <td>
                                                                    <input type="checkbox" name="kode[]" value="<?php echo $m['kode'] ?>">
                                                                </td>
                                                            </tr>
                                                            <?php endforeach;?>
                                                        </tbody>
                                                        <?php else: ?>
                                                        -
                                                        <?php endif?>
                                                    </table>
                                                    <div class="col col-xs-12 text-right">
                                                        <?php if ($cek->status == 0): ?>
                                                        <a href="" class="btn btn-danger disabled"><i class="fa fa-close"></i> KRS Ditutup</a>
                                                        <?php else: ?>
                                                        <input type="submit" name="sbmt" class="btn btn-primary" value="Ambil" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">
                                                        <?php endif ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif?>
                        </div>
                    </div>
                </div>
                </div> <!-- container -->
                </div> <!-- content -->