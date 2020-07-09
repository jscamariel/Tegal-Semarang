<?php

class Otomotif_model extends CI_model
{
    public function getAllOtomotif($id_thread = null){
        if($id_thread===null){
            return $this->db->get('forum_otomotif')->result_array();  
            
        }else{
            return $this->db->get_where('forum_otomotif', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteOtomotif($id_thread){
        $this->db->delete('forum_otomotif',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createOtomotif($data){
        $this->db->insert('forum_otomotif',$data);
        return $this->db->affected_rows();
    }

    public function updateOtomotif($data,$id_thread){
        $this->db->update('forum_otomotif', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}