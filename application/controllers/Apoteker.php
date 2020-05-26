<?php
class Apoteker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dokter_model');
        $this->load->model('Dashboard_model');
        $this->load->library('template');
    }

    function index()
    {
        $data['jumlahPasien'] = $this->Dashboard_model->getJumlahPasien();
        $data['jumlahDokter'] = $this->Dashboard_model->getJumlahDokter();
        $data['jumlahAUmum'] = $this->Dashboard_model->getAntrianUmum();
        $data['jumlahAGigi'] = $this->Dashboard_model->getAntrianGigi();
        $data['jumlahKunjunganHari'] = $this->Dashboard_model->getKunjunganHari();
        $this->template->tampil('Apoteker/aDashboard_view', $data);
    }
}
