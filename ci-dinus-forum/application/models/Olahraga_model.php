<?php

class Olahraga_model extends CI_model
{

    public function getAllOlahraga($limit, $start)
    {
        $this->db->order_by('id_thread', 'DESC');

        $query = $this->db->get('forum_olahraga', $limit, $start);
        return $query->result_array();
    }


    public function jumlahDataOlahraga()
    {
        return $this->db->get('forum_olahraga')->num_rows();
    }

    public function tambahDataOlahraga($insert)
    {

        $this->db->insert('forum_olahraga', $insert);
    }

    public function hapusDataOlahraga($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_olahraga');
    }

    public function getOlahragaById($id_thread)
    {
        return $this->db->get_where('forum_olahraga', ['id_thread' => $id_thread])->row_array();
    }

    public function ubahDataOlahraga()
    {
        $data = [
            'nama_thread' => $this->input->post('nama_thread', true),
            'isi' => $this->input->post('isi', true)
        ];

        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_olahraga', $data);
    }

    public function cariDataOlahraga()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_thread', $keyword);
        $this->db->or_like('isi', $keyword);
        return $this->db->get('forum_olahraga')->result_array();
    }

    public function getUser()
    {
        $this->db->from('forum_olahraga');
        $this->db->join('user', 'user.user_id = forum_elektro.user_id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jumlahKomen($id_thread)
    {
        $this->db->where('id_thread ', $id_thread);
        $query = $this->db->get('komentar');
        return $query->num_rows();
    }

    public function jumlahLike($id_thread)
    {
        $this->db->where('id_thread >=', $id_thread);
        $query = $this->db->get('tb_vote');
        return $query->num_rows();
    }

    public function jumlahDislike($id_thread)
    {
        $this->db->where('id_thread >=', $id_thread);
        $query = $this->db->get('tb_vote');
        return $query->num_rows();
    }

    public function getrow($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
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
