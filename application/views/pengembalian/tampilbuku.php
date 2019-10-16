<div class="form-group">
    <label class="col-lg-4 control-label">Buku</label>
    <div class="col-lg-7">
        <select name="no_detail" class="form-control" id="no_detail">
            <option></option>
            <?php foreach($buku as $buk):?>
                <option value="<?php echo $buk->no_detail;?>">
                    <?php foreach($sbuku as $sbu){if($sbu->no_buku == $buk->no_buku) echo $sbu->nama;}?>
                </option>
            <?php endforeach;?>
        </select>
    </div>
</div>
                
<div class="form-group">
    <label class="col-lg-4 control-label">Nama</label>
    <div class="col-lg-7">
        <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" readonly="readonly" value="<?php echo $nama; ?>">
    </div>
</div>
                
<div class="form-group">
    <label class="col-lg-4 control-label">Tanggal Kembali</label>
    <div class="col-lg-7">
        <input type="text" name="tanggal_kembali" id="tanggal_kembali" class="form-control" readonly="readonly" value="<?php echo $tanggal; ?>">
    </div>
</div>