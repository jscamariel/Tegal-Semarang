<?php

class Event_model extends CI_model
{
    public function getAllEvent($id_thread = null){
        if($id_thread===null){
            $this->db->join('user', 'user.username =  event.username');
            return $this->db->get('event')->result_array();  
            
        }else{
            return $this->db->get_where('event', ['id_thread' => $id_thread])->result_array();  
        }
        
    }

    public function deleteEvent($id_thread){
        $this->db->delete('event',['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }

    public function createEvent($data){
        $this->db->insert('event',$data);
        return $this->db->affected_rows();
    }

    public function updateEvent($data,$id_thread){
        $this->db->update('event', $data, ['id_thread' => $id_thread]);
        return $this->db->affected_rows();
    }
}