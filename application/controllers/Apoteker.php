<?php
class Apoteker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dokter_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Apoteker_model');
        $this->load->library('template');
    }

    function index()
    {
        $data['jumlahPasien'] = $this->Dashboard_model->getJumlahPasien();
        $data['jumlahDokter'] = $this->Dashboard_model->getJumlahDokter();
        $data['jumlahAUmum'] = $this->Dashboard_model->getAntrianUmum();
        $data['jumlahAGigi'] = $this->Dashboard_model->getAntrianGigi();
        $data['jumlahKunjunganHari'] = $this->Dashboard_model->getKunjunganHari();
        $data['jumlahKunjunganBulan'] = $this->Dashboard_model->getKunjunganBulan();
        $this->template->tampil('Apoteker/aDashboard_view', $data);
    }

    function Antrian()
    {
        $data['antrian'] = $this->Apoteker_model->Antrian();
        // var_dump($data);die();
        $this->template->tampil('Apoteker/aAntrian_view', $data);
    }

    function Riwayat()
    {
        $whereantrian = $this->uri->segment(3);
        $poli = $this->uri->segment(4);

        if ($poli == "UMUM") {
            $wherepoli = 1;
        } else if ($poli == "GIGI") {
            $wherepoli = 2;
        }

        $data['riwayat'] = $this->Apoteker_model->Riwayat($whereantrian, $wherepoli);
        $this->template->tampil('Apoteker/aRiwayatp_view', $data);
        $this->Apoteker_model->update_status_obat($whereantrian, $wherepoli);
    }
}
