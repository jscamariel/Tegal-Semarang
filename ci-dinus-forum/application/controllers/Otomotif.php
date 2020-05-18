<?php

class Otomotif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Otomotif_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {       
        $data['otomotif'] = $this->Otomotif_model->getAllOtomotif();
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('otomotif/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['otomotif'] = $this->Otomotif_model->getOtomotifById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('otomotif/detail', $data);
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
            $this->load->view('otomotif/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        }else
        {
            $this->Otomotif_model->tambahDataOtomotif();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('otomotif');
        }
    }
        
}