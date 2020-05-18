<?php

class Otomotif_model extends CI_model
{
    public function getAllOtomotif(){
        return $this->db->get('forum_otomotif')->result_array();  
    }

    public function tambahDataOtomotif(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_otomotif', $data);
    }

    public function getOtomotifById($id_thread){
        return $this->db->get_where('forum_otomotif',['id_thread'=> $id_thread])->row_array();
    }


}