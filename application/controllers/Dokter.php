<?php
class Dokter extends CI_Controller
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
        $data['jumlahApoteker'] = $this->Dashboard_model->getJumlahApoteker();
        $data['jumlahKunjunganHari'] = $this->Dashboard_model->getKunjunganHari();
        $data['jumlahAntrian'] = $this->Dashboard_model->getTotalAntrian();
        $data['jumlahAUmum'] = $this->Dashboard_model->getAntrianUmum();
        $data['jumlahAGigi'] = $this->Dashboard_model->getAntrianGigi();
        $this->template->tampil('Dokter/dDashboard_view', $data);
    }
    function antrianUmum()
    {
        $data['antrian'] = $this->Dokter_model->drUmum();
        $this->template->tampil('Dokter/AntrianUmum_view', $data);
    }
    function antrianGigi(){
        $data['antrian'] = $this->Dokter_model->drGigi();
        $this->template->tampil('Dokter/AntrianGigi_view', $data);
    }
     function edit($id_user){
        $where = array('id_user'=> $id_user);
        $data['periksa']=$this->Dokter_model->edit_data($id_user)->result();
        $this->template->tampil('Dokter/Periksa_view', $data);
    }
}
