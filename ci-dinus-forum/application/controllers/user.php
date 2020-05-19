<?php

  class User extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('user_model');
    }

    public function view($slug = FALSE){
      //$this->load->model('tweet_model');
      $this->load->model('user_meta_model');
      //$this->load->model('follow_model');

      //get profile info
      $data['profile_user'] = $this->user_model->get_user_by_slug($slug);
      if($data['profile_user']){
        //$data['profile_tweets'] = $this->tweet_model->get_tweets_by_user_id($data['profile_user']['id']);
        $data['profile_user_meta'] = $this->user_meta_model->get_user_meta_by_user_id($data['profile_user']['id']);
        if(!$data['profile_user_meta']){
          $data['profile_user_meta']['website'] = '';
          $data['profile_user_meta']['about'] = '';
          $data['profile_user_meta']['avatar'] = false;
        }
        //$data['follow'] = $this->follow_model->get_follow_by_source_id_and_target_id($this->session->userdata('id'), $data['profile_user']['id']);
      }

      //get random user info for sidebar
      $sidebar_users = $this->user_model->get_random(10);
      foreach($sidebar_users as $sidebar_user){
        $sidebar_user['user_meta'] = $this->user_meta_model->get_user_meta_by_user_id($sidebar_user['id']);
        if(!$sidebar_user['user_meta']){
          $sidebar_user['user_meta']['website'] = '';
          $sidebar_user['user_meta']['about'] = '';
          $sidebar_user['user_meta']['avatar'] = false;
        }
        //$sidebar_user['follow'] = $this->follow_model->get_follow_by_source_id_and_target_id($this->session->userdata('id'), $sidebar_user['id']);
        $data['sidebar_users'][] = $sidebar_user;
      }

      $this->load->view('templates/header');
      //$this->load->view('templates/nav');
      $this->load->view('templates/sidebar');
      $this->load->view('user/profile', $data);
      $this->load->view('templates/rightsidebar');
      //$this->load->view('templates/footer');
    }

    public function account(){
      $this->load->model('user_meta_model');

      $data['user_meta_array'] = $this->user_meta_model->get_user_meta_by_user_id($this->session->userdata('id'));

      if(!$data['user_meta_array']){
        $data['user_meta_array']['website'] = '';
        $data['user_meta_array']['about'] = '';
        $data['user_meta_array']['avatar'] = FALSE;
      }

      $this->load->view('templates/header');
      //$this->load->view('templates/nav');
      $this->load->view('templates/sidebar');
      $this->load->view('user/account', $data);
      $this->load->view('templates/rightsidebar');
      //$this->load->view('templates/footer');
    }

    public function login(){
      $this->load->helper('url');
      
      if($user_info = $this->user_model->login_user()){
        $user_session_data = array(
          'id'  => $user_info['id'],
          'username'  => $user_info['username'],
          'email'     => $user_info['email'],
          'logged_in' => TRUE
        );

        $this->session->set_userdata($user_session_data);
        redirect('/', 'location');
      } else {
        $this->load->view('templates/header');
        //$this->load->view('templates/nav');
        $this->load->view('templates/sidebar');
        $this->load->view('home/index');
        $this->load->view('templates/rightsidebar');
        //$this->load->view('templates/footer');
      }
    }

    public function logout(){
      $this->load->helper('url');
      $this->session->sess_destroy();
      redirect('/', 'location');
    }

    public function register(){
      $this->load->helper('url');
      $this->load->library('form_validation');
      //$this->load->model('follow_model');

      $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|is_unique[user.username]|alpha_dash');
      $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|is_unique[user.email]');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        //$this->load->view('templates/nav');
        $this->load->view('templates/sidebar');
        $this->load->view('user/register');
        //$this->load->view('templates/rightsidebar');
        //$this->load->view('templates/footer');
      } else {
        $this->user_model->set_user();

        $user_info = $this->user_model->login_user();
        $user_session_data = array(
          'id'  => $user_info['id'],
          'username'  => $user_info['username'],
          'email'     => $user_info['email'],
          'logged_in' => TRUE
        );

        $this->session->set_userdata($user_session_data);

        //$this->follow_model->set_first_follow();

        redirect('/', 'location');
      }
    }

    public function save(){
      $this->load->helper('url');
      $this->load->library('form_validation');

      if($this->input->post('email') !== $this->session->userdata('email')){
        $extra_validation = '|is_unique[user.email]';
      } else {
        $extra_validation = '';
      }

      $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email' . $extra_validation);
      $this->form_validation->set_rules('password', 'Password', 'min_length[5]');

      if ($this->form_validation->run() == FALSE) {
        $this->account();
      } else {
        if($this->user_model->save_user()){
          $this->session->set_userdata('email', $this->input->post('email'));
          redirect('/account', 'location');
        } else {
          //old password was wrong (or database error)
        }
      }
    }
  }

?>