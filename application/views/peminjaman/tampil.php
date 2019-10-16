<table class="table table-striped">
        <thead>
            <tr>
                <th>No. Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Banyaknya</th>
                <th></td>
            </tr>
        </thead>
        <?php foreach($tmp as $tmp):?>
        <tr>
            <td><?php echo $tmp->no_buku;?></td>
            <td><?php echo $tmp->tanggal_pinjam;?></td>
            <td><?php echo $tmp->tanggal_kembali;?></td>
            <td><?php echo $tmp->banyaknya;?></td>
            <td><a href="#" class="hapus" no_buku="<?php echo $tmp->no_buku;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a></td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td>Total</td>
            <td colspan="3"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
        </tr>
    </table>