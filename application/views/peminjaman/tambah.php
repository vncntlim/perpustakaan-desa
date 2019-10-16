<legend><?php echo $title;?></legend>
<?php echo validation_errors();?>
<script>
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('peminjaman/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#no_buku").val('');
            $("#nama").val('');
            $("#tanggal").val('');
            $("#tanggal2").val('');
            $("#banyaknya").val('');
        }
        
        $("#no_anggota").keypress(function(){
            var no_anggota=$("#no_anggota").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/cariAnggota');?>",
                type:"POST",
                data:"no_anggota="+no_anggota,
                cache:false,
                success:function(html){
                    $("#nama_anggota").val(html);
                }
            })
        })

        $("#no_buku").keypress(function(){
            var no_buku=$("#no_buku").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/cariBuku');?>",
                type:"POST",
                data:"no_buku="+no_buku,
                cache:false,
                success:function(html){
                    $("#nama").val(html);
                }
            })
        })
        
        $("#tambah").click(function(){
            var no_buku=$("#no_buku").val();
            var tanggal_pinjam=$("#tanggal").val();
            var tanggal_kembali=$("#tanggal1").val();
            var banyaknya=$("#banyaknya").val();
            
            if (no_buku=="") {
                //code
                alert("No. Buku Masih Kosong");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('peminjaman/tambah');?>",
                    type:"POST",
                    data:"no_buku="+no_buku+"&tanggal_pinjam="+tanggal_pinjam+"&tanggal_kembali="+tanggal_kembali+"&banyaknya="+banyaknya,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
        
        
        $("#simpan").click(function(){
            var no_peminjaman=$("#no_peminjaman").val();
            var no_anggota=$("#no_anggota").val();
            var no_pustakawan=$("#no_pustakawan").val();
            var jumlah=parseInt($("#jumlahTmp").val(),10);

            if (no_anggota=="") {
                alert("Pilih Anggota");
                return false;
            }else if (jumlah==0) {
                alert("Pilih buku yang akan dipinjam");
                return false;
            }
        })
        
        $(".hapus").live("click",function(){
            var no_buku=$(this).attr("no_buku");
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/hapus');?>",
                type:"POST",
                data:"no_buku="+no_buku,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });
        
    })
</script>

<div class="panel panel-default">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-5 control-label">No. Peminjaman</label>
                    <div class="col-lg-7">
                        <input type="text" id="no_peminjaman" name="no_peminjaman" class="form-control" value="<?php echo $noauto;?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-5 control-label">No Pustakawan</label>
                    <div class="col-lg-7">
                        <input type="text" id="no_pustakawan" name="no_pustakawan" class="form-control" value="<?php echo $no_pustakawan;?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-5 control-label">No. Anggota</label>
                    <div class="col-lg-7">
                        <input type="text" name="no_anggota" id="no_anggota" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-5 control-label">Nama Anggota</label>
                    <div class="col-lg-7">
                        <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" readonly="readonly">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary" id="simpan"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        </div>
    </form>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        Data Buku
    </div>
    <form class="form-horizontal">
    <div class="panel-body">
        <div class="col-md-10">
            <div class="form-group">
                <label class="col-lg-5 control-label">Nomor Buku</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="No. Buku" id="no_buku" name="no_buku">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-5 control-label">Nama Buku</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="Nama Buku" id="nama" name="nama" readonly="readonly">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-5 control-label">Tanggal Pinjam</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="Tanggal Pinjam" id="tanggal" name="tanggal_pinjam">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-5 control-label">Tanggal Kembali</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="Tanggal Kembali" id="tanggal1" name="tanggal_kembali">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-5 control-label">Banyaknya</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" placeholder="Banyaknya" id="banyaknya" name="banyaknya">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                <button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div id="tampil"></div>
</div>