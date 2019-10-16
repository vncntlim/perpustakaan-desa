<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Anggota</label>
        <div class="col-lg-5">
            <input type="text" name="no_anggota" class="form-control" value="<?php echo $anggota['no_anggota'];?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama</label>
        <div class="col-lg-5">
            <input type="text" name="nama" class="form-control" value="<?php echo $anggota['nama'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tempat</label>
        <div class="col-lg-5">
            <input type="text" name="tempat" class="form-control" value="<?php echo $anggota['tempat'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tanggal Lahir</label>
        <div class="col-lg-5">
            <input type="text" name="tanggal_lahir" id="tanggal" class="form-control" value="<?php echo $anggota['tanggal_lahir'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Kelamin</label>
        <div class="col-lg-5">
            <select name="jenis_kelamin" class="form-control">
                <option>-Pilih-</option>
                <?php
                    if($anggota['jenis_kelamin'] == 'L'){
                ?>
                        <option value="L" selected="selected">Laki-laki</option>
                        <option value="P">Perempuan</option>
                <?php    
                    } else {
                ?>
                        <option value="L">Laki-laki</option>
                        <option value="P" selected="selected">Perempuan</option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Alamat</label>
        <div class="col-lg-5">
            <input type="text" name="alamat" class="form-control" value="<?php echo $anggota['alamat'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Agama</label>
        <div class="col-lg-5">
            <input type="text" name="agama" class="form-control" value="<?php echo $anggota['agama'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">No Telp</label>
        <div class="col-lg-5">
            <input type="text" name="no_telp" class="form-control" value="<?php echo $anggota['no_telp'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Email</label>
        <div class="col-lg-5">
            <input type="email" name="email" class="form-control" value="<?php echo $anggota['email'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Organisasi</label>
        <div class="col-lg-5">
            <input type="text" name="nama_organisasi" class="form-control" value="<?php echo $anggota['nama_organisasi'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Jabatan</label>
        <div class="col-lg-5">
            <input type="text" name="jabatan" class="form-control" value="<?php echo $anggota['jabatan'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Alamat Organisasi</label>
        <div class="col-lg-5">
            <input type="text" name="alamat_org" class="form-control" value="<?php echo $anggota['alamat_org'];?>">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Update</button>
        <a href="<?php echo site_url('anggota');?>" class="btn btn-default">Kembali</a>
    </div>
</form>