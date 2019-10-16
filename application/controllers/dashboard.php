<?php
class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_pustakawan');
        $this->load->library(array('template'));
        
        if(!$this->session->userdata('username')){
            redirect('index');
        }
    }
    
    function index(){
        $data['title']="Home";
        
        $this->template->display('dashboard/index',$data);
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        redirect('index');
    }
}