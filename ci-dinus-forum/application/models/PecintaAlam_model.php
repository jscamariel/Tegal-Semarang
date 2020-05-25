<?php

class Pecintaalam_model extends CI_model
{
    public function getAllPecintaalam(){
        $this->db->select('forum_pecintaalam.*');
        $this->db->from('forum_pecintaalam');
        $this->db->join('user', 'user.username =  forum_pecintaalam.username');
        $query = $this->db->get();
        return $query->result_array(); 
    }

    public function tambahDataPecintaalam($insert)
    {
        $this->db->insert('forum_pecintaalam', $insert);
    }

    public function getPecintaalamById($id_thread){
        return $this->db->get_where('forum_pecintaalam',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataPecintaalam($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_pecintaalam');
    }

    public function ubahDataPecintaalam(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_pecintaalam',$data);
    }

}