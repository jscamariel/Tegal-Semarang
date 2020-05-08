<?php

class Olahraga extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Olahraga_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = 'Kategori Olahraga';
        $data['olahraga'] = $this->Olahraga_model->getAllOlahraga(); 
        if($this->input->post('keyword')){
            $data['olahraga'] = $this->Olahraga_model->cariDataOlahraga();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('olahraga/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $data['judul'] = 'Buat Thread Baru';
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('olahraga/tambah');
            $this->load->view('templates/footer');
        }else{
            $this->Olahraga_model->tambahDataOlahraga();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('olahraga');
        }
        
    }

    public function hapus($id_thread){
        $this->Olahraga_model->hapusDataOlahraga($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('olahraga');
    }

    public function detail($id_thread){
        $data['judul'] = 'Detail Data Olahraga';
        $data['olahraga'] = $this->Olahraga_model->getOlahragaById($id_thread);
        $this->load->view('templates/header', $data);
        $this->load->view('olahraga/detail' , $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['olahraga'] = $this->Olahraga_model->getOlahragaById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('olahraga/ubah',$data);
            $this->load->view('templates/footer');
        }else{
            $this->Olahraga_model->ubahDataOlahraga();
            $this->session->set_flashdata('flash','Diubah');
            redirect('olahraga');
        }
        
    }
}