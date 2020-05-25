<?php

class Feb_model extends CI_model
{
    public function getAllFeb(){
        $this->db->select('forum_feb.*');
        $this->db->from('forum_feb');
        $this->db->join('user', 'user.username =  forum_feb.username');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahDataFeb($insert){
    
        $this->db->insert('forum_feb', $insert);
    }

    public function getFebById($id_thread){
        return $this->db->get_where('forum_feb',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataFeb($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_feb');
    }

   public function ubahDataFeb(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_feb',$data);
    }
}