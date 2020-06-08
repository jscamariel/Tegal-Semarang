<?php

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_meta_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('user/profile', $data);
  }

  public function edit()
  {
    $data['title'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('username', 'Username', 'required|trim');

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('user/edit_profile', $data);
    } else {
      $username = $this->input->post('username');
      $email = $this->input->post('email');

      $upload_image = $_FILES['gambar'];


      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('username', $username);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Profile has been updated!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>');
      redirect('user');
    }
  }

  public function changepassword()
  {
    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Change Password';
      $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('user/changepassword', $data);
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');

      if (password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
        redirect('user/changepassword');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password</div>');
          redirect('user/changepassword');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed</div>');
          redirect('user/changepassword');
        }
      }
    }
  }
}
