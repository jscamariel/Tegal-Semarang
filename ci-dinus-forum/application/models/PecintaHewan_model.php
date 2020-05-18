<?php

class Pecintahewan_model extends CI_model
{
    public function getAllPecintahewan(){
        return $this->db->get('forum_pecintahewan')->result_array();  
    }

    public function tambahDataPecintahewan(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_pecintahewan', $data);
    }

    public function getPecintahewanById($id_thread){
        return $this->db->get_where('forum_pecintahewan',['id_thread'=> $id_thread])->row_array();
    }


}