<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<?php echo $message;?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">No Anggota</label>
        <div class="col-lg-5">
            <input type="text" name="no_anggota" class="form-control" value="<?php echo $noauto; ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama</label>
        <div class="col-lg-5">
            <input type="text" name="nama" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tempat</label>
        <div class="col-lg-5">
            <input type="text" name="tempat" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tanggal Lahir</label>
        <div class="col-lg-5">
            <input type="text" name="tanggal_lahir" id="tanggal" class="form-control tanggal">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Kelamin</label>
        <div class="col-lg-5">
            <select name="jenis_kelamin" class="form-control">
                <option>-Pilih-</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Alamat</label>
        <div class="col-lg-5">
            <input type="text" name="alamat" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Agama</label>
        <div class="col-lg-5">
            <input type="text" name="agama" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">No Telp</label>
        <div class="col-lg-5">
            <input type="text" name="no_telp" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Email</label>
        <div class="col-lg-5">
            <input type="email" name="email" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Organisasi</label>
        <div class="col-lg-5">
            <input type="text" name="nama_organisasi" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Jabatan</label>
        <div class="col-lg-5">
            <input type="text" name="jabatan" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Alamat Organisasi</label>
        <div class="col-lg-5">
            <input type="text" name="alamat_org" class="form-control">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('anggota');?>" class="btn btn-default">Kembali</a>
    </div>
</form>