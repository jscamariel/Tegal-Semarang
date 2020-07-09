<?php

class Game_model extends CI_model
{
    public function getAllGame($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_game')->result_array();  
            
        }else{
            return $this->db->get_where('forum_game', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteGame($id_thread){
        $this->db->delete('forum_game',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createGame($data){
        $this->db->insert('forum_game',$data);
        return $this->db->affected_rows();
    }

    public function updateGame($data,$id_thread){
        $this->db->update('forum_game', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}