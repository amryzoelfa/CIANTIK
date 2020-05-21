<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Dashboard_model');
        $this->load->library('template');
    }

    function index()
    {
        $data['user'] = $this->Admin_model->getAll()->result();
        $data['jumlahUser'] = $this->Dashboard_model->getJumlahUser();
        $data['jumlahPasien'] = $this->Dashboard_model->getJumlahPasien();
        $data['jumlahDokter'] = $this->Dashboard_model->getJumlahDokter();
        $data['jumlahApoteker'] = $this->Dashboard_model->getJumlahApoteker();
        $data['jumlahKunjunganHari'] = $this->Dashboard_model->getKunjunganHari();
        $this->template->tampil('Admin/dashboard_view', $data);
    }

    public function pendaftaran_user()
    {
        $data['user'] = $this->Admin_model->getAll()->result();
        $data['akses'] = $this->Admin_model->getDaftar()->result();
        $this->template->tampil('Admin/pendaftaran_user', $data);
    }

    public function input()
    {
        $akses = $this->input->post('akses');
        $no_identitas = $this->input->post('no_identitas');
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $data = array(
            'id_akses' => $akses,
            'no_identitas' => $no_identitas,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan,
            'username' => $username,
            'password' => $password

        );
        $this->Admin_model->input_data($data, 'tb_user');
        // redirect('Admin/pendaftaran_user');
        if ($akses == 2) {
            redirect('Master/DataPasien');
        } elseif ($akses == 3) {
            redirect('Master/DataDokter');
        } else if ($akses == 4) {
            redirect('Master/DataDokter');
        } else if ($akses == 5) {
            redirect('Master/DataApoteker');
        }
    }
    public function antrian_umum(){
        $data['antrian'] = $this->Admin_model->getAntrianUmum();
        $this->template->tampil('Admin/antrian_umum', $data);
    }
    public function antrian_gigi(){
        $data['antrian'] = $this->Admin_model->getAntrianGigi();
        $this->template->tampil('Admin/antrian_gigi');
    }
}
