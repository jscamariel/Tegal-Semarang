<?php

class Game_model extends CI_model{
    public function getAllGame(){
        return $this->db->get('forum_game')->result_array();  
    }

    public function tambahDataGame(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_game', $data);
    }

    public function hapusDataGame($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_game');
    }

    public function getGameById($id_thread){
        return $this->db->get_where('forum_game',['id_thread'=> $id_thread])->row_array();
    }

    public function ubahDataGame(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_game',$data);
    }

    public function cariDataGame(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_thread',$keyword);
        $this->db->or_like('isi',$keyword);
        return $this->db->get('forum_game')->result_array();
    }
}