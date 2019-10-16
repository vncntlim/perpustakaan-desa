<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">No. Pustakawan</label>
        <div class="col-lg-5">
            <input type="text" name="no_pustakawan" class="form-control" value="<?php echo $pustakawan['no_pustakawan'];?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Password</label>
        <div class="col-lg-5">
            <input type="password" name="password" class="form-control" value="<?php echo $pustakawan['password'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama</label>
        <div class="col-lg-5">
            <input type="text" name="nama" class="form-control" value="<?php echo $pustakawan['nama'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Alamat</label>
        <div class="col-lg-5">
            <input type="text" name="alamat" class="form-control" value="<?php echo $pustakawan['alamat'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">No Telp</label>
        <div class="col-lg-5">
            <input type="text" name="no_telp" class="form-control" value="<?php echo $pustakawan['no_telp'];?>">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('pustakawan');?>" class="btn btn-default">Kembali</a>
    </div>
</form>