<?php

class PecintaHewan_model extends CI_model{
    public function getAllPecintaHewan(){
        return $this->db->get('forum_pecintahewan')->result_array();  
    }

    public function tambahDataPecintaHewan(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_pecintahewan', $data);
    }

    public function hapusDataPecintaHewan($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_pecintahewan');
    }

    public function getPecintaHewanById($id_thread){
        return $this->db->get_where('forum_pecintahewan',['id_thread'=> $id_thread])->row_array();
    }

    public function ubahDataPecintaHewan(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_pecintahewan',$data);
    }

    public function cariDataPecintaHewan(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_thread',$keyword);
        $this->db->or_like('isi',$keyword);
        return $this->db->get('forum_pecintahewan')->result_array();
    }
}