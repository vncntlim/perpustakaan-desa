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