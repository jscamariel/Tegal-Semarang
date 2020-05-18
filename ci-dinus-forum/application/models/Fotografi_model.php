<?php

class Fotografi_model extends CI_model{
    public function getAllFotografi(){
        return $this->db->get('forum_fotografi')->result_array();  
    }

    public function tambahDataFotografi(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_fotografi', $data);
    }

    public function hapusDataFotografi($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fotografi');
    }

    public function getFotografiById($id_thread){
        return $this->db->get_where('forum_fotografi',['id_thread'=> $id_thread])->row_array();
    }

    public function ubahDataFotografi(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_fotografi',$data);
    }

    public function cariDataFotografi(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_thread',$keyword);
        $this->db->or_like('isi',$keyword);
        return $this->db->get('forum_fotografi')->result_array();
    }
}