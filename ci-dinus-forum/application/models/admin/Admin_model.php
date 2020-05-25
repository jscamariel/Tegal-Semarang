<?php

class Admin_model extends CI_model
{
    // Admin Model untuk Kelola Akun
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
    
    // Admin Model untuk Kelola Akun
    public function getAllBerita()
    {
        return $this->db->get('berita')->result_array();
    }
    
    // Admin Model untuk Kelola Akun
    public function getAllEvent()
    {
        return $this->db->get('event')->result_array();
    }

    // Admin Model untuk Kategori Beranda
    public function getAllThread()
    {
        return $this->db->get('home')->result_array();
        
    }

    public function hapusIndex($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('home');
    }

    // Admin Model untuk Kategori Fakultas Teknik Elektro
    public function getAllElektro()
    {
        return $this->db->get('forum_elektro')->result_array();  
    }
    
    public function hapusDataElektro($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_elektro');
    }

    // Admin Model untuk Kategori Fakultas Ilmu Komputer
    public function getAllFik()
    {
        return $this->db->get('forum_fik')->result_array();  
    }

    public function hapusDataFik($id_thread){
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fik');
    }

    // Admin Model untuk Kategori Fakultas Ekonomi dan Bisnis
    public function getAllFeb()
    {
        return $this->db->get('forum_feb')->result_array();  
    }

    public function hapusDataFeb($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_feb');
    }

    // Admin Model untuk Kategori Fakultas Ilmu budaya
    public function getAllFib()
    {
        return $this->db->get('forum_fib')->result_array();  
    }

    public function hapusDataFib($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fib');
    }

    // Admin Model untuk Kategori Fakultas Kesehatan
    public function getAllFkes()
    {
        return $this->db->get('forum_fkes')->result_array();  
    }

    public function hapusDataFkes($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fkes');
    }

    // Admin Model untuk Kategori Hobi Olahraga
    public function getAllOlahraga()
    {
        return $this->db->get('forum_olahraga')->result_array();  
    }

    public function hapusDataOlahraga($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_olahraga');
    }

    // Admin Model untuk Kategori Hobi Otomotif
    public function getAllOtomotif()
    {
        return $this->db->get('forum_otomotif')->result_array();  
    }

    public function hapusDataOtomotif($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_otomotif');
    }

    // Admin Model untuk Kategori Hobi Pecinta Alam
    public function getAllPecintaalam()
    {
        return $this->db->get('forum_pecintaalam')->result_array();  
    }

    public function hapusDataPecintaalam($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_pecintaalam');
    }

    // Admin Model untuk Kategori Hobi Pecinta Hewan
    public function getAllPecintahewan()
    {
        return $this->db->get('forum_pecintahewan')->result_array();  
    }

    public function hapusDataPecintahewan($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_pecintahewan');
    }

    // Admin Model untuk Kategori Hobi Fotografi
    public function getAllFotografi()
    {
        return $this->db->get('forum_fotografi')->result_array();  
    }

    public function hapusDataFotografi($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_fotografi');
    }

    // Admin Model untuk Kategori Hobi Game
    public function getAllGame()
    {
        return $this->db->get('forum_game')->result_array();  
    }

    public function hapusDataGame($id_thread)
    {
        $this->db->where('id_thread',$id_thread);
        $this->db->delete('forum_game');
    }

    
}