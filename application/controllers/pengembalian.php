<?php
class Pengembalian extends CI_Controller{
    #code
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation'));
        $this->load->model('m_pengembalian');
        
        if(!$this->session->userdata('username')){
            redirect('index');
        }
    }
    
    function index(){
        $data['title']="Pengembalian Buku";
        $data['tanggal']=date('Y-m-d');
        $this->template->display('pengembalian/index',$data);
    }

    function cariPeminjaman(){
        $no_peminjaman=$this->input->post('no_peminjaman');
        $peminjaman=$this->m_pengembalian->cariTransaksi($no_peminjaman);
        if($peminjaman->num_rows()>0){
            $peminjaman = $peminjaman->row_array();
            echo $peminjaman['no_anggota'];
        }
    }

    function tampil(){
        $no_peminjaman=$_GET['no_peminjaman'];
        $data['anggota']=$this->m_pengembalian->tampilAnggota($no_peminjaman)->result();
        $data['buku']=$this->m_pengembalian->tampilBuku($no_peminjaman)->result();
        $data['sbuku']=$this->m_pengembalian->semuaBuku()->result();
        $transaksi=$this->m_pengembalian->cariPeminjaman($no_peminjaman)->row_array();
        
        $this->load->view('pengembalian/tampilbuku',$data);
    }
    
    function simpan(){
        $info=array(
            'no_peminjaman'=>$this->input->post('no_peminjaman'),
            'no_detail'=>$this->input->post('no_detail'),
            'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
            'no_pustakawan'=>$this->input->post('no_pustakawan')
        );
        $this->m_pengembalian->simpan($info);
        
        //update status peminjaman dari Dipinjam menjadi Dikembalikan
        $no_detail=$this->input->post('no_detail');
        $update=array(
            'status'=>"Dikembalikan"
        );
        $this->m_pengembalian->update($no_detail,$update);

        //update stok buku
        $upbuku=$this->m_pengembalian->cariBuku($no_buku);
        if($upbuku->num_rows()>0){
            $upbuku=$upbuku->row_array($no_buku);
            $stokbuku = array(
                'stok' => $buku['stok'] + $banyaknya
            );
        }
        $this->m_peminjaman->updatebuku($no_buku,$sbuku);
    }
    
    function cari_by_no_anggota(){
        $no_anggota=$this->input->post('no_anggota');
        $data['pencarian']=$this->m_pengembalian->cari_by_no_anggota($no_anggota)->result();
        $this->load->view('pengembalian/pencarian',$data);
    }
    
}
