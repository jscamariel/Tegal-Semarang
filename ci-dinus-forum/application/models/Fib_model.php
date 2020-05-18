<?php

class Fib_model extends CI_model
{
    public function getAllFib(){
        return $this->db->get('forum_Fib')->result_array();  
    }

    public function tambahDataFib(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_fib', $data);
    }

    public function getFibById($id_thread){
        return $this->db->get_where('forum_fib',['id_thread'=> $id_thread])->row_array();
    }


}