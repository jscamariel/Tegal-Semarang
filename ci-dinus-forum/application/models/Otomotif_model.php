<?php

class Otomotif_model extends CI_model{
    public function getAllOtomotif(){
        return $this->db->get('forum_otomotif')->result_array();  
    }

    public function tambahDataOtomotif(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_otomotif', $data);
    }

    public function hapusDataOtomotif($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_otomotif');
    }

    public function getOtomotifById($id_thread){
        return $this->db->get_where('forum_otomotif',['id_thread'=> $id_thread])->row_array();
    }

    public function ubahDataOtomotif(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_otomotif',$data);
    }

    public function cariDataOtomotif(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_thread',$keyword);
        $this->db->or_like('isi',$keyword);
        return $this->db->get('forum_otomotif')->result_array();
    }
}