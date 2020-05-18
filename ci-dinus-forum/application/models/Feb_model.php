<?php

class Feb_model extends CI_model
{
    public function getAllFeb(){
        return $this->db->get('forum_feb')->result_array();  
    }

    public function tambahDataFeb(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_feb', $data);
    }

    public function getFebById($id_thread){
        return $this->db->get_where('forum_feb',['id_thread'=> $id_thread])->row_array();
    }

}