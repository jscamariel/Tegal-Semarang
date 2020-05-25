<?php

class Fotografi_model extends CI_model
{
    public function getAllFotografi(){
        $this->db->select('forum_fotografi.*');
        $this->db->from('forum_fotografi');
        $this->db->join('user', 'user.username =  forum_fotografi.username');
        $query = $this->db->get();
        return $query->result_array();  
    }

    public function tambahDataFotografi($insert)
    {  
        $this->db->insert('forum_fotografi', $insert);
    }

    public function getFotografiById($id_thread){
        return $this->db->get_where('forum_fotografi',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataFotografi($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fotografi');
    }

    public function ubahDataFotografi(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_fotografi',$data);
    }


}