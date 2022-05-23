<style type="text/css">

    td {
        cursor: pointer;
    }

    .editor{
        display: none;
    }

</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Nilai</h4>                    
                    <table id="table-data" class="table table-striped">

                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>

                        <tbody id="table-body">
                            <?php
                            $no = 1;
                            foreach ($get as $member) {
                                echo "
                                <tr data-id='$member[id]'>
                                <td><span class='span-nim' data-id='$member[id]'>$member[nim]</span></td>
                                <td><span class='span-nama' data-id='$member[id]'>$member[namalengkap]</span></td>
                                <td><span class='span-nilai caption' data-id='$member[id]'>$member[nilai]</span> <input type='text' class='field-nilai form-control editor' value='$member[nilai]' data-id='$member[id]' /></td>
                                </tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div> <!-- end row -->
        <!-- Modal Ubah -->
        <!-- END Modal Ubah -->
    </div> <!-- container -->
</div> <!-- content -->
