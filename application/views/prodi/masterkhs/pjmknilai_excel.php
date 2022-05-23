<?php 
header ( "Content-type: application/vnd.ms-excel; charset=utf-8" );
header ( "Content-Disposition: attachment; filename=percobaan.xls" );
?>
<!DOCTYPE html>
<table border="1px">
    <thead>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>NILAI</th>
        </tr>
    </thead>

    <tbody id="table-body">
        <?php
        $no = 1;
        foreach ($get as $member) {
            echo "
            <tr data-id='$member[id]'>
            <td><span class='span-nim' data-id='$member[id]'>$kodematkul</span></td>
            <td><span class='span-nim' data-id='$member[id]'>$member[nim]</span></td>
            <td><span class='span-nama' data-id='$member[id]'>$member[namalengkap]</span></td>
            <td><div class='span-nilai caption' data-id='$member[id]'>$member[nilai]</div><input step=0.01 type='number' class='field-nilai form-control editor' value='' data-id='$member[id]' /></td>
            </tr>";
        }
        ?>
    </tbody>

</table>
