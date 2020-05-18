<?php

class Fik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fik_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {       
        $data['judul'] = 'Kategori FIK';
        $data['fik'] = $this->Fik_model->getAllFik();
        if($this->input->post('keyword')){
            //$data['elektro'] = $this->Elektro_model->cariDataElektro();
        }
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('fik/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['fik'] = $this->Fik_model->getFikById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('fik/detail', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function tambah()
    {
        $data['judul'] = 'Buat Thread Baru';
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('fik/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        }else
        {
            $this->Fik_model->tambahDataFik();
            $this->session->set_flashdata('flash','Dibuat');
            redirect('fik');
        }
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['fik'] = $this->Fik_model->getFikById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('fik/ubah',$data);
            $this->load->view('templates/rightsidebar', $data, $data);
        }else{
            $this->Fik_model->ubahDataFik();
            $this->session->set_flashdata('flash','Diubah');
            redirect('fik');
        }
        
    }

    public function hapus($id_thread){
        $this->Fik_model->hapusDataFik($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('fik');
    }
        
}