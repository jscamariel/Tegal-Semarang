<?php

class Event_model extends CI_model
{
    public function getAllEvent(){
        return $this->db->get('event')->result_array();  
    }

    public function getEventById($id){
        return $this->db->get_where('event',['id'=> $id])->row_array();
    }

}