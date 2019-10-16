<?php
class M_Peminjaman extends CI_Model{
    private $table="tb_peminjaman";
    
    function nootomatis(){
        $query = $this->db->query("SELECT * FROM tb_peminjaman ORDER BY no_peminjaman DESC LIMIT 1");
        if(empty($query->result_array())){
            return 'PDCTP0001';
        } else {
            foreach ($query->result_array() as $row) {
                $last = (int) substr($row['no_peminjaman'], -4);
                $last++;
                return 'PDCTP'.sprintf("%04s", $last);
            }
        }
    }

    function nootomatisdetail(){
        $query = $this->db->query("SELECT * FROM tb_detail ORDER BY no_detail DESC LIMIT 1");
        if(empty($query->result_array())){
            return 'PDCTD0001';
        } else {
            foreach ($query->result_array() as $row) {
                $last = (int) substr($row['no_peminjaman'], -4);
                $last++;
                return 'PDCTD'.sprintf("%04s", $last);
            }
        }
    }
    
    function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table,$limit,$offset);
    }

    function getPustakawan(){
        return $this->db->get("tb_pustakawan");
    }
    
    function getAnggota(){
        return $this->db->get("tb_anggota");
    }
    
    function jumlah(){
        return $this->db->count_all($this->table);
    }

    function cari($cari){
        $this->db->like("no_peminjaman",$cari);
        return $this->db->get("tb_peminjaman");
    }

    function cariAnggota($no_anggota){
        $this->db->where("no_anggota",$no_anggota);
        return $this->db->get("tb_anggota");
    }
    
    function cariBuku($no_buku){
        $this->db->where("no_buku",$no_buku);
        return $this->db->get("tb_buku");
    }
    
    function simpanTmp($info){
        $this->db->insert("tb_tmp",$info);
    }
    
    function tampilTmp(){
        return $this->db->get("tb_tmp");
    }
    
    function cekTmp($no_buku){
        $this->db->where("no_buku",$no_buku);
        return $this->db->get("tb_tmp");
    }
    
    function jumlahTmp(){
        return $this->db->count_all("tb_tmp");
    }
    
    function hapusTmp($no_buku){
        $this->db->where("no_buku",$no_buku);
        $this->db->delete("tb_tmp");
    }
    
    function simpan($info){
        $this->db->insert("tb_peminjaman",$info);
    }

    function simpandet($info){
        $this->db->insert("tb_detail",$info);
    }

    function updatebuku($no_buku,$info){
        $this->db->where("no_buku",$no_buku);
        $this->db->update("tb_buku",$info);
    }
    
}