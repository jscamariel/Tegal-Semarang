<?php

class Admin extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('Komentar_model');
        $this->load->model('Home_model');
        $this->load->model('Elektro_model');
        $this->load->model('Fik_model');
        $this->load->model('Feb_model');
        $this->load->model('Fib_model');
        $this->load->model('Fkes_model');
        $this->load->model('Olahraga_model');
        $this->load->model('Otomotif_model');
        $this->load->model('Pecintaalam_model');
        $this->load->model('Pecintahewan_model');
        $this->load->model('Fotografi_model');
        $this->load->model('Game_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');

        if ($this->session->userdata('username') == FALSE) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Silahkan Login Terlebih Dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth');
        }
    }

    // Fungsi untuk Admin kelola Akun
    public function akun()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/akun/';
        $config['total_rows'] = $this->Admin_model->jumlahUser();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataUser($config['per_page'], $data['start']);
        $this->pagination->initialize($config);

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/akun/akun', $data);
    }

    public function hapusUser($user_id)
    {
        $this->Admin_model->hapusUser($user_id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/admin/akun');
    }

    // Fungsi untuk Admin kelola Berita
    public function berita()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/berita/';
        $config['total_rows'] = $this->Admin_model->jumlahBerita();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataBerita($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/berita/berita', $data);
    }

    public function tambahBerita()
    {
        $this->load->model('Berita_model');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/berita/tambah');
        } else {
            $insert = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
            ];
            $upload_image = $_FILES['gambar'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/berita/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Berita_model->tambahBeritaBaru($insert);
            $this->session->set_flashdata('flash', 'Dibuat');
            redirect('admin/admin/berita');
        }
    }

    public function hapusBerita($id)
    {
        $this->Admin_model->hapusBerita($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/admin/berita');
    }

    // Fungsi untuk Admin kelola Event
    public function event()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/event/';
        $config['total_rows'] = $this->Admin_model->jumlahEvent();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataEvent($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/event/event', $data);
    }

    public function tambahEvent()
    {
        $this->load->model('Event_model');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/event/tambah');
        } else {
            $insert = [
                'judul' => $this->input->post('judul', true),
                'isi' => $this->input->post('isi', true),
                'date' => $this->input->post('date', true),
                'time' => $this->input->post('time', true)
            ];
            $upload_image = $_FILES['gambar'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/event/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Event_model->tambahEventbaru($insert);
            $this->session->set_flashdata('flash', 'Dibuat');
            redirect('admin/admin/event');
        }
    }



    public function hapusEvent($id)
    {
        $this->Admin_model->hapusEvent($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/admin/event');
    }

    // Fungsi untuk Forum bagian index/home 
    public function index()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/index/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadHome();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataHome($config['per_page'], $data['start']);

        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/home/index', $data);
    }

    public function detailHome($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['home'] = $this->Home_model->getHomeById($id_thread);

        $data['komentar'] = $this->Home_model->getAllKomentar();

        $data['jumlah_komen'] = $this->Home_model->jumlahKomen($id_thread);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/home/detail', $data);
    }

    public function hapusIndex($id_thread)
    {
        $this->Admin_model->hapusIndex($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/home/index');
    }

    // Fungsi untuk Forum bagian Fakultas Teknik Elektro 
    public function elektro()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/elektro/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadElektro();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;
        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataElektro($config['per_page'], $data['start']);

        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/elektro/elektro', $data);
    }

    public function detailElektro($id_thread)
    {
        $data['user'] = $this->Admin_model->getUser();
        $data['elektro'] = $this->Admin_model->getElektroById($id_thread);

        $data['komentar'] = $this->Komentar_model->getAllKomentar();

        $data['jumlah_komen'] = $this->Admin_model->jumlahKomen($id_thread);
        $data['jumlah_like'] = $this->db->count_all_results('tb_vote');
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/elektro/detail', $data);
    }

    public function hapusElektro($id_thread)
    {
        $this->Admin_model->hapusDataElektro($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/elektro/elektro');
    }

    // Fungsi untuk Forum bagian Fakultas Teknik Informatika 
    public function fik()
    {

        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/fik/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadFik();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataFik($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fik/fik', $data);
    }

    public function detailFik($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['fik'] = $this->Fik_model->getFikById($id_thread);

        $data['komentar'] = $this->Fik_model->getAllKomentar();
        $data['jumlah_komen'] = $this->Fik_model->jumlahKomen($id_thread);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fik/detail', $data);
    }

    public function hapusFik($id_thread)
    {
        $this->Admin_model->hapusDataFik($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/fik/fik');
    }

    // Fungsi untuk Forum bagian Fakultas Ekonomi dan Bisnis 
    public function feb()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/feb/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadFeb();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataFeb($config['per_page'], $data['start']);
        $this->pagination->initialize($config);

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/feb/feb', $data);
    }

    public function detailFeb($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['feb'] = $this->Feb_model->getFebById($id_thread);

        $data['komentar'] = $this->Feb_model->getAllKomentar();
        $data['jumlah_komen'] = $this->Feb_model->jumlahKomen($id_thread);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/feb/detail', $data);
    }

    public function hapusFeb($id_thread)
    {
        $this->Admin_model->hapusDataFeb($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/feb/feb');
    }

    // Fungsi untuk Forum bagian Fakultas Ilmu Budaya  
    public function fib()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/fib/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadFib();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataFib($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fib/fib', $data);
    }

    public function detailFib($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['fib'] = $this->Fib_model->getFibById($id_thread);


        $data['komentar'] = $this->Fib_model->getAllKomentar();
        $data['jumlah_komen'] = $this->Fib_model->jumlahKomen($id_thread);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fib/detail', $data);
    }

    public function hapusFib($id_thread)
    {
        $this->Admin_model->hapusDataFib($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/fib/fib');
    }

    // Fungsi untuk Forum bagian Fakultas Kesehatan
    public function fkes()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/fkes/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadFkes();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataFkes($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fkes/fkes', $data);
    }

    public function detailFkes($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['fkes'] = $this->Fkes_model->getFkesById($id_thread);

        $data['komentar'] = $this->Fkes_model->getAllKomentar();
        $data['jumlah_komen'] = $this->Fkes_model->jumlahKomen($id_thread);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fkes/detail', $data);
    }

    public function hapusFkes($id_thread)
    {
        $this->Admin_model->hapusDataFkes($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/fkes/fkes');
    }

    // Fungsi untuk Forum bagian Hobi Olahraga
    public function olahraga()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/olahraga/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadOlahraga();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataOlahraga($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/olahraga/olahraga', $data);
    }

    public function detailOlahraga($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['olahraga'] = $this->Olahraga_model->getOlahragaById($id_thread);
        $data['komentar'] = $this->Fkes_model->getAllKomentar();
        $data['jumlah_komen'] = $this->Fkes_model->jumlahKomen($id_thread);

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/olahraga/detail', $data);
    }

    public function hapusOlahraga($id_thread)
    {
        $this->Admin_model->hapusDataOlahraga($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/olahraga/olahraga');
    }

    // Fungsi untuk Forum bagian Hobi otomotif
    public function otomotif()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/otomotif/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadOtomotif();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataOtomotif($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/otomotif/otomotif', $data);
    }

    public function detailOtomotif($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['otomotif'] = $this->Otomotif_model->getOtomotifById($id_thread);

        $data['komentar'] = $this->Komentar_model->getAllKomentar();

        $data['jumlah_komen'] = $this->Otomotif_model->jumlahKomen($id_thread);
        $data['jumlah_like'] = $this->db->count_all_results('tb_vote');
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/otomotif/detail', $data);
    }

    public function hapusOtomotif($id_thread)
    {
        $this->Admin_model->hapusDataOtomotif($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/otomotif/otomotif');
    }

    // Fungsi untuk Forum bagian Hobi Pecinta Alam 
    public function pecintaalam()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/pecintaalam/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadPecintaalam();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataPecintaalam($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pecintaalam/pecintaalam', $data);
    }

    public function detailPecintaalam($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pecintaalam'] = $this->Pecintaalam_model->getPecintaalamById($id_thread);


        $data['komentar'] = $this->Komentar_model->getAllKomentar();

        $data['jumlah_komen'] = $this->Pecintaalam_model->jumlahKomen($id_thread);
        $data['jumlah_like'] = $this->db->count_all_results('tb_vote');
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pecintaalam/detail', $data);
    }

    public function hapusPecintaalam($id_thread)
    {
        $this->Admin_model->hapusDataPecintaalam($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/pecintaalam/pecintaalam');
    }

    // Fungsi untuk Forum bagian Hobi Pecinta Hewan
    public function pecintahewan()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/pecintahewan/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadPecintahewan();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataPecintahewan($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pecintahewan/pecintahewan', $data);
    }

    public function detailPecintahewan($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pecintahewan'] = $this->Pecintahewan_model->getPecintahewanById($id_thread);

        $data['komentar'] = $this->Komentar_model->getAllKomentar();

        $data['jumlah_komen'] = $this->Pecintahewan_model->jumlahKomen($id_thread);
        $data['jumlah_like'] = $this->db->count_all_results('tb_vote');
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pecintahewan/detail', $data);
    }

    public function hapusPecintahewan($id_thread)
    {
        $this->Admin_model->hapusDataPecintahewan($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/pecintahewan/pecintahewan');
    }

    // Fungsi untuk Forum bagian Hobi Fotografi
    public function fotografi()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/fotografi/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadFotografi();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataFotografi($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fotografi/fotografi', $data);
    }

    public function detailFotografi($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['fotografi'] = $this->Fotografi_model->getFotografiById($id_thread);

        $data['komentar'] = $this->Komentar_model->getAllKomentar();

        $data['jumlah_komen'] = $this->Fotografi_model->jumlahKomen($id_thread);
        $data['jumlah_like'] = $this->db->count_all_results('tb_vote');
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fotografi/detail', $data);
    }

    public function hapusFotografi($id_thread)
    {
        $this->Admin_model->hapusDataFotografi($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/fotografi/fotografi');
    }

    // Fungsi untuk Forum bagian Hobi Game 
    public function game()
    {
        $config['base_url'] = 'http://localhost/ci-dinus-forum/admin/admin/game/';
        $config['total_rows'] = $this->Admin_model->jumlahThreadGame();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(4);
        $data['admin'] = $this->Admin_model->getDataGame($config['per_page'], $data['start']);
        $this->pagination->initialize($config);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/game/game', $data);
    }

    public function detailGame($id_thread)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['game'] = $this->Game_model->getGameById($id_thread);


        $data['komentar'] = $this->Komentar_model->getAllKomentar();

        $data['jumlah_komen'] = $this->Game_model->jumlahKomen($id_thread);
        $data['jumlah_like'] = $this->db->count_all_results('tb_vote');
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/game/detail', $data);
    }

    public function hapusGame($id_thread)
    {
        $this->Admin_model->hapusDataGame($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/game/game');
    }
}
