<?php

class Home_model extends CI_model
{
    public function getAllThread()
    {
        return $this->db->get('home')->result_array();

    }
}