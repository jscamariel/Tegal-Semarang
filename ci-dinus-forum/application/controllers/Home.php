<?php

class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index()
    {       
        $data['home'] = $this->Home_model->getAllThread();
        $this->load->view('templates/header', );
        $this->load->view('templates/sidebar', );
        $this->load->view('home/index', $data);
        $this->load->view('templates/rightsidebar', );
    }
}