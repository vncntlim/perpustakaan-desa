<?php

class Klas extends CI_Controller{
    private $limit=20;

	function __construct(){
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation'));
		$this->load->model('m_klas');

		if(!$this->session->userdata('username')){
			redirect('index');
		}
	}

	function index(){
		if (empty($offset)) $offset=0;
		if (empty($order_column)) $order_column='no_klas';
		if (empty($order_type)) $order_type='asc';

		//load data
		$data['klas'] = $this->m_klas->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['title']="Data Klas";

		$config['base_url']=site_url('klas/index/');
		$config['total_rows']=$this->m_klas->jumlah();
		$config['per_page']=$this->limit;
		$config['uri_segment']=3;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus!</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan!</div>";
        else
            $data['message']='';
            $this->template->display('klas/index',$data);
	}

	function tambah(){
		$data['title']="Tambah Data Klas";
        $data['noauto']=$this->m_klas->nootomatis();
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $no_klas=$this->input->post('no_klas');
            $cek=$this->m_klas->cek($no_klas);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>No Klas sudah digunakan</div>";
                $this->template->display('klas/tambah',$data);
            }else{
                $info=array(
                	'no_klas'=>$this->input->post('no_klas'),
                    'nama'=>$this->input->post('nama')
                );
                $this->m_klas->simpan($info);
                redirect('klas/index/add_success');
            }
        }else{
            $data['message']="";
            $this->template->display('klas/tambah',$data);
        }
	}

	function hapus(){
		$no_klas=$this->input->post('kode');
        $this->m_klas->hapus($no_klas);
	}

	function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->m_klas->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['klas']=$cek->result();
            $this->template->display('klas/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['klas']=$cek->result();
            $this->template->display('klas/cari',$data);
        }
    }

	function edit($id){
		$data['title']="Edit Data Klas";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $no_klas=$this->input->post('no_klas');
            
            $info=array(
                'nama'=>$this->input->post('nama')
            );
            //update data klas
            $this->m_klas->update($no_klas,$info);
            
            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate!</div>";
            
            //tampilkan data klas 
            $data['klas']=$this->m_klas->cek($id)->row_array();
            $this->template->display('klas/edit',$data);
        }else{
            $data['klas']=$this->m_klas->cek($id)->row_array();
            $data['message']="";
            $this->template->display('klas/edit',$data);
        }
	}

	function _set_rules(){
        $this->form_validation->set_rules('no_klas','No Klas','required|max_length[8]');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

}
?>