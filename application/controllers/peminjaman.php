<?php
class Peminjaman extends CI_Controller{
    private $limit = 20;

    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','template', 'pagination'));
        $this->load->model('m_peminjaman');
        
        if(!$this->session->userdata('username')){
            redirect('index');
        }
    }
    
    function index($offset=0, $order_column='no_anggota',$order_type='asc'){
        if (empty($offset)) $offset=0;
        if (empty($order_column)) $order_column='no_anggota';
        if (empty($order_type)) $order_type='asc';

        //load data
        $data['peminjaman'] = $this->m_peminjaman->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Peminjaman";
        $data['anggota']=$this->m_peminjaman->getAnggota()->result();
        $data['pustakawan']=$this->m_peminjaman->getPustakawan()->result();

        $config['base_url']=site_url('peminjaman/index/');
        $config['total_rows']=$this->m_peminjaman->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();

        if($this->uri->segment(3)=="add_success"){
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan!</div>";
            $this->template->display('peminjaman/index',$data);
        }else{
            $data['message']='';
            $this->template->display('peminjaman/index',$data);
        }
    }
    
    function cari(){
        $data['title']="Pencarian";
        $data['anggota']=$this->m_peminjaman->getAnggota()->result();
        $data['pustakawan']=$this->m_peminjaman->getPustakawan()->result();
        
        $cari=$this->input->post('cari');
        $cek=$this->m_peminjaman->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['peminjaman']=$cek->result();
            $this->template->display('peminjaman/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['peminjaman']=$cek->result();
            $this->template->display('peminjaman/cari',$data);
        }
    }

    function tampil(){
        $data['tmp']=$this->m_peminjaman->tampilTmp()->result();
        $data['jumlahTmp']=$this->m_peminjaman->jumlahTmp();
        $this->load->view('peminjaman/tampil',$data);
    }
    
    function baru(){
        $data['title']="Transaksi Peminjaman";
        $data['noauto']=$this->m_peminjaman->nootomatis();
        $data['anggota']=$this->m_peminjaman->getAnggota()->result();
        $data['no_pustakawan'] = $this->session->userdata('username');
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $info=array(
                'no_peminjaman'=>$this->input->post('no_peminjaman'),
                'no_anggota'=>$this->input->post('no_anggota'),
                'no_pustakawan'=>$this->input->post('no_pustakawan')
            );
            $this->m_peminjaman->simpan($info);
            
            $tmp=$this->m_peminjaman->tampilTmp()->result();
            foreach ($tmp as $row) {
                $detail=array(
                    'no_detail'=>$this->m_peminjaman->nootomatisdetail(),
                    'no_buku'=>$row->no_buku,
                    'tanggal_pinjam'=>$row->tanggal_pinjam,
                    'tanggal_kembali'=>$row->tanggal_kembali,
                    'banyaknya'=>$row->banyaknya,
                    'no_peminjaman'=>$this->input->post('no_peminjaman')
                );
                $buku=$this->m_peminjaman->cariBuku($row->no_buku);
                if($buku->num_rows()>0){
                    $buku=$buku->row_array($row->no_buku);
                    $sbuku = array(
                        'stok' => $buku['stok'] - $row->banyaknya
                    );
                }
                $this->m_peminjaman->updatebuku($row->no_buku,$sbuku);
                $this->m_peminjaman->simpandet($detail);
                $this->m_peminjaman->hapusTmp($row->no_buku);
            }
            redirect('peminjaman/index/add_success');
        }else{
            $this->template->display('peminjaman/tambah',$data);
        }

    }

    function cariAnggota(){
        $no_anggota=$this->input->post('no_anggota');
        $anggota=$this->m_peminjaman->cariAnggota($no_anggota);
        if($anggota->num_rows()>0){
            $anggota=$anggota->row_array();
            echo $anggota['nama'];
        }
    }
    
    function cariBuku(){
        $no_buku=$this->input->post('no_buku');
        $buku=$this->m_peminjaman->cariBuku($no_buku);
        if($buku->num_rows()>0){
            $buku=$buku->row_array();
            echo $buku['nama'];
        }
    }
    
    
    function tambah(){
        $no_buku=$this->input->post('no_buku');
        $cek=$this->m_peminjaman->cekTmp($no_buku);
        if($cek->num_rows()<1){
            $info=array(
                'no_buku'=>$this->input->post('no_buku'),
                'tanggal_pinjam'=>$this->input->post('tanggal_pinjam'),
                'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
                'banyaknya'=>$this->input->post('banyaknya')
            );
            $this->m_peminjaman->simpanTmp($info);
        }
    }
    
    function hapus(){
        $no_buku=$this->input->post('no_buku');
        $this->m_peminjaman->hapusTmp($no_buku);
    }
    

    function _set_rules(){
        $this->form_validation->set_rules('no_peminjaman','No. Peminjaman','required|max_length[9]');
        $this->form_validation->set_rules('no_anggota','No. Anggota','required|max_length[8]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}