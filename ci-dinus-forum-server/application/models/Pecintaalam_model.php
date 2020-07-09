<?php

class Pecintaalam_model extends CI_model
{
    public function getAllPecintaalam($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_pecintaalam')->result_array();  
            
        }else{
            return $this->db->get_where('forum_pecintaalam', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deletePecintaalam($id_thread){
        $this->db->delete('forum_pecintaalam',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createPecintaalam($data){
        $this->db->insert('forum_pecintaalam',$data);
        return $this->db->affected_rows();
    }

    public function updatePecintaalam($data,$id_thread){
        $this->db->update('forum_pecintaalam', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}