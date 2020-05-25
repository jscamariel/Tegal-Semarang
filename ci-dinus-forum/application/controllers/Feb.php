<?php

class Feb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Feb_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {       
        $data['feb'] = $this->Feb_model->getAllFeb();
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('feb/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['feb'] = $this->Feb_model->getFebById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('feb/detail', $data);
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
            $this->load->view('feb/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        }else
        {
            $insert=[
                'username' =>  $this->session->userdata('username'),
                'nama_thread' => $this->input->post('nama_thread',true),
                'isi' => $this->input->post('isi',true)
            ];
            $this->Feb_model->tambahDataFeb($insert);
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('feb');
        }
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['feb'] = $this->Feb_model->getFebById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('feb/ubah',$data);
            $this->load->view('templates/rightsidebar', $data, $data);
        }else{
            $this->Feb_model->ubahDataFeb();
            $this->session->set_flashdata('flash','Diubah');
            redirect('feb');
        }
        
    }

    public function hapus($id_thread){
        $this->Feb_model->hapusDataFeb($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('feb');
    }
        
}