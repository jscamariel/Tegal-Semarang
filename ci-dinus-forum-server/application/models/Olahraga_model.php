<?php

class Olahraga_model extends CI_model
{
    public function getAllOlahraga($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_olahraga')->result_array();  
            
        }else{
            return $this->db->get_where('forum_olahraga', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteOlahraga($id_thread){
        $this->db->delete('forum_olahraga',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createOlahraga($data){
        $this->db->insert('forum_olahraga',$data);
        return $this->db->affected_rows();
    }

    public function updateOlahraga($data,$id_thread){
        $this->db->update('forum_olahraga', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}