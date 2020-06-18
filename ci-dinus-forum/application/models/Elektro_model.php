<?php

class Elektro_model extends CI_model
{
    public function getAllElektro()
    {
        $this->db->order_by('id_thread', 'DESC');

        $query = $this->db->get('forum_elektro');
        return $query->result_array();
        // return $this->db->get('forum_elektro')->result_array();  
    }

    public function getUser()
    {
        $this->db->from('forum_elektro');
        $this->db->join('user', 'user.user_id = forum_elektro.user_id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambahDataElektro($insert)
    {
        $this->db->insert('forum_elektro', $insert);
    }


    public function getElektroById($id_thread)
    {
        return $this->db->get_where('forum_elektro', ['id_thread' => $id_thread])->row_array();
    }

    public function tambahKomentarElektro($insert)
    {
        $this->db->insert('komentar', $insert);
    }

    public function getAllKomentar()
    {
        return $this->db->get('komentar')->result_array();
    }

    public function hapusDataElektro($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_elektro');
    }

    public function ubahDataElektro()
    {
        $data = [
            'nama_thread' => $this->input->post('nama_thread', true),
            'isi' => $this->input->post('isi', true)
        ];

        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_elektro', $data);
    }

    public function getrow($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function hapusKomentar($id_komentar)
    {
        $this->db->where('id_komentar', $id_komentar);
        $this->db->delete('komentar');
    }
}
