<legend><?php echo $title;?></legend>
<a class="btn btn-default" href="<?php echo site_url('laporan/cetakBuku');?>">Cetak Laporan</a>
<hr>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Buku</td>
            <td>Nama</td>
            <td>Edisi</td>
            <td>Pengarang</td>
            <td>Klasifikasi</td>
            <td>Stok</td>
        </tr>
    </thead>
    <?php $no=0; foreach($buku as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->no_buku;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->edisi;?></td>
        <td><?php echo $row->nama_pengarang;?></td>
        <td><?php foreach($klas as $kl){if($kl->no_klas == $row->no_klas) echo $kl->nama;}?></td>
        <td><?php echo $row->stok;?></td>
    </tr>
    <?php endforeach;?>
</table>