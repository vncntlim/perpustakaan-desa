<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('buku/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nomor / Nama Buku</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('buku/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Buku</td>
            <td>Nama</td>
            <td>Edisi</td>
            <td>Pengarang</td>
            <td>Klasifikasi</td>
            <td>Stok</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($buku as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->no_buku;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->edisi;?></td>
        <td><?php echo $row->nama_pengarang;?></td>
        <td><?php foreach($klas as $kl){if($kl->no_klas == $row->no_klas) echo $kl->nama;}?></td>
        <td><?php echo $row->stok;?></td>
        <!-- <td><a href="<?php echo site_url('buku/detail/'.$row->no_buku);?>"><i class="glyphicon glyphicon-edit"></i></a></td> -->
        <td><a href="<?php echo site_url('buku/edit/'.$row->no_buku);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->no_buku;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>
<?php echo $pagination;?>

<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('buku/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('buku/index/delete_success');?>";
                }
            });
        });
    });
    
</script>