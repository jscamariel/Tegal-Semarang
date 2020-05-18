<?php

class PecintaHewan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('PecintaHewan_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = 'Kategori PecintaHewan';
        $data['pecintahewan'] = $this->PecintaHewan_model->getAllPecintaHewan(); 
        if($this->input->post('keyword')){
            $data['pecintahewan'] = $this->PecintaHewan_model->cariDataPecintaHewan();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pecintahewan/index', $data);
        $this->load->view('templates/rightsidebar');
    }

    public function tambah(){
        $data['judul'] = 'Buat Thread Baru';
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('pecintahewan/tambah');
            $this->load->view('templates/rightsidebar');
        }else{
            $this->PecintaHewan_model->tambahDataPecintaHewan();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('pecintahewan');
        }
        
    }

    public function hapus($id_thread){
        $this->PecintaHewan_model->hapusDataPecintaHewan($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('pecintahewan');
    }

    public function detail($id_thread){
        $data['pecintahewan'] = $this->PecintaHewan_model->getPecintaHewanById($id_thread);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pecintahewan/detail' , $data);
        $this->load->view('templates/rightsidebar');
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['pecintahewan'] = $this->PecintaHewan_model->getPecintaHewanById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('pecintahewan/ubah',$data);
            $this->load->view('templates/rightsidebar');
        }else{
            $this->PecintaHewan_model->ubahDataPecintaHewan();
            $this->session->set_flashdata('flash','Diubah');
            redirect('pecintahewan');
        }
        
    }
}