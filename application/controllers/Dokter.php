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
        $data['jumlahUser'] = $this->Dashboard_model->getJumlahUser();
        $data['jumlahPasien'] = $this->Dashboard_model->getJumlahPasien();
        $data['jumlahDokter'] = $this->Dashboard_model->getJumlahDokter();
        $data['jumlahApoteker'] = $this->Dashboard_model->getJumlahApoteker();
        $data['jumlahKunjunganHari'] = $this->Dashboard_model->getKunjunganHari();
        $data['jumlahKunjunganBulan'] = $this->Dashboard_model->getKunjunganBulan();
        $data['jumlahAUmum'] = $this->Dashboard_model->getAntrianUmum();
        $data['jumlahAGigi'] = $this->Dashboard_model->getAntrianGigi();
        $this->template->tampil('Dokter/dDashboard_view', $data);
    }
    function antrianUmum()
    {
        $this->Dokter_model->kembali_umum();
        $data['antrian'] = $this->Dokter_model->drUmum();
        $this->template->tampil('Dokter/AntrianUmum_view', $data);
    }
    function antrianGigi()
    {
        $this->Dokter_model->kembali_gigi();
        $data['antrian'] = $this->Dokter_model->drGigi();
        $this->template->tampil('Dokter/AntrianGigi_view', $data);
    }
    function updatePeriksaUmum()
    {
        $id_user = $this->input->post('id_user');
        $where = array('id_user' => $id_user);
        $this->Dokter_model->update_data_umum($id_user);
        redirect('Dokter/antrianUmum');
    }
    function edit_umum($id_user)
    {
        $data['periksa'] = $this->Dokter_model->edit_data_umum($id_user)->result();
        $this->template->tampil('Dokter/Periksa_view_Umum', $data);
        $this->Dokter_model->proses_umum($id_user);
    }
    function updatePeriksaGigi()
    {
        $id_user = $this->input->post('id_user');
        $where = array('id_user' => $id_user);
        $this->Dokter_model->update_data_gigi($id_user);
        redirect('Dokter/antrianGigi');
    }
    function edit_gigi($id_user)
    {
        $data['periksa'] = $this->Dokter_model->edit_data_gigi($id_user)->result();
        $this->template->tampil('Dokter/Periksa_view_Gigi', $data);
        $this->Dokter_model->proses_gigi($id_user);
    }
}
