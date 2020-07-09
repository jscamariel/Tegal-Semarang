<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Berita extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
    }

    public function berita_get()
    {       
        $id = $this->get('id');
        if($id===null){
            $berita = $this->Berita_model->getAllBerita();
        }else{
            $berita = $this->Berita_model->getAllBerita($id);
        }
        

        if($berita){
            $this->response([
                'status' => true,
                'data' => $berita
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
    }

    
}