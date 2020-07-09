<?php

class Event_model extends CI_model
{
    public function getAllEvent()
    {
        return $this->db->get('event')->result_array();
    }


    public function getEvent($limit, $start)
    {
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get('event', $limit, $start);
        return $query->result_array();
        // return $this->db->get('event')->result_array();  
    }


    public function jumlahDataEvent()
    {
        return $this->db->get('event')->num_rows();
    }

    public function getEventById($id)
    {
        return $this->db->get_where('event', ['id' => $id])->row_array();
    }

    public function tambahEventbaru($insert)
    {
        return $this->db->insert('event', $insert);
    }
}
