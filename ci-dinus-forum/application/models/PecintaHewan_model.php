<?php

class Pecintahewan_model extends CI_model
{
    public function getAllPecintahewan(){
        $this->db->select('forum_pecintahewan.*');
        $this->db->from('forum_pecintahewan');
        $this->db->join('user', 'user.username =  forum_pecintahewan.username');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahDataPecintahewan($insert)
    {
        $this->db->insert('forum_pecintahewan', $insert);
    }

    public function getPecintahewanById($id_thread){
        return $this->db->get_where('forum_pecintahewan',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataPecintahewan($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_pecintahewan');
    }

    public function ubahDataPecintahewan(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_pecintahewan',$data);
    }


}