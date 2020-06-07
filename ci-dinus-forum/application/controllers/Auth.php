<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth/Auth_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    // Index = Fungsi Login
    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login';
            $this->load->view('templates/header_auth', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer_auth');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if ($user == true) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin/admin');
                    } else {
                        redirect('home');
                    }
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Wrong password!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username not found!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth');
            }
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username Already Exist'
        ]);

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[user.nim]', [
            'is_unique' => 'NIM Already Exist'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Already Exist'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[8]|matches[password2]', [
            'matches' => "Password don't match!",
            'min_length' => 'Password Too Short! Min length 8'
        ]);

        $this->form_validation->set_rules('password2', 'Confrim Password', 'required|min_length[8]|matches[password1]', [
            'matches' => "Password don't match!",
            'min_length' => 'Password Too Short! Min length 8'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Create an Account';
            $this->load->view('templates/header_auth', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/footer_auth');
        } else {
            $slug = url_title($this->input->post('username'), 'dash', TRUE);

            $data = [
                'username' => $this->input->post('username', true),
                'nim' => $this->input->post('nim', true),
                'email' => $this->input->post('email', true),
                'slug' => $slug,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2
            ];
            $this->Auth_model->tambahUser($data);

            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Congratulations! Your account has been created.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth', 'location');
        }
    }

    public function logout()
    {
        $this->load->helper('url');
        $this->session->sess_destroy();
        redirect('home');
    }
}
