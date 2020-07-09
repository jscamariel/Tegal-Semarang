<?php

class Feb_model extends CI_model
{
    public function getAllFeb($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_feb')->result_array();  
            
        }else{
            return $this->db->get_where('forum_feb', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteFeb($id_thread){
        $this->db->delete('forum_feb',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createFeb($data){
        $this->db->insert('forum_feb',$data);
        return $this->db->affected_rows();
    }

    public function updateFeb($data,$id_thread){
        $this->db->update('forum_feb', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}