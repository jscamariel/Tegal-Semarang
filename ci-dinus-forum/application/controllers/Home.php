<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {       
        $data['judul'] = 'Beranda';
        $data['home'] = $this->Home_model->getAllHome();
        if($this->input->post('keyword')){
            //$data['Home'] = $this->Home_model->cariDataHome();
        }
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('home/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['home'] = $this->Home_model->getHomeById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('home/detail', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

   
    
    public function tambah()
    {      
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('home/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        }else
        {
            $insert=[
                'username' =>  $this->session->userdata('username'),
                'nama_thread' => $this->input->post('nama_thread',true),
                'isi' => $this->input->post('isi',true)
            ];
            $this->Home_model->tambahDataHome($insert);
            $this->session->set_flashdata('flash','Dibuat');
            redirect('home');
        }
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['home'] = $this->Home_model->getHomeById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('home/ubah',$data);
            $this->load->view('templates/rightsidebar', $data, $data);
        }else{
            $this->Home_model->ubahDataHome();
            $this->session->set_flashdata('flash','Diubah');
            redirect('home');
        }
        
    }

    public function hapus($id_thread){
        $this->Home_model->hapusDataHome($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('home');
    }
}