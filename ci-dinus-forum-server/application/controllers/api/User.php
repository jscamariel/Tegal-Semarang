<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

  class User extends REST_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('user_model');
    }


    

    public function register_post(){
      $username = $this->post('username');
      $email = $this->post('email');
      $password = $this->post('password');
      $registration = $this->user_model->register($username,$email,$password); 
      if($registration){
        $this->response([
          'status' => $registration,
          'message' => 'berhasil register'
      ], REST_Controller::HTTP_OK);
      }else{
        $this->response([
          'status' => $registration,
          'message' => 'gagal register'
      ], REST_Controller::HTTP_BAD_REQUEST);
      }
     

      
    }

    public function login_post(){
      $username = $this->post('username');
      $password = $this->post('password');
      $logins = $this->user_model->logins($username,$password); 
      if(!$logins){
        $this->response([
          'status' => false,
          'message' => 'wrong username or password'
      ], REST_Controller::HTTP_BAD_REQUEST);
      }else{
        $this->response([
          'status' => true,
          'message' => 'berhasil login',
          'response' => $logins
      ], REST_Controller::HTTP_OK);
      }
    }

  }

?>