<?php

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/berita/index/';
        $config['total_rows'] = $this->Berita_model->jumlahDataBerita();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        $data['start'] = $this->uri->segment(3);
        $data['berita'] = $this->Berita_model->getBerita($config['per_page'], $data['start']);
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Berita';

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
