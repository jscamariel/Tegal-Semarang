<?php

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/event/index/';
        $config['total_rows'] = $this->Event_model->jumlahDataEvent();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        $data['start'] = $this->uri->segment(3);
        $data['event'] = $this->Event_model->getEvent($config['per_page'], $data['start']);
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Event';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('event/index', $data);
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Detail Event';
        $data['event'] = $this->Event_model->getEventById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('event/detail', $data);
    }
}
