<?php

class Fkes_model extends CI_model
{
    public function getAllFkes(){
        $this->db->select('forum_fkes.*');
        $this->db->from('forum_fkes');
        $this->db->join('user', 'user.username =  forum_fkes.username');
        $query = $this->db->get();
        return $query->result_array();  
    }

    public function tambahDataFkes($insert){
    
        $this->db->insert('forum_fkes', $insert);
    }

    public function getFkesById($id_thread){
        return $this->db->get_where('forum_fkes',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataFkes($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fkes');
    }

    public function ubahDataFkes(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_fkes',$data);
    }

}