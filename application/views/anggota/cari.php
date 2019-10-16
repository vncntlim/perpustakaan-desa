<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('anggota/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Nomor / Nama Anggota</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('anggota/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Anggota</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>No. Telp</td>
            <td>Email</td>
            <td>Nama Organisasi</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($anggota as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->no_anggota;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php if($row->jenis_kelamin == 'L'){echo 'Laki-laki';} else {echo "Perempuan";}?></td>
        <td><?php echo $row->no_telp;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->nama_organisasi;?></td>
        <!-- <td><a href="<?php echo site_url('anggota/detail/'.$row->no_anggota);?>"><i class="glyphicon glyphicon-edit"></i></a></td> -->
        <td><a href="<?php echo site_url('anggota/edit/'.$row->no_anggota);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->no_anggota;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
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
                url:"<?php echo site_url('anggota/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('anggota/index/delete_success');?>";
                }
            });
        });
    });
</script>