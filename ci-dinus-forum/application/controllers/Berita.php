<?php

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Berita';
        $data['berita'] = $this->Berita_model->getAllBerita();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('berita/index');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Detail Berita';
        $data['berita'] = $this->Berita_model->getBeritaById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('berita/detail');
    }
}
