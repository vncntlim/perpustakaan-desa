<script>
    $(function(){

        $("#cari").click(function(){
            var no_peminjaman = $("#no_peminjaman").val();

            $.ajax({
                url:"<?php echo site_url('pengembalian/cariPeminjaman');?>",
                type:"POST",
                data:"no_peminjaman="+no_peminjaman,
                cache:false,
                success:function(html){
                    $("#no_anggota").val(html);
                    $("#tampil").load("<?php echo site_url('pengembalian/tampil');?>","no_peminjaman="+no_peminjaman);    

                }
            })
        })

        // $("#simpan").click(function(){
        //     var no_peminjaman=$("#no_peminjaman").val();
        //     var no_anggota=$("#no_anggota").val();
            
        //     if (no_peminjaman=="" || no_anggota=="") {
        //         alert("Pilih Peminjaman");
        //         $("#no_peminjaman").focus();
        //         return false;
        //     }else{
        //         $.ajax({
        //             url:"<?php //echo site_url('pengembalian/simpan');?>",
        //             type:"POST",
        //             data:"no_peminjaman="+no_peminjaman,
        //             cache:false,
        //             success:function(html){
        //                 alert("Data Berhasil disimpan");
        //                 location.reload();
        //             }
        //         })
        //     }
        // })
    })
</script>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $title;?>
    </div>
    <form class="form-horizontal" action="" method="post">
    <div class="panel-body">
            <div class="col-md-8">
                <div class="form-group">
                    <label class="col-lg-4 control-label">No. Peminjaman</label>
                    <div class="col-lg-4">
                        <input type="text" name="no_peminjaman" id="no_peminjaman" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-default" id="cari">Cari</button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 control-label">No. Anggota</label>
                    <div class="col-lg-7">
                        <input type="text" name="no_anggota" id="no_anggota" class="form-control" readonly="readonly">
                    </div>
                </div>
            </div>


            <!-- 
            <div class="col-md-6">
                
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Denda</label>
                    <div class="col-lg-7">
                        <select name="denda" id="denda" class="form-control">
                            <option></option>
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nominal</label>
                    <div class="col-lg-7">
                        <input type="text" name="nominal" id="nominal" class="form-control">
                    </div>
                </div>
            </div> -->
    
    
    <div id="tampil"></div>
    </div>
    <div class="panel-footer">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
    </div>
    </form>
</div>