<?php

class Komentar_model extends CI_model
{
    public function getAllKomentar($id_thread=null){
        if($id_thread===null){
            //$this->db->join('user', 'user.username =  komentar.username');
            //$this->db->join('forum_elektro', 'forum_elektro.id_thread =  komentar.id_thread');
            //return $this->db->get('komentar')->result_array();  
            return $this->db->get('komentar')->result_array();
        }else{
            //$this->db->join('komentar', 'forum_elektro.id_thread =  komentar.id_thread');
            return $this->db->get_where('komentar', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function createKomentar($data){
        $this->db->insert('komentar',$data);
        return $this->db->affected_rows();
    }

}