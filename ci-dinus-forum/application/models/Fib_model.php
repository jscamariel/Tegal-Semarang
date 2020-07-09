<?php

class Fib_model extends CI_model
{
    public function getAllFib($limit, $start)
    {
        $this->db->order_by('id_thread', 'DESC');

        $query = $this->db->get('forum_fib', $limit, $start);
        return $query->result_array();
    }

    public function jumlahDataFib()
    {
        return $this->db->get('forum_fib')->num_rows();
    }

    public function tambahDataFib($insert)
    {

        $this->db->insert('forum_fib', $insert);
    }

    public function getFibById($id_thread)
    {
        return $this->db->get_where('forum_fib', ['id_thread' => $id_thread])->row_array();
    }

    public function hapusDataFib($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_fib');
    }

    public function ubahDataFib()
    {
        $data = [
            'nama_thread' => $this->input->post('nama_thread', true),
            'isi' => $this->input->post('isi', true)
        ];

        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_fib', $data);
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

    public function jumlahKomen($id_thread)
    {
        $this->db->where('id_thread ', $id_thread);
        $query = $this->db->get('komentar');
        return $query->num_rows();
    }

    public function hapusKomentar($id_komentar)
    {
        $this->db->where('id_komentar', $id_komentar);
        $this->db->delete('komentar');
    }

    public function Like($insert)
    {
        $this->db->insert('tb_vote', $insert);
    }

    public function unLike($data)
    {
        $this->db->delete('tb_vote', $data);
    }

    public function disLike($insert)
    {
        $this->db->insert('tb_vote', $insert);
    }

    public function undisLike($data)
    {
        $this->db->delete('tb_vote', $data);
    }
}
