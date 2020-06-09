<?php

class Auth_model extends CI_Model
{
    public function login_user()
    {

        $query = $this->db->get_where('user', array('username' => $this->input->post('username'), 'password' => $this->input->post('password')));

        return $query->row_array();
    }

    public function tambahUser($data)
    {
        return $this->db->insert('user', $data);
    }
}
