<div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span> Transaksi</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="fa fa-arrow-up"></span><a href="<?php echo site_url('peminjaman');?>"> Peminjaman</a></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       <span class="fa fa-arrow-down"></span> <a href="<?php echo site_url('pengembalian');?>"> Pengembalian</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span> Laporan</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="fa fa-users"></span><a href="<?php echo site_url('laporan/anggota');?>"> Data Anggota</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa fa-book"></span><a href="<?php echo site_url('laporan/buku');?>"> Data Buku</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa fa-arrow-up"></span><a href="<?php echo site_url('laporan/peminjaman');?>"> Data Peminjaman</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa fa-arrow-down"></span><a href="<?php echo site_url('laporan/pengembalian');?>"> Data Pengembalian</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                                        </span> Data</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <span class="fa fa-users text-primary"></span> <a href="<?php echo site_url('anggota');?>">Anggota</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fa fa-bookmark text-success"></span> <a href="<?php echo site_url('klas');?>">Klas</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fa fa-book text-success"></span> <a href="<?php echo site_url('buku');?>">Buku</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fa fa-user"></span> <a href="<?php echo site_url('pustakawan');?>">Pustakawan</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo site_url('dashboard/logout');?>"><span class="glyphicon glyphicon-off">
                            </span> Keluar</a>
                        </h4>
                    </div>
                </div>
</div>