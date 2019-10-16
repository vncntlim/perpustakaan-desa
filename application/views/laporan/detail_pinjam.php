<legend>Detail Peminjaman</legend>
<div class="col-md-6">
    <div class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-5">No Peminjaman</label>
        <div class="col-lg-5">
            : <?php echo $pinjam['no_peminjaman'];?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-5">Tanggal Pinjam</label>
        <div class="col-lg-5">
            : <?php echo $pinjam['tanggal_pinjam'];?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-5">No. Anggota</label>
        <div class="col-lg-5">
            : <?php echo $pinjam['no_anggota'];?>
        </div>
    </div>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <td>No. Buku</td>
            <td>Banyaknya</td>
            <td>Status</td>
        </tr>
    </thead>
    <?php foreach($detail as $row):?>
    <tr>
        <td><?php echo $row->no_buku;?></td>
        <td><?php echo $row->banyaknya;?></td>
        <td><?php echo $row->status;?></td>
    </tr>
    <?php endforeach;?>
</table>