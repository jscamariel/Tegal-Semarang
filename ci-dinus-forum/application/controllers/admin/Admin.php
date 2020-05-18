<?php

class Admin extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_model');
    }

    public function index()
    {
        $data['admin'] = $this->Admin_model->getAllElektro();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/index', $data);
    }
}