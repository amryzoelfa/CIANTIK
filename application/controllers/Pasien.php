<?php
class Pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Pasien_model');
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
        $this->template->tampil('Pasien/pDashboard_view', $data);
    }

    public function Riwayat()
    {
        $data['riwayat'] = $this->Pasien_model->getRiwayat()->result();
        $this->template->tampil('Pasien/pRiwayat_view', $data);
    }

    public function Antrian()
    {
        $data['umum'] = $this->Pasien_model->getUmum();
        $data['gigi'] = $this->Pasien_model->getGigi();
        $data['jumlahUmum'] = $this->Pasien_model->getJUmum();
        $data['jumlahAUmum'] = $this->Dashboard_model->getAntrianUmum();
        $data['jumlahAGigi'] = $this->Dashboard_model->getAntrianGigi();
        $this->template->tampil('Pasien/pAntrian_view', $data);
    }
}
