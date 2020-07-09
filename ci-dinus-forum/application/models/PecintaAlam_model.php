<?php

class Pecintaalam_model extends CI_model
{
    public function getAllPecintaalam($limit, $start)
    {
        $this->db->order_by('id_thread', 'DESC');

        $query = $this->db->get('forum_pecintaalam', $limit, $start);
        return $query->result_array();
    }


    public function jumlahDataPecintaalam()
    {
        return $this->db->get('forum_pecintaalam')->num_rows();
    }

    public function tambahDataPecintaalam($insert)
    {
        $this->db->insert('forum_pecintaalam', $insert);
    }

    public function getPecintaalamById($id_thread)
    {
        return $this->db->get_where('forum_pecintaalam', ['id_thread' => $id_thread])->row_array();
    }

    public function hapusDataPecintaalam($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_pecintaalam');
    }

    public function ubahDataPecintaalam()
    {
        $data = [
            'nama_thread' => $this->input->post('nama_thread', true),
            'isi' => $this->input->post('isi', true)
        ];

        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_pecintaalam', $data);
    }

    public function getUser()
    {
        $this->db->from('forum_pecintaalam');
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
