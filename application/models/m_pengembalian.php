<?php
class M_Pengembalian extends CI_Model{
    
    function cariPeminjaman($no_peminjaman){
        $query = $this->db->query("SELECT * FROM tb_peminjaman WHERE no_peminjaman = '$no_peminjaman' AND no_peminjaman NOT IN (SELECT no_peminjaman FROM tb_pengembalian");
        return $query;
    }

    function cariAnggota($no_anggota){
        $this->db->where("no_anggota",$no_anggota);
        return $this->db->get("tb_anggota");
    }
    
    function semuaBuku(){
        return $this->db->get("tb_buku");
    }

    function tampilBuku($no_peminjaman){
        $this->db->where("no_peminjaman",$no_peminjaman);
        return $this->db->get("tb_detail");
    }

    function updatebuku($no_buku,$info){
        $this->db->where("no_buku",$no_buku);
        $this->db->update("tb_buku",$info);
    }
    
    function simpan($info){
        $this->db->insert("tb_pengembalian",$info);
    }
    
    function update($no,$update){
        $this->db->where("no_detail",$no);
        $this->db->update("tb_detail",$update);
    }
}