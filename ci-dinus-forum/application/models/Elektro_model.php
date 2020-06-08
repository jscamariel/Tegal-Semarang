<?php

class Elektro_model extends CI_model
{
    public function getAllElektro()
    {
        return $this->db->get('forum_elektro')->result_array();

        // return $this->db->get('forum_elektro')->result_array();  
    }

    public function tambahDataElektro($insert)
    {

        $this->db->insert('forum_elektro', $insert);
        //print_r($this->db->error());
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
        $this->db->select('*');
        $this->db->from('forum_elektro');
        $this->db->join('user', 'user.username = forum_elektro.username');
        $this->db->join('komentar', 'komentar.username = user.username', 'komentar.isi_komentar = forum_elektro.isi_komentar');
        $query = $this->db->get();

        return $query->result_array();
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
}
