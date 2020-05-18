<?php

class Fotografi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Fotografi_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = 'Kategori Fotografi';
        $data['fotografi'] = $this->Fotografi_model->getAllFotografi(); 
        if($this->input->post('keyword')){
            $data['fotografi'] = $this->Fotografi_model->cariDataFotografi();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('fotografi/index', $data);
        $this->load->view('templates/rightsidebar');
    }

    public function tambah(){
        $data['judul'] = 'Buat Thread Baru';
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('fotografi/tambah');
            $this->load->view('templates/rightsidebar');
        }else{
            $this->Fotografi_model->tambahDataFotografi();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('fotografi');
        }
        
    }

    public function hapus($id_thread){
        $this->Fotografi_model->hapusDataFotografi($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('fotografi');
    }

    public function detail($id_thread){
        $data['fotografi'] = $this->Fotografi_model->getFotografiById($id_thread);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('fotografi/detail' , $data);
        $this->load->view('templates/rightsidebar');
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['fotografi'] = $this->Fotografi_model->getFotografiById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('fotografi/ubah',$data);
            $this->load->view('templates/rightsidebar');
        }else{
            $this->Fotografi_model->ubahDataFotografi();
            $this->session->set_flashdata('flash','Diubah');
            redirect('fotografi');
        }
        
    }
}