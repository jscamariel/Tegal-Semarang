<?php

class Berita_model extends CI_model
{
    public function getAllBerita($id_thread = null){
        if($id_thread===null){
            
            return $this->db->get('berita')->result_array();  
            
        }else{
            return $this->db->get_where('berita', ['id' => $id])->result_array();  
        }
        
    }

    
}