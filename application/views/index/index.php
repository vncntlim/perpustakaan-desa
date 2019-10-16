<!doctype html>
    <html>
        <head>
            <title>Perpustakaan</title>
            <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
        
            <link href="<?php echo base_url('assets/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
        
            
            <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
            <script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>"></script>
            <script>
                    tinymce.init({selector:'textarea'});
            </script>
        </head>
        <body>
            <!--<img src="<?php echo base_url('assets/img/3.jpg');?>" height="140px" width="100%">-->
            <!-- Static navbar -->
            <div class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url('index');?>">Perpustakaan</a>
                    </div>
                </div>
            </div>

            
            
            
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-lock"></span> Masuk
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" action="<?php echo site_url('index/proses');?>" method="post">
                                    <?php echo $this->session->flashdata('message');?>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="No. Pustakawan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Kata Sandi" required>
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                Masuk</button>
                                                 <button type="reset" class="btn btn-default btn-sm">
                                                Kosongkan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <legend>Selamat Datang di Aplikasi Perpusatakaan</legend>
                    </div>
                </div>
            </div>
    
            
            
            <!-- Core Scripts - Include with every page -->
            <script src="<?php echo base_url('assets/js/holder.js');?>"></script>
    
            <script src="<?php echo base_url('assets/js/application.js');?>"></script>
            <script src="<?php echo base_url('assets/js/jquery-1.10.2.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
            <script src="<?php echo base_url('assets/js/plugins/morris/raphael-2.1.0.min.js');?>"></script>
            <script src="<?php echo base_url('assets/js/plugins/morris/morris.js');?>"></script>
            <script src="<?php echo base_url('assets/js/sb-admin.js');?>"></script>
            <script src="<?php echo base_url('assets/js/demo/dashboard-demo.js');?>"></script>   
        </body>
    </html>