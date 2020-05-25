<?php

class Fib extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fib_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {       
        $data['fib'] = $this->Fib_model->getAllFib();
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('fib/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['fib'] = $this->Fib_model->getFibById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('fib/detail', $data);
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
            $this->load->view('fib/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        }else
        {
            $insert=[
                'username' =>  $this->session->userdata('username'),
                'nama_thread' => $this->input->post('nama_thread',true),
                'isi' => $this->input->post('isi',true)
            ];
            $this->Fib_model->tambahDataFib($insert);
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('fib');
        }
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['fib'] = $this->Fib_model->getFibById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('fib/ubah',$data);
            $this->load->view('templates/rightsidebar', $data, $data);
        }else{
            $this->Fib_model->ubahDataFib();
            $this->session->set_flashdata('flash','Diubah');
            redirect('fib');
        }
        
    }

    public function hapus($id_thread){
        $this->Fib_model->hapusDataFib($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('fib');
    }
        
}