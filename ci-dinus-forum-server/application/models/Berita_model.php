<?php

class Berita_model extends CI_model
{
    public function getAllBerita($id_thread = null){
        if($id_thread===null){
            $this->db->join('user', 'user.username =  berita.username');
            return $this->db->get('berita')->result_array();  
            
        }else{
            return $this->db->get_where('berita', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteBerita($id_thread){
        $this->db->delete('berita',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createBerita($data){
        $this->db->insert('berita',$data);
        return $this->db->affected_rows();
    }

    public function updateberita($data,$id_thread){
        $this->db->update('berita', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}