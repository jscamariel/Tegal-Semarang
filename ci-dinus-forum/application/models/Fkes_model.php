<?php

class Fkes_model extends CI_model
{
    public function getAllFkes(){
        return $this->db->get('forum_fkes')->result_array();  
    }

    public function tambahDataFkes(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_fkes', $data);
    }

    public function getFkesById($id_thread){
        return $this->db->get_where('forum_fkes',['id_thread'=> $id_thread])->row_array();
    }


}