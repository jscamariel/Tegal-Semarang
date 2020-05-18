<?php

class Game_model extends CI_model
{
    public function getAllGame(){
        return $this->db->get('forum_game')->result_array();  
    }

    public function tambahDataGame(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_game', $data);
    }

    public function getGameById($id_thread){
        return $this->db->get_where('forum_game',['id_thread'=> $id_thread])->row_array();
    }


}