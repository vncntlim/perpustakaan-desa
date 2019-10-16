<?php

class Buku extends CI_Controller{
    private $limit=20;

	function __construct(){
		parent::__construct();
        $this->load->library(array('template','form_validation','pagination','upload'));
		$this->load->model('m_buku');

		if(!$this->session->userdata('username')){
			redirect('index');
		}
	}

	function index($offset=0,$order_column='no_buku',$order_type='asc'){
		if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='no_buku';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['buku']=$this->m_buku->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Buku";
        $data['klas']=$this->m_buku->getKlas()->result();
        
        $config['base_url']=site_url('buku/index/');
        $config['total_rows']=$this->m_buku->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
            $this->template->display('buku/index',$data
        );
	}

	function tambah(){
		$data['title']="Tambah Buku";
        $data['noauto']=$this->m_buku->nootomatis();
        $data['klas']=$this->m_buku->getKlas()->result();
        
        $this->_set_rules();
        if($this->form_validation->run()==true){//jika validasi dijalankan dan benar
            $no_buku=$this->input->post('no_buku'); // mendapatkan input dari kode
            $cek=$this->m_buku->cek($no_buku); // cek kode di database
            if($cek->num_rows()>0){ // jika kode sudah ada, maka tampilkan pesan
                $data['message']="<div class='alert alert-danger'>No Buku sudah ada</div>";
                $this->template->display('buku/tambah',$data);
            }else{ // jika kode buku belum ada, maka simpan
                
                $info=array(
                    'no_buku'=>$this->input->post('no_buku'),
                    'tanggal'=>$this->input->post('tanggal'),
                    'nama'=>$this->input->post('nama'),
                    'edisi'=>$this->input->post('edisi'),
                    'nama_pengarang'=>$this->input->post('nama_pengarang'),
                    'nama_penerbit'=>$this->input->post('nama_penerbit'),
                    'tempat_terbit'=>$this->input->post('tempat_terbit'),
                    'tahun_terbit'=>$this->input->post('tahun_terbit'),
                    'asal_buku'=>$this->input->post('asal_buku'),
                    'no_klas'=>$this->input->post('no_klas'),
                    'bahasa'=>$this->input->post('bahasa'),
                    'stok'=>$this->input->post('stok')
                );
                $this->m_buku->simpan($info);
                redirect('buku/index/add_success');
            }
        }else{
            $data['message']="";
            $this->template->display('buku/tambah',$data);
        }
	}

	function cari(){
        $data['title']="Pencairan";
        $data['klas']=$this->m_buku->getKlas()->result();
        $cari=$this->input->post('cari');
        $cek=$this->m_buku->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['buku']=$cek->result();
            $this->template->display('buku/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['buku']=$cek->result();
            $this->template->display('buku/cari',$data);
        }
    }

	function hapus(){
		$no_buku=$this->input->post('kode');
        $this->m_buku->hapus($no_buku);
	}

	function edit($no_buku){
		$data['title']="Edit data Buku";
        $data['klas']=$this->m_buku->getKlas()->result();
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $no_buku=$this->input->post('no_buku');
            
            $info=array(
                'tanggal'=>$this->input->post('tanggal'),
                'nama'=>$this->input->post('nama'),
                'edisi'=>$this->input->post('edisi'),
                'nama_pengarang'=>$this->input->post('nama_pengarang'),
                'nama_penerbit'=>$this->input->post('nama_penerbit'),
                'tempat_terbit'=>$this->input->post('tempat_terbit'),
                'tahun_terbit'=>$this->input->post('tahun_terbit'),
                'asal_buku'=>$this->input->post('asal_buku'),
                'no_klas'=>$this->input->post('no_klas'),
                'bahasa'=>$this->input->post('bahasa'),
                'stok'=>$this->input->post('stok')
            );
            $this->m_buku->update($no_buku,$info);
            
            $data['buku']=$this->m_buku->cek($no_buku)->row_array();
            $data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";
            $this->template->display('buku/edit',$data);
        }else{
            $data['message']="";
            $data['buku']=$this->m_buku->cek($no_buku)->row_array();
            $this->template->display('buku/edit',$data);
        }
	}

    function _set_rules(){
        $this->form_validation->set_rules('no_buku','No Buku','required|max_length[8]');
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('nama','Nama','required|max_length[100]');
        $this->form_validation->set_rules('edisi','Edisi','required');
        $this->form_validation->set_rules('nama_pengarang','Nama Pengarang','required|max_length[50]');
        $this->form_validation->set_rules('nama_penerbit','Nama Penerbit','required|max_length[50]');
        $this->form_validation->set_rules('tempat_terbit','Tempat Terbit','required|max_length[50]');
        $this->form_validation->set_rules('tahun_terbit','Tempat Terbit','required|max_length[4]');
        $this->form_validation->set_rules('asal_buku','Asal Buku','required');
        $this->form_validation->set_rules('no_klas','Klas','required|max_length[8]');
        $this->form_validation->set_rules('bahasa','Bahasa','required|max_length[20]');
        $this->form_validation->set_rules('stok','Stok','required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

}
?>