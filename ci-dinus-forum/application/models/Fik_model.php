<?php

class Fik_model extends CI_model
{
    public function getAllFIk($limit, $start)
    {
        $this->db->order_by('id_thread', 'DESC');

        $query = $this->db->get('forum_fik', $limit, $start);
        return $query->result_array();
    }


    public function jumlahDataFik()
    {
        return $this->db->get('forum_fik')->num_rows();
    }

    public function tambahDataFik($insert)
    {

        $this->db->insert('forum_fik', $insert);
        //print_r($this->db->error());
    }

    public function getFikById($id_thread)
    {
        return $this->db->get_where('forum_fik', ['id_thread' => $id_thread])->row_array();
    }

    public function hapusDataFik($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_fik');
    }

    public function ubahDataFik()
    {
        $data = [
            'nama_thread' => $this->input->post('nama_thread', true),
            'isi' => $this->input->post('isi', true)
        ];

        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_fik', $data);
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
