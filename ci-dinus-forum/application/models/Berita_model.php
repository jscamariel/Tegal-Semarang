<?php

class Berita_model extends CI_model
{
    public function getAllBerita()
    {
        return $this->db->get('berita')->result_array();
    }

    public function getBerita($limit, $start)
    {
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get('berita', $limit, $start);
        return $query->result_array();
        // return $this->db->get('berita')->result_array();  
    }


    public function jumlahDataBerita()
    {
        return $this->db->get('berita')->num_rows();
    }

    public function getBeritaById($id)
    {
        return $this->db->get_where('berita', ['id' => $id])->row_array();
    }

    public function tambahBeritaBaru($insert)
    {
        return $this->db->insert('berita', $insert);
    }
}
