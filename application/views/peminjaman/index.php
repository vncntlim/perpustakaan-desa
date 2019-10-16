<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('peminjaman/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nomor Peminjaman</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('peminjaman/baru');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Peminjaman</td>
            <td>Nama Anggota</td>
            <td>Nama Petugas</td>
        </tr>
    </thead>
    <?php $no=0; foreach($peminjaman as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->no_peminjaman;?></td>
        <td><?php foreach($anggota as $ang){if($ang->no_anggota == $row->no_anggota) echo $ang->nama;}?></td>
        <td><?php foreach($pustakawan as $pus){if($pus->no_pustakawan == $row->no_pustakawan) echo $pus->nama;}?></td>
    </tr>
    <?php endforeach;?>
</Table>
<?php echo $pagination;?>