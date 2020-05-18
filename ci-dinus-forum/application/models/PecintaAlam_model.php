<?php

class PecintaAlam_model extends CI_model{
    public function getAllPecintaAlam(){
        return $this->db->get('forum_pecintaalam')->result_array();  
    }

    public function tambahDataPecintaAlam(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_pecintaalam', $data);
    }

    public function hapusDataPecintaAlam($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_pecintaalam');
    }

    public function getPecintaAlamById($id_thread){
        return $this->db->get_where('forum_pecintaalam',['id_thread'=> $id_thread])->row_array();
    }

    public function ubahDataPecintaAlam(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_pecintaalam',$data);
    }

    public function cariDataPecintaAlam(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_thread',$keyword);
        $this->db->or_like('isi',$keyword);
        return $this->db->get('forum_pecintaalam')->result_array();
    }
}