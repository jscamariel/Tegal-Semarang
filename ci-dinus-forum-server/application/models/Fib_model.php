<?php

class Fib_model extends CI_model
{
    public function getAllFib($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_fib')->result_array();  
            
        }else{
            return $this->db->get_where('forum_fib', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteFib($id_thread){
        $this->db->delete('forum_fib',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createFib($data){
        $this->db->insert('forum_fib',$data);
        return $this->db->affected_rows();
    }

    public function updateFib($data,$id_thread){
        $this->db->update('forum_fib', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}