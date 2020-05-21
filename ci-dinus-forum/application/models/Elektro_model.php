<?php
use GuzzleHttp\Client;

class Elektro_model extends CI_model
{
    private $_client;
    public function __construct(){
        $this->_client = new Client([
            'base_uri' => 'http://localhost/ci-dinus-forum-server/api/'
        ]);
    }

    public function getAllElektro(){
        $response = $this->_client->request('GET','elektro');
        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'];
    }

    public function tambahDataElektro(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $response = $this->_client->request('POST','elektro',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function getElektroById($id_thread){
        $response = $this->_client->request('GET','elektro',[
            'query' => [
                'id_thread' => $id_thread
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'][0];
    }

    public function hapusDataElektro($id_thread){
        $response = $this->_client->request('DELETE','elektro',[
            'form_params' => [
                'id_thread' => $id_thread
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(),true);
        return $result ;
    }

    public function ubahDataElektro(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true),
            'id_thread' => $this->input->post('id_thread',true)
        ];
    
        $response = $this->_client->request('PUT','elektro',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

}