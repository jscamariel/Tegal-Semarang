<?php

class PecintaAlam extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('PecintaAlam_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = 'Kategori PecintaAlam';
        $data['pecintaalam'] = $this->PecintaAlam_model->getAllPecintaAlam(); 
        if($this->input->post('keyword')){
            $data['pecintaalam'] = $this->PecintaAlam_model->cariDataPecintaAlam();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pecintaalam/index', $data);
        $this->load->view('templates/rightsidebar');
    }

    public function tambah(){
        $data['judul'] = 'Buat Thread Baru';
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('pecintaalam/tambah');
            $this->load->view('templates/rightsidebar');
        }else{
            $this->PecintaAlam_model->tambahDataPecintaAlam();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('pecintaalam');
        }
        
    }

    public function hapus($id_thread){
        $this->PecintaAlam_model->hapusDataPecintaAlam($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('pecintaalam');
    }

    public function detail($id_thread){
        $data['pecintaalam'] = $this->PecintaAlam_model->getPecintaAlamById($id_thread);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pecintaalam/detail' , $data);
        $this->load->view('templates/rightsidebar');
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['pecintaalam'] = $this->PecintaAlam_model->getPecintaAlamById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('pecintaalam/ubah',$data);
            $this->load->view('templates/rightsidebar');
        }else{
            $this->PecintaAlam_model->ubahDataPecintaAlam();
            $this->session->set_flashdata('flash','Diubah');
            redirect('pecintaalam');
        }
        
    }
}