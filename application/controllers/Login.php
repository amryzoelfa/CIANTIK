<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->load->view('auth/login_view');
    }

    public function cek_log()
    {
        $username = $this->input->post('txt_user');
        $password = $this->input->post('txt_pass');
        $cek = $this->Login_model->login($username, $password, 'tb_user')->result();
        if ($cek != FALSE) {
            foreach ($cek as $row) {
                $id = $row->id_user;
                $user = $row->username;
                $foto = $row->foto;
                $akses = $row->id_akses;
                $nama = $row->nama;
            }
            $this->session->set_userdata('session_id', $id);
            $this->session->set_userdata('session_user', $user);
            $this->session->set_userdata('session_foto', $foto);
            $this->session->set_userdata('session_akses', $akses);
            $this->session->set_userdata('session_nama', $nama);
            // redirect('Admin');
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Selamat Sudah Login</div>' . $user);
            if ($akses == 1) {
                redirect('Admin');
            } elseif ($akses == 2) {
                redirect('Pasien');
            } else if ($akses == 3) {
                redirect('Dokter');
            } else if ($akses == 4) {
                redirect('Dokter');
            } else if ($akses == 5) {
                redirect('Apoteker');
            }
        } else {
            $this->load->view('auth/login_view');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
