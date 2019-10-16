<?php
class Index extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('m_pustakawan'));
    }
    
    function index(){
        $this->load->view('index/index.php');
    }
    
    function proses(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','No. Pustakawan dan Kata Sandi harus diisi');
            redirect('index');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $cek=$this->m_pustakawan->login($username,md5($password));
            if($cek->num_rows()>0){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
                redirect('dashboard');
                
            }else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah');
                redirect('index');
            }
        }
    }
}