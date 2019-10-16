<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Peminjaman</td>
            <td>Tanggal Pengembalian</td>
        </tr>
    </thead>
    <?php $no=0; foreach($lap as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><a href="<?php echo site_url('laporan/detail_pinjam/'.$row->no_peminjaman);?>"><?php echo $row->no_peminjaman;?></a></td>
        <td><?php echo $row->tanggal_kembali;?></td>
    </tr>
    <?php endforeach;?>
</table>