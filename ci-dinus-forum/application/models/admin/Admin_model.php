<?php

class Admin_model extends CI_model
{
    // Admin Model untuk Kelola Akun
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getDataUser($limit, $start)
    {
        return $this->db->get('user', $limit, $start)->result_array();
    }

    public function jumlahUser()
    {
        return $this->db->get('user')->num_rows();
    }

    public function hapusUser($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');
    }

    // Admin Model untuk Kelola Akun
    public function getAllBerita()
    {
        return $this->db->get('berita')->result_array();
    }

    public function getDataBerita($limit, $start)
    {
        return $this->db->get('berita', $limit, $start)->result_array();
    }

    public function jumlahBerita()
    {
        return $this->db->get('berita')->num_rows();
    }

    public function hapusBerita($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('berita');
    }

    // Admin Model untuk Kelola Akun
    public function getAllEvent()
    {
        return $this->db->get('event')->result_array();
    }

    public function getDataEvent($limit, $start)
    {
        return $this->db->get('event', $limit, $start)->result_array();
    }

    public function jumlahEvent()
    {
        return $this->db->get('event')->num_rows();
    }

    public function hapusEvent($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('event');
    }

    // Admin Model untuk Kategori Beranda
    public function getAllThread()
    {
        return $this->db->get('home')->result_array();
    }

    public function getDataHome($limit, $start)
    {
        return $this->db->get('home', $limit, $start)->result_array();
    }

    public function jumlahThreadHome()
    {
        return $this->db->get('home')->num_rows();
    }

    public function hapusIndex($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('home');
    }

    // Admin Model untuk Kategori Fakultas Teknik Elektro
    public function getAllElektro()
    {
        return $this->db->get('forum_elektro')->result_array();
    }

    public function getDataElektro($limit, $start)
    {
        return $this->db->get('forum_elektro', $limit, $start)->result_array();
    }

    public function jumlahThreadElektro()
    {
        return $this->db->get('forum_elektro')->num_rows();
    }

    public function getElektroById($id_thread)
    {
        return $this->db->get_where('forum_elektro', ['id_thread' => $id_thread])->row_array();
    }

    public function jumlahKomen($id_thread)
    {
        $this->db->where('id_thread ', $id_thread);
        $query = $this->db->get('komentar');
        return $query->num_rows();
    }
    public function getUser()
    {
        $this->db->from('forum_elektro');
        $this->db->join('user', 'user.user_id = forum_elektro.user_id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapusDataElektro($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_elektro');
    }

    // Admin Model untuk Kategori Fakultas Ilmu Komputer
    public function getAllFik()
    {
        return $this->db->get('forum_fik')->result_array();
    }

    public function getDataFik($limit, $start)
    {
        return $this->db->get('forum_fik', $limit, $start)->result_array();
    }

    public function jumlahThreadFik()
    {
        return $this->db->get('forum_fik')->num_rows();
    }

    public function hapusDataFik($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_fik');
    }

    // Admin Model untuk Kategori Fakultas Ekonomi dan Bisnis
    public function getAllFeb()
    {
        return $this->db->get('forum_feb')->result_array();
    }

    public function getDataFeb($limit, $start)
    {
        return $this->db->get('forum_feb', $limit, $start)->result_array();
    }

    public function jumlahThreadFeb()
    {
        return $this->db->get('forum_feb')->num_rows();
    }

    public function hapusDataFeb($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_feb');
    }

    // Admin Model untuk Kategori Fakultas Ilmu budaya
    public function getAllFib()
    {
        return $this->db->get('forum_fib')->result_array();
    }

    public function getDataFib($limit, $start)
    {
        return $this->db->get('forum_fib', $limit, $start)->result_array();
    }

    public function jumlahThreadFib()
    {
        return $this->db->get('forum_fib')->num_rows();
    }

    public function hapusDataFib($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_fib');
    }

    // Admin Model untuk Kategori Fakultas Kesehatan
    public function getAllFkes()
    {
        return $this->db->get('forum_fkes')->result_array();
    }

    public function getDataFkes($limit, $start)
    {
        return $this->db->get('forum_fkes', $limit, $start)->result_array();
    }

    public function jumlahThreadFkes()
    {
        return $this->db->get('forum_fkes')->num_rows();
    }

    public function hapusDataFkes($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_fkes');
    }

    // Admin Model untuk Kategori Hobi Olahraga
    public function getAllOlahraga()
    {
        return $this->db->get('forum_olahraga')->result_array();
    }

    public function getDataOlahraga($limit, $start)
    {
        return $this->db->get('forum_olahraga', $limit, $start)->result_array();
    }

    public function jumlahThreadOlahraga()
    {
        return $this->db->get('forum_olahraga')->num_rows();
    }

    public function hapusDataOlahraga($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_olahraga');
    }

    // Admin Model untuk Kategori Hobi Otomotif
    public function getAllOtomotif()
    {
        return $this->db->get('forum_otomotif')->result_array();
    }

    public function getDataOtomotif($limit, $start)
    {
        return $this->db->get('forum_otomotif', $limit, $start)->result_array();
    }

    public function jumlahThreadOtomotif()
    {
        return $this->db->get('forum_otomotif')->num_rows();
    }

    public function hapusDataOtomotif($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_otomotif');
    }

    // Admin Model untuk Kategori Hobi Pecinta Alam
    public function getAllPecintaalam()
    {
        return $this->db->get('forum_pecintaalam')->result_array();
    }

    public function getDataPecintaalam($limit, $start)
    {
        return $this->db->get('forum_pecintaalam', $limit, $start)->result_array();
    }

    public function jumlahThreadPecintaalam()
    {
        return $this->db->get('forum_pecintaalam')->num_rows();
    }

    public function hapusDataPecintaalam($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_pecintaalam');
    }

    // Admin Model untuk Kategori Hobi Pecinta Hewan
    public function getAllPecintahewan()
    {
        return $this->db->get('forum_pecintahewan')->result_array();
    }

    public function getDataPecintahewan($limit, $start)
    {
        return $this->db->get('forum_pecintahewan', $limit, $start)->result_array();
    }

    public function jumlahThreadPecintahewan()
    {
        return $this->db->get('forum_pecintahewan')->num_rows();
    }

    public function hapusDataPecintahewan($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_pecintahewan');
    }

    // Admin Model untuk Kategori Hobi Fotografi
    public function getAllFotografi()
    {
        return $this->db->get('forum_fotografi')->result_array();
    }

    public function getDataFotografi($limit, $start)
    {
        return $this->db->get('forum_fotografi', $limit, $start)->result_array();
    }

    public function jumlahThreadFotografi()
    {
        return $this->db->get('forum_fotografi')->num_rows();
    }

    public function hapusDataFotografi($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_fotografi');
    }

    // Admin Model untuk Kategori Hobi Game
    public function getAllGame()
    {
        return $this->db->get('forum_game')->result_array();
    }

    public function getDataGame($limit, $start)
    {
        return $this->db->get('forum_game', $limit, $start)->result_array();
    }

    public function jumlahThreadGame()
    {
        return $this->db->get('forum_game')->num_rows();
    }

    public function hapusDataGame($id_thread)
    {
        $this->db->where('id_thread', $id_thread);
        $this->db->delete('forum_game');
    }
}
