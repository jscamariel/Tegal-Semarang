<?php

class Otomotif_model extends CI_model
{
    public function getAllOtomotif($limit, $start)
    {
        $this->db->order_by('id_thread', 'DESC');

        $query = $this->db->get('forum_otomotif', $limit, $start);
        return $query->result_array();
    }


    public function jumlahDataOtomotif()
    {
        return $this->db->get('forum_otomotif')->num_rows();
    }
    public function tambahDataOtomotif($insert)
    {
        $this->db->insert('forum_otomotif', $insert);
    }

    public function getOtomotifById($id_thread)
    {
        return $this->db->get_where('forum_otomotif', ['id_thread' => $id_thread])->row_array();
    }

    public function hapusDataOtomotif($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_otomotif');
    }

    public function ubahDataOtomotif()
    {
        $data = [
            'nama_thread' => $this->input->post('nama_thread', true),
            'isi' => $this->input->post('isi', true)
        ];

        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_otomotif', $data);
    }


    public function getUser()
    {
        $this->db->from('forum_otomotif');
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
