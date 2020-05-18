<?php

class Fik_model extends CI_model
{
    public function getAllFIk(){
        return $this->db->get('forum_fik')->result_array();  
    }

    public function tambahDataFik(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->insert('forum_fik', $data);
        //print_r($this->db->error());
    }

    public function getFikById($id_thread){
        return $this->db->get_where('forum_fik',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataFik($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fik');
    }

    public function ubahDataFik(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_fik',$data);
    }

}