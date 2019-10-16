<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">No. Klas</label>
        <div class="col-lg-5">
            <input type="text" name="no_klas" class="form-control" value="<?php echo $klas['no_klas'];?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama KLas</label>
        <div class="col-lg-5">
            <input type="text" name="nama" class="form-control" value="<?php echo $klas['nama'];?>">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('klas');?>" class="btn btn-default">Kembali</a>
    </div>
</form>