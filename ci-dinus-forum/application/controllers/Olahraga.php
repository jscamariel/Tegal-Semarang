<?php

class Olahraga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Olahraga_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kategori Olahraga';
        $data['olahraga'] = $this->Olahraga_model->getAllOlahraga();
        if ($this->input->post('keyword')) {
            $data['olahraga'] = $this->Olahraga_model->cariDataOlahraga();
        }
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('olahraga/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function tambah()
    {
        $data['judul'] = 'Buat Thread Baru';
        $this->form_validation->set_rules('nama_thread', 'Nama Thread', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('olahraga/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        } else {
            $insert = [
                'username' =>  $this->session->userdata('username'),
                'nama_thread' => $this->input->post('nama_thread', true),
                'isi' => $this->input->post('isi', true)
            ];
            $this->Olahraga_model->tambahDataOlahraga($insert);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('olahraga');
        }
    }

    public function hapus($id_thread)
    {
        $this->Olahraga_model->hapusDataOlahraga($id_thread);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('olahraga');
    }

    public function detail($id_thread)
    {
        $data['olahraga'] = $this->Olahraga_model->getOlahragaById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('olahraga/detail', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function ubah($id_thread)
    {
        $data['judul'] = 'Ubah Thread';
        $data['olahraga'] = $this->Olahraga_model->getOlahragaById($id_thread);
        $this->form_validation->set_rules('nama_thread', 'Nama Thread', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('olahraga/ubah', $data);
            $this->load->view('templates/rightsidebar', $data, $data);
        } else {
            $this->Olahraga_model->ubahDataOlahraga();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('olahraga');
        }
    }
}
