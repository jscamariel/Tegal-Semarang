<?php

class Admin_model extends CI_model
{
    public function getAllElektro(){
        return $this->db->get('forum_elektro')->result_array();  
    }
}