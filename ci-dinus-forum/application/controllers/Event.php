<?php

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Event';
        $data['event'] = $this->Event_model->getAllEvent();
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
