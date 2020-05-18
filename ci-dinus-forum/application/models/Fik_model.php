<?php

class Fik_model extends CI_model
{
    public function getAllFik(){
        return $this->db->get('forum_fik')->result_array();  
    }

    public function tambahDataFik(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_fik', $data);
    }

    public function getFikById($id_thread){
        return $this->db->get_where('forum_fik',['id_thread'=> $id_thread])->row_array();
    }


}