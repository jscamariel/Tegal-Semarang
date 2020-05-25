<?php

class Pecintaalam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pecintaalam_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {       
        $data['pecintaalam'] = $this->Pecintaalam_model->getAllPecintaalam();
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pecintaalam/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['pecintaalam'] = $this->Pecintaalam_model->getPecintaalamById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pecintaalam/detail', $data);
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
            $this->load->view('pecintaalam/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        }else
        {
            $insert=[
                'username' =>  $this->session->userdata('username'),
                'nama_thread' => $this->input->post('nama_thread',true),
                'isi' => $this->input->post('isi',true)
            ];
            $this->Pecintaalam_model->tambahDataPecintaalam($insert);
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('pecintaalam');
        }
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['pecintaalam'] = $this->Pecintaalam_model->getPecintaalamById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('pecintaalam/ubah',$data);
            $this->load->view('templates/rightsidebar', $data, $data);
        }else{
            $this->Pecintaalam_model->ubahDataPecintaalam();
            $this->session->set_flashdata('flash','Diubah');
            redirect('pecintaalam');
        }
        
    }

    public function hapus($id_thread)
    {
        $this->Pecintaalam_model->hapusDataPecintaalam($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('pecintaalam');   
    }

}