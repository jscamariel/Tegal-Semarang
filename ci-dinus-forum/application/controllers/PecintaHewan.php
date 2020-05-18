<?php

class Pecintahewan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pecintahewan_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {       
        $data['pecintahewan'] = $this->Pecintahewan_model->getAllPecintahewan();
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pecintahewan/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['pecintahewan'] = $this->Pecintahewan_model->getPecintahewanById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pecintahewan/detail', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pecintahewan/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        }else
        {
            $this->Pecintahewan_model->tambahDataPecintahewan();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('pecintahewan');
        }
    }
        
}