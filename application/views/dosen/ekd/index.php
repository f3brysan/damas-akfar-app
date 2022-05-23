<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title">Evaluasi Kinerja Dosen : <?php foreach ($getdosen as $es): ?> <?php echo $es['nama'] ?>, <?php echo $es['gelarbelakang'] ?>                        
                    <?php endforeach ?> </h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>                                
                                <th>Tahun Ajaran</th>
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
                                <td><?php echo $m['semester'] ?> <?php echo $m['tahunajaran'] ?></td>                             
                                <td>
                                    <a href="<?php echo site_url("dosen/detil_hasil_ekd/$m[rel_tahunajaran]/$m[rel_matkul]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-info"><i class="fa fa-line-chart"></i></a>
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