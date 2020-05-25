<?php

class Otomotif_model extends CI_model
{
    public function getAllOtomotif(){
        $this->db->select('forum_otomotif.*');
        $this->db->from('forum_otomotif');
        $this->db->join('user', 'user.username =  forum_otomotif.username');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahDataOtomotif($insert)
    {
        $this->db->insert('forum_otomotif', $insert);
    }

    public function getOtomotifById($id_thread){
        return $this->db->get_where('forum_otomotif',['id_thread'=> $id_thread])->row_array();
    }

    public function hapusDataOtomotif($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_otomotif');
    }

    public function ubahDataOtomotif(){
        $data = [
            'nama_thread' => $this->input->post('nama_thread',true),
            'isi' => $this->input->post('isi',true)
        ];
    
        $this->db->where('id_thread', $this->input->post('id_thread'));
        $this->db->update('forum_otomotif',$data);
    }


}