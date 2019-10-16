<?php

class Pustakawan extends CI_Controller{
    private $limit=20;

	function __construct(){
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation'));
		$this->load->model('m_pustakawan');

		if(!$this->session->userdata('username')){
			redirect('index');
		}
	}

	function index($offset=0,$order_column='no_pustakawan',$order_type='asc'){
		if (empty($offset)) $offset=0;
		if (empty($order_column)) $order_column='no_pustakawan';
		if (empty($order_type)) $order_type='asc';

		//load data
		$data['pustakawan'] = $this->m_pustakawan->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['title']="Data Pustakawan";

		$config['base_url']=site_url('pustakawan/index/');
		$config['total_rows']=$this->m_pustakawan->jumlah();
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
            $this->template->display('pustakawan/index',$data);
	}

	function tambah(){
		$data['title']="Tambah Data Pustakawan";
        $data['noauto']=$this->m_pustakawan->nootomatis();
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $no_pustakawan=$this->input->post('no_pustakawan');
            $cek=$this->m_pustakawan->cek($no_pustakawan);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>No Pustakawan sudah digunakan</div>";
                $this->template->display('pustakawan/tambah',$data);
            }else{
                $info=array(
                	'no_pustakawan'=>$this->input->post('no_pustakawan'),
	                'password'=>$this->input->post('password'),
	                'nama'=>$this->input->post('nama'),
	                'alamat'=>$this->input->post('alamat'),
	                'no_telp'=>$this->input->post('no_telp')
                );
                $this->m_pustakawan->simpan($info);
                redirect('pustakawan/index/add_success');
            }
        }else{
            $data['message']="";
            $this->template->display('pustakawan/tambah',$data);
        }
	}

	function hapus(){
		$no_pustakawan=$this->input->post('kode');
        $this->m_pustakawan->hapus($no_pustakawan);
	}

	function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->m_pustakawan->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['pustakawan']=$cek->result();
            $this->template->display('pustakawan/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['pustakawan']=$cek->result();
            $this->template->display('pustakawan/cari',$data);
        }
    }

	function edit($id){
		$data['title']="Edit Data Pustakawan";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $no_pustakawan=$this->input->post('no_pustakawan');
            
            $info=array(
	            'password'=>$this->input->post('password'),
	            'nama'=>$this->input->post('nama'),
	            'alamat'=>$this->input->post('alamat'),
	            'no_telp'=>$this->input->post('no_telp')
            );
            //update data pustakawan
            $this->m_pustakawan->update($no_pustakawan,$info);
            
            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate!</div>";
            
            //tampilkan data pustakawan 
            $data['pustakawan']=$this->m_pustakawan->cek($id)->row_array();
            $this->template->display('pustakawan/edit',$data);
        }else{
            $data['pustakawan']=$this->m_pustakawan->cek($id)->row_array();
            $data['message']="";
            $this->template->display('pustakawan/edit',$data);
        }
	}

	function _set_rules(){
        $this->form_validation->set_rules('no_pustakawan','No Pustakawan','required|max_length[8]');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('no_telp','Nomor Telpon','required|max_length[12]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

}
?>