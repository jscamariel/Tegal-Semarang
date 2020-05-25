
<?php

class Elektro extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Elektro_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {       
        $data['judul'] = 'Kategori Elektro';
        $data['elektro'] = $this->Elektro_model->getAllElektro();
        if($this->input->post('keyword')){
            //$data['elektro'] = $this->Elektro_model->cariDataElektro();
        }
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('elektro/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['elektro'] = $this->Elektro_model->getElektroById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('elektro/detail', $data);
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
            $this->load->view('elektro/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        }else
        {
            $insert=[
                'username' =>  $this->session->userdata('username'),
                'nama_thread' => $this->input->post('nama_thread',true),
                'isi' => $this->input->post('isi',true)
            ];
            $this->Elektro_model->tambahDataElektro($insert);
            $this->session->set_flashdata('flash','Dibuat');
            redirect('elektro');
        }
    }

    public function ubah($id_thread){
        $data['judul'] = 'Ubah Thread';
        $data['elektro'] = $this->Elektro_model->getElektroById($id_thread);
        $this->form_validation->set_rules('nama_thread','Nama Thread','required');
        $this->form_validation->set_rules('isi','Isi','required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('elektro/ubah',$data);
            $this->load->view('templates/rightsidebar', $data, $data);
        }else{
            $this->Elektro_model->ubahDataElektro();
            $this->session->set_flashdata('flash','Diubah');
            redirect('elektro');
        }
        
    }

    public function hapus($id_thread){
        $this->Elektro_model->hapusDataElektro($id_thread);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('elektro');
    }
        
}