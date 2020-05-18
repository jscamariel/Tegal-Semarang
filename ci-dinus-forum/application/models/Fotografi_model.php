<?php

class Fotografi_model extends CI_model
{
    public function getAllFotografi(){
        return $this->db->get('forum_Fotografi')->result_array();  
    }

    public function tambahDataFotografi(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_fotografi', $data);
    }

    public function getFotografiById($id_thread){
        return $this->db->get_where('forum_fotografi',['id_thread'=> $id_thread])->row_array();
    }


}