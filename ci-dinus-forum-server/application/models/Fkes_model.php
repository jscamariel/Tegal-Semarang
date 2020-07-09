<?php

class Fkes_model extends CI_model
{
    public function getAllFkes($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_fkes')->result_array();  
            
        }else{
            return $this->db->get_where('forum_fkes', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteFkes($id_thread){
        $this->db->delete('forum_fkes',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createFkes($data){
        $this->db->insert('forum_fkes',$data);
        return $this->db->affected_rows();
    }

    public function updateFkes($data,$id_thread){
        $this->db->update('forum_fkes', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}