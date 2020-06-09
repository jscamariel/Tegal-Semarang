<?php

class Home_model extends CI_model
{
    public function getAllHome()
    {
        $this->db->select('home.*');
        $this->db->from('home');
        $this->db->join('user', 'user.username =  home.username');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserPicture()
    {
        $this->db->select('*');
        $this->db->from('home');
        $this->db->join('user', 'user.gambar =  home.gambar_profile');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambahDataHome($insert)
    {
        $this->db->insert('home', $insert);
    }

    public function getHomeById($id_thread)
    {
        return $this->db->get_where('home', ['id_thread' => $id_thread])->row_array();
    }

    public function hapusDataHome($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('home');
    }

    public function ubahDataHome()
    {
        $data = [
            'nama_thread' => $this->input->post('nama_thread', true),
            'isi' => $this->input->post('isi', true)
        ];

        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('home', $data);
    }
}
