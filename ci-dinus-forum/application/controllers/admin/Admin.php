<?php

class Admin extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_model');

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
        $data['admin'] = $this->Admin_model->getAllUser();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/akun', $data);
    }

    // Fungsi untuk Admin kelola Berita
    public function berita()
    {
        $data['admin'] = $this->Admin_model->getAllBerita();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/berita', $data);
    }

    // Fungsi untuk Admin kelola Event
    public function event()
    {
        $data['admin'] = $this->Admin_model->getAllevent();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/event', $data);
    }

    // Fungsi untuk Forum bagian index/home 
    public function index()
    {
        $data['admin'] = $this->Admin_model->getAllThread();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/index', $data);
    }

    public function hapusIndex($id_thread)
    {
        $this->Admin_model->hapusIndex($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/index');
    }

    // Fungsi untuk Forum bagian Fakultas Teknik Elektro 
    public function elektro()
    {
        $data['admin'] = $this->Admin_model->getAllElektro();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/elektro', $data);
    }
    public function hapusElektro($id_thread)
    {
        $this->Admin_model->hapusDataElektro($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/elektro');
    }

    // Fungsi untuk Forum bagian Fakultas Teknik Informatika 
    public function fik()
    {
        $data['admin'] = $this->Admin_model->getAllFik();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fik', $data);
    }

    public function hapusFik($id_thread)
    {
        $this->Admin_model->hapusDataFik($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/fik');
    }

    // Fungsi untuk Forum bagian Fakultas Ekonomi dan Bisnis 
    public function feb()
    {
        $data['admin'] = $this->Admin_model->getAllFeb();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/feb', $data);
    }

    public function hapusFeb($id_thread)
    {
        $this->Admin_model->hapusDataFeb($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/feb');
    }

    // Fungsi untuk Forum bagian Fakultas Ilmu Budaya  
    public function fib()
    {
        $data['admin'] = $this->Admin_model->getAllFib();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fib', $data);
    }

    public function hapusFib($id_thread)
    {
        $this->Admin_model->hapusDataFib($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/fib');
    }

    // Fungsi untuk Forum bagian Fakultas Kesehatan
    public function fkes()
    {
        $data['admin'] = $this->Admin_model->getAllFkes();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fkes', $data);
    }

    public function hapusFkes($id_thread)
    {
        $this->Admin_model->hapusDataFkes($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/fkes');
    }

    // Fungsi untuk Forum bagian Hobi Olahraga
    public function olahraga()
    {
        $data['admin'] = $this->Admin_model->getAllOlahraga();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/olahraga', $data);
    }

    public function hapusOlahraga($id_thread)
    {
        $this->Admin_model->hapusDataOlahraga($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/olahraga');
    }

    // Fungsi untuk Forum bagian Hobi otomotif
    public function otomotif()
    {
        $data['admin'] = $this->Admin_model->getAllOtomotif();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/otomotif', $data);
    }

    public function hapusOtomotif($id_thread)
    {
        $this->Admin_model->hapusDataOtomotif($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/otomotif');
    }

    // Fungsi untuk Forum bagian Hobi Pecinta Alam 
    public function pecintaalam()
    {
        $data['admin'] = $this->Admin_model->getAllPecintaalam();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pecintaalam', $data);
    }

    public function hapusPecintaalam($id_thread)
    {
        $this->Admin_model->hapusDataPecintaalam($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/pecintaalam');
    }

    // Fungsi untuk Forum bagian Hobi Pecinta Hewan
    public function pecintahewan()
    {
        $data['admin'] = $this->Admin_model->getAllPecintahewan();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pecintahewan', $data);
    }

    public function hapusPecintahewan($id_thread)
    {
        $this->Admin_model->hapusDataPecintahewan($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/pecintahewan');
    }

    // Fungsi untuk Forum bagian Hobi Fotografi
    public function fotografi()
    {
        $data['admin'] = $this->Admin_model->getAllFotografi();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/fotografi', $data);
    }

    public function hapusFotografi($id_thread)
    {
        $this->Admin_model->hapusDataFotografi($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/fotografi');
    }

    // Fungsi untuk Forum bagian Hobi Game 
    public function game()
    {
        $data['admin'] = $this->Admin_model->getAllGame();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/game', $data);
    }

    public function hapusGame($id_thread)
    {
        $this->Admin_model->hapusDataGame($id_thread);
        $this->session->set_flashdata('flashh', 'Dihapus');
        redirect('admin/admin/game');
    }
}
