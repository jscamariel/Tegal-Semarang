<?php

class Otomotif extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Otomotif_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = 'Kategori Otomotif';
        $data['otomotif'] = $this->Otomotif_model->getAllOtomotif(); 
        if($this->input->post('keyword')){
            $data['otomotif'] = $this->Otomotif_model->cariDataOtomotif();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('otomotif/index', $data);
        $this->load->view('templates/rightsidebar');
    }

    public function tambah(){
        $data['judul'] = 'Buat Thread Baru';
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('otomotif/tambah');
            $this->load->view('templates/rightsidebar');
        }else{
            $this->Otomotif_model->tambahDataOtomotif();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('otomotif');
        }
        
    }

    public function hapus($id_thread){
        $this->Otomotif_model->hapusDataOtomotif($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('otomotif');
    }

    public function detail($id_thread){
        $data['otomotif'] = $this->Otomotif_model->getOtomotifById($id_thread);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('otomotif/detail' , $data);
        $this->load->view('templates/rightsidebar');
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['otomotif'] = $this->Otomotif_model->getOtomotifById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('otomotif/ubah',$data);
            $this->load->view('templates/rightsidebar');
        }else{
            $this->Otomotif_model->ubahDataOtomotif();
            $this->session->set_flashdata('flash','Diubah');
            redirect('otomotif');
        }
        
    }
}