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
}
