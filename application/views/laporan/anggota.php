<legend><?php echo $title;?></legend>
<a class="btn btn-default" href="<?php echo site_url('laporan/cetakAnggota');?>">Cetak Laporan</a>
<hr>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Anggota</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>No. Telp</td>
            <td>Email</td>
            <td>Nama Organisasi</td>
        </tr>
    </thead>
    <?php $no=0; foreach($anggota as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->no_anggota;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->jenis_kelamin;?></td>
        <td><?php echo $row->no_telp;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->nama_organisasi;?></td>
    </tr>
    <?php endforeach;?>
    <script src="<?php echo base_url('assets/js/holder.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
        <script src="<?php echo base_url('assets/js/application.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/morris/raphael-2.1.0.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/morris/morris.js');?>"></script>
        <script src="<?php echo base_url('assets/js/sb-admin.js');?>"></script>
        <script src="<?php echo base_url('assets/js/demo/dashboard-demo.js');?>"></script>    
</table>