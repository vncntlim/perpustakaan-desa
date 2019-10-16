<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('pustakawan/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nomor / Nama Pustakawan</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('pustakawan/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Pustakawan</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>No. Telp</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($pustakawan as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->no_pustakawan;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->alamat;?></td>
        <td><?php echo $row->no_telp;?></td>
        <td><a href="<?php echo site_url('pustakawan/edit/'.$row->no_pustakawan);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->no_pustakawan;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
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
                url:"<?php echo site_url('pustakawan/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('pustakawan/index/delete_success');?>";
                }
            });
        });
    });
    
</script>