
<?php

class Elektro extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Elektro_model');
        $this->load->model('Berita_model');
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['user'] = $this->Elektro_model->getUser();
        $data['judul'] = 'Kategori Elektro';
        $data['elektro'] = $this->Elektro_model->getAllElektro();

        if ($this->input->post('keyword')) {
            //$data['elektro'] = $this->Elektro_model->cariDataElektro();
        }
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('elektro/index', $data);
        $this->load->view('templates/rightsidebar', $data, $data);
    }

    public function detail($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pp'] = $this->Elektro_model->getUser();
        $data['elektro'] = $this->Elektro_model->getElektroById($id_thread);
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        $data['komentar'] = $this->Elektro_model->getAllKomentar();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('elektro/detail', $data);
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
            $this->load->view('elektro/tambah');
            $this->load->view('templates/rightsidebar', $data, $data);
        } else {

            $insert = [
                'user_id' => $this->session->userdata('user_id'),
                'username' =>  $this->session->userdata('username'),
                'nama_thread' => $this->input->post('nama_thread', true),
                'isi' => $this->input->post('isi', true),
            ];
            $upload_image = $_FILES['gambar'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/thread/elektro/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->Elektro_model->tambahDataElektro($insert);

            $this->session->set_flashdata('flash', 'Dibuat');
            redirect('elektro', 'refresh');
        }
    }


    public function ubah($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Ubah Thread';
        $data['elektro'] = $this->Elektro_model->getElektroById($id_thread);
        $this->form_validation->set_rules('nama_thread', 'Nama Thread', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $data['berita'] = $this->Berita_model->getAllBerita();
        $data['event'] = $this->Event_model->getAllEvent();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('elektro/ubah', $data);
            $this->load->view('templates/rightsidebar', $data, $data);
        } else {
            $this->Elektro_model->ubahDataElektro();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('elektro', 'refresh');
        }
    }

    public function hapus($id_thread)
    {
        $this->Elektro_model->hapusDataElektro($id_thread);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('elektro', 'refresh');
    }

    public function kirimKomen($id_thread)
    {
        $where = array('id_thread' => $id_thread);

        $nama_thread = $this->Elektro_model->getrow('forum_elektro', $where, 'nama_thread');
        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('elektro/detail',);
            $this->load->view('templates/rightsidebar');
        } else
            $insert = [
                'username' =>  $this->session->userdata('username'),
                'id_thread' => $id_thread,
                'nama_thread' => $nama_thread->nama_thread,
                'isi_komentar' => $this->input->post('isi_komentar', true),
            ];
        $this->Elektro_model->tambahKomentarElektro($insert);
        redirect('elektro/detail/' . $id_thread, 'refresh');
    }

    public function hapusKomen($id_komentar)
    {

        $this->Elektro_model->hapusKomentar($id_komentar);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('elektro/detail/', 'refresh');
    }
}
