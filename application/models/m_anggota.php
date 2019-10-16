<?php 

class M_anggota extends CI_Model{
	private $table="tb_anggota";
	private $primary="no_anggota";

	function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table,$limit,$offset);
    }
    
    function jumlah(){
        return $this->db->count_all($this->table);
    }
    
    function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }
    
    function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }
    
    function update($kode,$jenis){
        $this->db->where($this->primary,$kode);
        $this->db->update($this->table,$jenis);
    }
    
    function hapus($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);
    }
    
    function cari($cari){
        $this->db->like($this->primary,$cari);
        $this->db->or_like("nama",$cari);
        return $this->db->get($this->table);
    }

	function nootomatis(){
		$query = $this->db->query("SELECT * FROM tb_anggota ORDER BY no_anggota DESC LIMIT 1");
		if(empty($query->result_array())){
			return 'PDCA0001';
		} else {
			foreach ($query->result_array() as $row) {
				$last = (int) substr($row['no_anggota'], -4);
				$last++;
				return 'PDCA'.sprintf("%04s", $last);
			}
		}
	}	
}
?>