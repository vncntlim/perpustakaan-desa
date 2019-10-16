<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">No. Buku</label>
        <div class="col-lg-5">
            <input type="text" name="no_buku" class="form-control" value="<?php echo $buku['no_buku'];?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tanggal</label>
        <div class="col-lg-5">
            <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?php echo $buku['tanggal'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Buku</label>
        <div class="col-lg-5">
            <input type="text" name="nama" class="form-control" value="<?php echo $buku['nama'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Edisi Buku</label>
        <div class="col-lg-5">
            <input type="text" name="edisi" class="form-control" value="<?php echo $buku['edisi'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Pengarang</label>
        <div class="col-lg-5">
            <input type="text" name="nama_pengarang" class="form-control" value="<?php echo $buku['nama_pengarang'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Penerbit</label>
        <div class="col-lg-5">
            <input type="text" name="nama_penerbit" class="form-control" value="<?php echo $buku['nama_penerbit'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tempat Terbit</label>
        <div class="col-lg-5">
            <input type="text" name="tempat_terbit" class="form-control" value="<?php echo $buku['tempat_terbit'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tahun Terbit</label>
        <div class="col-lg-5">
            <input type="text" name="tahun_terbit" class="form-control" value="<?php echo $buku['tahun_terbit'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Asal Buku</label>
        <div class="col-lg-5">
            <select name="asal_buku" class="form-control">
                <option>-Pilih-</option>
                <?php
                    if($buku['asal_buku'] == 'Beli'){
                ?>
                <option value="Beli" selected>Beli</option>
                <option value="Hibah">Hibah</option>
                <?php
                    } else {
                ?>
                <option value="Beli">Beli</option>
                <option value="Hibah" selected>Hibah</option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Klas</label>
        <div class="col-lg-5">
            <select name="no_klas" class="form-control">
            <option>-Pilih-</option>
            <?php foreach($klas as $kl):?>
            <option value="<?php echo $kl->no_klas;?>" <?php if($buku['no_klas'] == $kl->no_klas) echo "selected"; ?>><?php echo $kl->nama;?></option>
            <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Bahasa</label>
        <div class="col-lg-5">
            <input type="text" name="bahasa" class="form-control" value="<?php echo $buku['bahasa'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Stok</label>
        <div class="col-lg-5">
            <input type="text" name="stok" class="form-control" value="<?php echo $buku['stok'];?>">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('buku');?>" class="btn btn-default"> Kembali</a>
    </div>
</form>