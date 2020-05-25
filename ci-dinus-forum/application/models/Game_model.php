<?php

class Game_model extends CI_model
{
    public function getAllGame(){
        $this->db->select('forum_game.*');
        $this->db->from('forum_game');
        $this->db->join('user', 'user.username =  forum_game.username');
        $query = $this->db->get();
        return $query->result_array();   
    }

    public function tambahDataGame($insert)
    {    
        $this->db->insert('forum_game', $insert);
    }

    public function getGameById($id_thread){
        return $this->db->get_where('forum_game',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataGame($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_game');
    }

    public function ubahDataGame(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_game',$data);
    }


}