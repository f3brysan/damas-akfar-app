<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title">Daftar EKD Dosen <?php foreach ($ekd_selected as $es): ?>
                        Semester <?php echo $es['semester'] ?>, Tahun Ajaran <?php echo $es['tahunajaran'] ?>
                    <?php endforeach ?> </h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIDN</th>
                                <th>Nama Dosen</th>                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php if (is_array($dosen_list) && count($dosen_list) > 0): ?>                            
                            <?php $no = 1;
                            foreach ($dosen_list as $d): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['rel_nidn'] ?></td>
                                <td><?php if ($d['gelardepan']!=NULL): ?>
                                    <?php echo $d['gelardepan'] ?>.                                                                     
                                <?php endif ?><?php echo $d['nama'] ?>, <?php echo $d['gelarbelakang'] ?></td>                                
                                <td>
                                    <a href="<?php echo site_url("prodi/detil_ekd_dosen/$d[rel_tahunajaran]/$d[rel_nidn]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-info" target="_blank"><i class="fa fa-line-chart"></i></a>
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