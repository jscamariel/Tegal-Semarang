<?php

class Fik_model extends CI_model
{
    public function getAllFik($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_fik')->result_array();  
            
        }else{
            return $this->db->get_where('forum_fik', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteFik($id_thread){
        $this->db->delete('forum_fik',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createFik($data){
        $this->db->insert('forum_fik',$data);
        return $this->db->affected_rows();
    }

    public function updateFik($data,$id_thread){
        $this->db->update('forum_fik', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}