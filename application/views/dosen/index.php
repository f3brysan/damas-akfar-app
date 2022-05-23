<!-- Start Page content -->
<div class="content">
	<div class="container-fluid">
		
		<div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Mahasiswa</h4>                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>    
                                <th>Nama </th>
                                <th>Reguler </th>
                                <th>Kelas </th>
                                <th>Tahun Ajaran</th>      
                                <th>Aksi</th>                                                                                       
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if (is_array($wali) && count($wali)>0): ?>
                        		
                        	
                            <?php $no = 1;
foreach ($wali as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['nim'] ?></td>
                                <td><?php echo $m['namalengkap'] ?></td>
                                <td><?php echo $m['reguler'] ?></td>                                  
                                <td><?php echo $m['kelas'] ?></td>     
                                <td><?php echo $m['tahun_ajaran']; ?></td>                                                           
                                <td><a href="<?php echo site_url('dosen_wali'); ?>/khs_semester/<?php echo $m['nim'] ?>" class="btn btn-primary" target="_blank">KHS</a>
                                &nbsp;
                                <?php 
                                    if($m['status_krs'] == NULL) {
                                        // echo '<a href="javascript:void(0)" class="btn btn-danger">Belum mengajukan KRS</a>';
                                    } else {
                                        echo '<a href="'.site_url('dosen_wali/krs/').$m['nim'].'" class="btn btn-warning">Lihat KRS</a>&nbsp;';
                                        if($m['status_krs'] == 0) {
                                            echo '<a class="btn btn-success" href="'.site_url('dosen_wali/setujui_krs/').$m['nim'].'" role="button"><i class="fi-circle-check"></i>&nbsp;Setujui KRS</a>';
                                        } elseif($m['status_krs'] == 1) {
                                            echo '<a class="btn btn-danger" href="'.site_url('dosen_wali/batalkan_krs/').$m['nim'].'/'.$m['tahun_ajaran'].'" role="button"><i class="fi-trash"></i>&nbsp;Batalkan KRS</a>';
                                        }
                                    }
                                ?>
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
            </div>
	</div> <!-- container -->
</div> <!-- content -->
		<!-- Start Page content -->