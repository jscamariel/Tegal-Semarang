<?php

class Elektro_model extends CI_model
{
    public function getAllElektro(){
        return $this->db->get('forum_elektro')->result_array();  
    }

    public function tambahDataElektro(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_elektro', $data);
    }

    public function getElektroById($id_thread){
        return $this->db->get_where('forum_elektro',['id_thread'=> $id_thread])->row_array();
    }


}