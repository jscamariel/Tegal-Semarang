<?php

class Fotografi_model extends CI_model
{
    public function getAllFotografi($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_fotografi')->result_array();  
            
        }else{
            return $this->db->get_where('forum_fotografi', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteFotografi($id_thread){
        $this->db->delete('forum_fotografi',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createFotografi($data){
        $this->db->insert('forum_fotografi',$data);
        return $this->db->affected_rows();
    }

    public function updateFotografi($data,$id_thread){
        $this->db->update('forum_fotografi', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}