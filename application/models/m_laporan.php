<?php
class M_Laporan extends CI_Model{
    #code
    
    function semuaAnggota(){
        return $this->db->get("tb_anggota");
    }
    
    function semuaBuku(){
        return $this->db->get("tb_buku");
    }
    
    function detailpeminjaman($tanggal1,$tanggal2){
        return $this->db->query("select a.*, b.* FROM tb_peminjaman a, tb_detail b where b.tanggal_pinjam between '$tanggal1' and '$tanggal2' group by a.no_peminjaman");
    }
    
    function detail_pinjam($no_peminjaman){
        $this->db->select("*");
        $this->db->from("tb_detail");
        $this->db->where("tb_detail.no_peminjaman",$no_peminjaman);
        $this->db->join("tb_peminjaman","tb_detail.no_peminjaman=tb_peminjaman.no_peminjaman");
        return $this->db->get();
    }
    
    function detailpengembalian($tanggal1,$tanggal2){
        return $this->db->query("select * from tb_pengembalian where tanggal_kembali between '$tanggal1' and '$tanggal2' group by no_peminjaman");
    }

    function getKlas(){
        return $this->db->get("tb_klas");
    }
}
