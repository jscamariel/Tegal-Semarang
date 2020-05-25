<?php

class Fib_model extends CI_model
{
    public function getAllFib(){
        $this->db->select('forum_fib.*');
        $this->db->from('forum_fib');
        $this->db->join('user', 'user.username =  forum_fib.username');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahDataFib($insert){
    
        $this->db->insert('forum_fib', $insert);
    }

    public function getFibById($id_thread){
        return $this->db->get_where('forum_fib',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataFib($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fib');
    }

    public function ubahDataFib(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_fib',$data);
    }


}