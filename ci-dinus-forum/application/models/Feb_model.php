<?php

class Feb_model extends CI_model
{
    public function getAllFeb()
    {
        $this->db->order_by('id_thread', 'DESC');

        $query = $this->db->get('forum_feb');
        return $query->result_array();
    }

    public function tambahDataFeb($insert)
    {

        $this->db->insert('forum_feb', $insert);
    }

    public function getFebById($id_thread)
    {
        return $this->db->get_where('forum_feb', ['id_thread' => $id_thread])->row_array();
    }

    public function hapusDataFeb($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_feb');
    }

    public function ubahDataFeb()
    {
        $data = [
            'nama_thread' => $this->input->post('nama_thread', true),
            'isi' => $this->input->post('isi', true)
        ];

        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_feb', $data);
    }

    public function getrow($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambahKomentar($insert)
    {
        $this->db->insert('komentar', $insert);
    }

    public function getAllKomentar()
    {
        return $this->db->get('komentar')->result_array();
    }

    public function hapusKomentar($id_komentar)
    {
        $this->db->where('id_komentar', $id_komentar);
        $this->db->delete('komentar');
    }
}
