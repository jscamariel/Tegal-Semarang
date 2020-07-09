<?php

class Pecintahewan_model extends CI_model
{
    public function getAllPecintahewan($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_pecintahewan')->result_array();  
            
        }else{
            return $this->db->get_where('forum_pecintahewan', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deletePecintahewan($id_thread){
        $this->db->delete('forum_pecintahewan',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createPecintahewan($data){
        $this->db->insert('forum_pecintahewan',$data);
        return $this->db->affected_rows();
    }

    public function updatePecintahewan($data,$id_thread){
        $this->db->update('forum_pecintahewan', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}