<?php

class Anggota extends CI_Controller
{
	private $limit = 20;
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation'));
		$this->load->model('m_anggota');

		if(!$this->session->userdata('username')){
			redirect('index');
		}
	}

	function index($offset=0, $order_column='no_anggota',$order_type='asc'){
		if (empty($offset)) $offset=0;
		if (empty($order_column)) $order_column='no_anggota';
		if (empty($order_type)) $order_type='asc';

		//load data
		$data['anggota'] = $this->m_anggota->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['title']="Data Anggota";

		$config['base_url']=site_url('anggota/index/');
		$config['total_rows']=$this->m_anggota->jumlah();
		$config['per_page']=$this->limit;
		$config['uri_segment']=3;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();

		if($this->uri->segment(3)=="delete_success"){
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus!</div>";
            $this->template->display('anggota/index',$data);
        }else if($this->uri->segment(3)=="add_success"){
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan!</div>";
            $this->template->display('anggota/index',$data);
        }else{
            $data['message']='';
            $this->template->display('anggota/index',$data);
        }
	}

	function tambah(){
		$data['title']="Tambah Data Anggota";
        $data['noauto']=$this->m_anggota->nootomatis();
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $no_anggota=$this->input->post('no_anggota');
            $cek=$this->m_anggota->cek($no_anggota);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>No Anggota sudah digunakan</div>";
                $this->template->display('anggota/tambah',$data);
            }else{
                $info=array(
                	'no_anggota'=>$this->input->post('no_anggota'),
                    'nama'=>$this->input->post('nama'),
	                'tempat'=>$this->input->post('tempat'),
                    'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
	                'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
	                'alamat'=>$this->input->post('alamat'),
	                'agama'=>$this->input->post('agama'),
	                'no_telp'=>$this->input->post('no_telp'),
	                'email'=>$this->input->post('email'),
	                'nama_organisasi'=>$this->input->post('nama_organisasi'),
	                'jabatan'=>$this->input->post('jabatan'),
	                'alamat_org'=>$this->input->post('alamat_org')
                );
                $this->m_anggota->simpan($info);
                redirect('anggota/index/add_success');
            }
        }else{
            $data['message']="";
            $this->template->display('anggota/tambah',$data);
        }
	}

	function hapus(){
		$no_anggota=$this->input->post('kode');
        $this->m_anggota->hapus($no_anggota);
	}

    function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->m_anggota->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['anggota']=$cek->result();
            $this->template->display('anggota/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['anggota']=$cek->result();
            $this->template->display('anggota/cari',$data);
        }
    }

	function edit($id){
		$data['title']="Edit Data Anggota";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $no_anggota=$this->input->post('no_anggota');
            
            $info=array(
                'nama'=>$this->input->post('nama'),
                'tempat'=>$this->input->post('tempat'),
                'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
                'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                'alamat'=>$this->input->post('alamat'),
                'agama'=>$this->input->post('agama'),
                'no_telp'=>$this->input->post('no_telp'),
                'email'=>$this->input->post('email'),
                'nama_organisasi'=>$this->input->post('nama_organisasi'),
                'jabatan'=>$this->input->post('jabatan'),
                'alamat_org'=>$this->input->post('alamat_org')
            );
            //update data angggota
            $this->m_anggota->update($no_anggota,$info);
            
            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate!</div>";
            
            //tampilkan data anggota 
            $data['anggota']=$this->m_anggota->cek($id)->row_array();
            $this->template->display('anggota/edit',$data);
        }else{
            $data['anggota']=$this->m_anggota->cek($id)->row_array();
            $data['message']="";
            $this->template->display('anggota/edit',$data);
        }
	}

	function _set_rules(){
        $this->form_validation->set_rules('no_anggota','No Anggota','required|max_length[8]');
        $this->form_validation->set_rules('nama','Nama','required|max_length[50]');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('tempat','Tempat','required');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('agama','Agama','required|max_length[20]');
        $this->form_validation->set_rules('no_telp','Nomor Telpon','required|max_length[12]');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('nama_organisasi','Nama Organisasi','required|max_length[50]');
        $this->form_validation->set_rules('jabatan','Jabatan','required|max_length[50]');
        $this->form_validation->set_rules('alamat_org','Alamat Organisasi','required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

}

?>