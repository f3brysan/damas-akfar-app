<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title">EKD <?php foreach ($ekd_selected as $es): ?> <?php echo $es['nama'] ?>, <?php echo $es['gelarbelakang'] ?>
                        Semester <?php echo $es['semester'] ?>, Tahun Ajaran <?php echo $es['tahunajaran'] ?>
                    <?php endforeach ?> </h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>                                
                                <th>Persentase Terisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php if (is_array($matkul_list) && count($matkul_list) > 0): ?>                            
                            <?php $no = 1;
                            foreach ($matkul_list as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['rel_matkul'] ?></td>
                                <td><?php echo $m['nama'] ?></td>   
                                <td> <?php if($m['kuis'] >= $m['soal']): ?> 
                            100%
                            <?php else: ?>
                                <?php $hasil = $m['kuis']/$m['soal']*100;
                                $hasil = number_format($hasil);
                                echo $hasil.' %'; ?>
                            <?php endif ?>
                            </td>                             
                                <td>
                                    <a href="<?php echo site_url("prodi/detil_ekd_dosen/") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-info"><i class="fa fa-line-chart"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div> <!-- end row -->
            <!-- Modal Ubah -->
            <!-- END Modal Ubah -->
            </div> <!-- container -->
            </div> <!-- content -->