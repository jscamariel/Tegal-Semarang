<?php

class Pecintaalam_model extends CI_model
{
    public function getAllPecintaalam(){
        return $this->db->get('forum_pecintaalam')->result_array();  
    }

    public function tambahDataPecintaalam(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_pecintaalam', $data);
    }

    public function getPecintaalamById($id_thread){
        return $this->db->get_where('forum_pecintaalam',['id_thread'=> $id_thread])->row_array();
    }


}