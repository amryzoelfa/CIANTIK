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
        $password =  md5($this->input->post('txt_pass'));
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
            if ($akses == 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat, ' . $nama . ' Berhasil Login sebagai Admin <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Admin');
            } elseif ($akses == 2) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat, ' . $nama . ' Berhasil Login sebagai Pasien <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Pasien');
            } else if ($akses == 3) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat, ' . $nama . ' Berhasil Login sebagai Dokter Umum <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Dokter');
            } else if ($akses == 4) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat, ' . $nama . ' Berhasil Login sebagai Dokter Gigi <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Dokter');
            } else if ($akses == 5) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat, ' . $nama . ' Berhasil Login sebagai Apoteker <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Apoteker');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal! Mohon Periksa kembali.</div>');
            $this->load->view('auth/login_view');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('session_id');
        $this->session->unset_userdata('session_user');
        $this->session->unset_userdata('session_foto');
        $this->session->unset_userdata('session_akses');
        $this->session->unset_userdata('session_nama');
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
