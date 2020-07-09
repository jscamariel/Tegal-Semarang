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

    public function user_put(){
      $nim = $this->put('nim');
        
        $data = [
            'nim' => $this->put('nim'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'email' => $this->put('email')
        ];

        if($this->user_model->updateUser($data,$nim) > 0){
            $this->response([
                'status' => true,
                'message' => 'Data Berhasil Diupdate'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function user_get()
    {       
        $id = $this->get('id');
        if($id===null){
            $user = $this->user_model->getAllUser();
        }else{
            $user = $this->user_model->getAllUser($id);
        }
        

        if($user){
            $this->response([
                'status' => true,
                'data' => $user
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
    }
    

    public function register_post(){
      
      $username = $this->post('username');
      $nim = $this->post('nim');
      $email = $this->post('email');
      $password = $this->post('password');
      $registration = $this->user_model->register($username,$nim,$email,$password); 
      if($registration){
        $this->response([
          'error' => true,
          'status' => $registration,
          'message' => 'berhasil register'
      ], REST_Controller::HTTP_OK);
      }else{
        $this->response([
          'error' => false,
          'message' => 'gagal register'
      ], REST_Controller::HTTP_OK);
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
      ], REST_Controller::HTTP_OK);
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