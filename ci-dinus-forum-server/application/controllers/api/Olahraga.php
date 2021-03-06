<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Olahraga extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Olahraga_model');
    }

    public function olahraga_get()
    {       
        $id_thread = $this->get('id_thread');
        if($id_thread===null){
            $olahraga = $this->Olahraga_model->getAllOlahraga();
        }else{
            $olahraga = $this->Olahraga_model->getAllOlahraga($id_thread);
        }
        

        if($olahraga){
            $this->response([
                'status' => true,
                'data' => $olahraga
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
    }

    public function olahraga_delete(){
        $id_thread = $this->delete('id_thread');
        if($id_thread===null){
            $this->response([
                'status' => false,
                'message' => 'add some id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->Olahraga_model->deleteOlahraga($id_thread) > 0){
                $this->response([
                    'status' => true,
                    'id_thread' => $id_thread,
                    'message' => 'Berhasil Dihapus'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'add some id'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function olahraga_post(){
        $data = [
            'id_thread' => $this->post('id_thread'), // Automatically generated by the model
            'username' => $this->post('username'),
            'nama_thread' => $this->post('nama_thread'),
            'isi' => $this->post('isi'),
            'gambar' => $this->post('gambar'),
            'timestamp' => $this->post('timestamp')
        ];

        if($this->Olahraga_model->createOlahraga($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'Data Baru Berhasil Dibuat'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function olahraga_put(){
        $id_thread = $this->put('id_thread');
        
        $data = [
            'id_thread' => $this->put('id_thread'), // Automatically generated by the model
            'username' => $this->put('username'),
            'nama_thread' => $this->put('nama_thread'),
            'isi' => $this->put('isi'),
            'gambar' => $this->put('gambar'),
            'timestamp' => $this->put('timestamp')
        ];

        if($this->Olahraga_model->updateOlahraga($data,$id_thread) > 0){
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
}