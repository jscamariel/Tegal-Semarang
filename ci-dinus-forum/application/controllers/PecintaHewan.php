<?php

class Pecintahewan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pecintahewan_model');
        $this->load->model('Komentar_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/pecintahewan/index/';
        $config['total_rows'] = $this->Pecintahewan_model->jumlahDataPecintahewan();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        $data['start'] = $this->uri->segment(3);
        $data['pecintahewan'] = $this->Pecintahewan_model->getAllPecintahewan($config['per_page'], $data['start']);
        $this->pagination->initialize($config);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pecintahewan/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pecintahewan'] = $this->Pecintahewan_model->getPecintahewanById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $data['komentar'] = $this->Komentar_model->getAllKomentar();

        $data['jumlah_komen'] = $this->Pecintahewan_model->jumlahKomen($id_thread);
        $data['jumlah_like'] = $this->db->count_all_results('tb_vote');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pecintahewan/detail', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('nama_thread', 'Nama Thread', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pecintahewan/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        } else {
            $insert = [
                'id_kategori' => 10,
                'user_id' => $this->session->userdata('user_id'),
                'username' =>  $this->session->userdata('username'),
                'nama_thread' => $this->input->post('nama_thread', true),
                'isi' => $this->input->post('isi', true)
            ];
            $upload_image = $_FILES['gambar'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/thread/pecintahewan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Pecintahewan_model->tambahDataPecintahewan($insert);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pecintahewan');
        }
    }

    public function ubah($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Ubah Thread';
        $data['pecintahewan'] = $this->Pecintahewan_model->getPecintahewanById($id_thread);
        $this->form_validation->set_rules('nama_thread', 'Nama Thread', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pecintahewan/ubah', $data);
            $this->load->view('templates/rightsidebar', $data, $data);
        } else {
            $this->Pecintahewan_model->ubahDataPecintahewan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('pecintahewan');
        }
    }

    public function hapus($id_thread)
    {
        $this->Pecintahewan_model->hapusDataPecintahewan($id_thread);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pecintahewan');
    }

    public function kirimKomen($id_thread)
    {
        $where = array('id_thread' => $id_thread);


        $nama_thread = $this->Pecintahewan_model->getrow('forum_pecintahewan', $where, 'nama_thread');
        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pecintahewan/detail',);
            $this->load->view('templates/rightsidebar');
        } else
            $insert = [
                'id_kategori' => 10,
                'user_id' => $this->session->userdata('user_id'),
                'username' =>  $this->session->userdata('username'),
                'id_thread' => $id_thread,
                'nama_thread' => $nama_thread->nama_thread,
                'isi_komentar' => $this->input->post('isi_komentar', true),
            ];
        $this->Komentar_model->tambahKomentar($insert);
        redirect('pecintahewan/detail/' . $id_thread, 'refresh');
    }

    public function hapusKomen($id_komentar)
    {

        $this->Komentar_model->hapusKomentar($id_komentar);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pecintahewan/detail/' . $this->uri->segment(3), 'refresh');
    }

    public function like($id_thread)
    {
        $where = array('id_thread' => $id_thread);
        $nama_thread = $this->Pecintahewan_model->getrow('forum_pecintahewan', $where, 'nama_thread');
        $insert = [
            'id_thread' => $id_thread,
            'id_kategori' => 10,
            'user_id' => $this->session->userdata('user_id'),
            'username' =>  $this->session->userdata('username'),
            'nama_thread' => $nama_thread->nama_thread,
            'liked' => 1
        ];

        $this->Pecintahewan_model->Like($insert);
    }

    public function unlike($id_thread)
    {
        $where = array('id_thread' => $id_thread);
        $nama_thread = $this->Pecintahewan_model->getrow('forum_pecintahewan', $where, 'nama_thread');
        $data = [
            'id_thread' => $id_thread,
            'id_kategori' => 10,
            'user_id' => $this->session->userdata('user_id'),
            'username' =>  $this->session->userdata('username'),
            'nama_thread' => $nama_thread->nama_thread,
            'liked' => 1
        ];

        $this->Pecintahewan_model->unLike($data);
    }

    public function dislike($id_thread)
    {
        $where = array('id_thread' => $id_thread);
        $nama_thread = $this->Pecintahewan_model->getrow('forum_pecintahewan', $where, 'nama_thread');
        $insert = [
            'id_thread' => $id_thread,
            'id_kategori' => 10,
            'user_id' => $this->session->userdata('user_id'),
            'username' =>  $this->session->userdata('username'),
            'nama_thread' => $nama_thread->nama_thread,
            'dislike' => 1
        ];

        $this->Pecintahewan_model->disLike($insert);
    }

    public function undislike($id_thread)
    {
        $where = array('id_thread' => $id_thread);
        $nama_thread = $this->Pecintahewan_model->getrow('forum_pecintahewan', $where, 'nama_thread');
        $data = [
            'id_thread' => $id_thread,
            'id_kategori' => 10,
            'user_id' => $this->session->userdata('user_id'),
            'username' =>  $this->session->userdata('username'),
            'nama_thread' => $nama_thread->nama_thread,
            'dislike' => 1
        ];

        $this->Pecintahewan_model->undisLike($data);
    }
}
