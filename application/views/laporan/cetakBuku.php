<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
        
            <link href="<?php echo base_url('assets/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/css/datepicker.css');?>" rel="stylesheet">
        
            
            <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
            <script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/id.js"></script>
<script type="text/javascript">
    window.print();
</script>
</head>
<body>
<div class="container">
    <legend><?php echo $title;?></legend>
<a class="btn btn-default" href="<?php echo site_url('laporan/cetakBuku');?>">Cetak Laporan</a>
<hr>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>No. Buku</td>
            <td>Nama</td>
            <td>Edisi</td>
            <td>Pengarang</td>
            <td>Klasifikasi</td>
            <td>Stok</td>
        </tr>
    </thead>
    <?php $no=0; foreach($buku as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->no_buku;?></td>
        <td><?php echo $row->nama;?></td>
        <td><?php echo $row->edisi;?></td>
        <td><?php echo $row->nama_pengarang;?></td>
        <td><?php foreach($klas as $kl){if($kl->no_klas == $row->no_klas) echo $kl->nama;}?></td>
        <td><?php echo $row->stok;?></td>
    </tr>
    <?php endforeach;?>
</table>
</table>
</div>
</body>
<script src="<?php echo base_url('assets/js/holder.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
        <script src="<?php echo base_url('assets/js/application.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/morris/raphael-2.1.0.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/morris/morris.js');?>"></script>
        <script src="<?php echo base_url('assets/js/sb-admin.js');?>"></script>
        <script src="<?php echo base_url('assets/js/demo/dashboard-demo.js');?>"></script>
</html>