<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('buku/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nomor / Nama Klas</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('klas/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Klas</td>
            <td>Nama Klas</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($klas as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->no_klas;?></td>
        <td><?php echo $row->nama;?></td>
        <td><a href="<?php echo site_url('klas/edit/'.$row->no_klas);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->no_klas;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>

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
                url:"<?php echo site_url('klas/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('klas/index/delete_success');?>";
                }
            });
        });
    });
    
</script>