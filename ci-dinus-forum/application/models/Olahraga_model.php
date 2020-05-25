<?php

class Olahraga_model extends CI_model{
    public function getAllOlahraga(){
        $this->db->select('forum_olahraga.*');
        $this->db->from('forum_olahraga');
        $this->db->join('user', 'user.username =  forum_olahraga.username');
        $query = $this->db->get();
        return $query->result_array(); 
    }

    public function tambahDataOlahraga($insert){
    
        $this->db->insert('forum_olahraga', $insert);
    }

    public function hapusDataOlahraga($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_olahraga');
    }

    public function getOlahragaById($id_thread){
        return $this->db->get_where('forum_olahraga',['id_thread'=> $id_thread])->row_array();
    }

    public function ubahDataOlahraga(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_olahraga',$data);
    }

    public function cariDataOlahraga(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_thread',$keyword);
        $this->db->or_like('isi',$keyword);
        return $this->db->get('forum_olahraga')->result_array();
    }
}