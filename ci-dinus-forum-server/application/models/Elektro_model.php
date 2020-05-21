<?php

class Elektro_model extends CI_model
{
    public function getAllElektro($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_elektro')->result_array();  
        }else{
            return $this->db->get_where('forum_elektro', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteElektro($id_thread){
        $this->db->delete('forum_elektro',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createElektro($data){
        $this->db->insert('forum_elektro',$data);
        return $this->db->affected_rows();
    }

    public function updateElektro($data,$id_thread){
        $this->db->update('forum_elektro', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}