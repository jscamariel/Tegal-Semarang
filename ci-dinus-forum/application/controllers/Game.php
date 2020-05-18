<?php

class Game extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Game_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = 'Kategori Game';
        $data['game'] = $this->Game_model->getAllGame(); 
        if($this->input->post('keyword')){
            $data['game'] = $this->Game_model->cariDataGame();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('game/index', $data);
        $this->load->view('templates/rightsidebar');
    }

    public function tambah(){
        $data['judul'] = 'Buat Thread Baru';
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('game/tambah');
            $this->load->view('templates/rightsidebar');
        }else{
            $this->Game_model->tambahDataGame();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('game');
        }
        
    }

    public function hapus($id_thread){
        $this->Game_model->hapusDataGame($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('game');
    }

    public function detail($id_thread){
        $data['game'] = $this->Game_model->getGameById($id_thread);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('game/detail' , $data);
        $this->load->view('templates/rightsidebar');
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['game'] = $this->Game_model->getGameById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('game/ubah',$data);
            $this->load->view('templates/rightsidebar');
        }else{
            $this->Game_model->ubahDataGame();
            $this->session->set_flashdata('flash','Diubah');
            redirect('game');
        }
        
    }
}