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
        $data['jumlahDokter'] = $this->Dashboard_model->getJumlahDokter();
        $data['jumlahAUmum'] = $this->Dashboard_model->getAntrianUmum();
        $data['jumlahAGigi'] = $this->Dashboard_model->getAntrianGigi();
        $this->template->tampil('Pasien/pDashboard_view', $data);
    }

    public function Riwayat()
    {
        $data['riwayat'] = $this->Pasien_model->getRiwayat()->result();
        $this->template->tampil('Pasien/pRiwayat_view', $data);
    }

    public function Antrian()
    {
        $data['umum'] = $this->Pasien_model->getUmum()->row_array();
        $data['gigi'] = $this->Pasien_model->getGigi()->row_array();
        $data['jumlahUmum'] = $this->Pasien_model->getJUmum()->row_array();
        $data['jumlahGigi'] = $this->Pasien_model->getJGigi()->row_array();
        $data['jumlahAUmum'] = $this->Dashboard_model->getAntrianUmum();
        $data['jumlahAGigi'] = $this->Dashboard_model->getAntrianGigi();
        $this->template->tampil('Pasien/pAntrian_view', $data);
    }

    public function CetakUmum()
    {
        $data['umum'] = $this->Pasien_model->getCetak()->result_array();
        // var_dump($data);die();
        $this->template->tampil('Pasien/pCetakUmum_view', $data);
    }

    public function CetakGigi()
    {
        $data['gigi'] = $this->Pasien_model->getCetak()->result_array();
        // var_dump($data);die();
        $this->template->tampil('Pasien/pCetakGigi_view', $data);
    }

    public function ambilUmum()
    {
        $data['ambil'] = $this->Pasien_model->insertUmum();
        $this->load->view('Pasien/pCetakUmum_view', $data);
    }

    public function ambilGigi()
    {
        $data['ambil'] = $this->Pasien_model->insertGigi();
        $this->load->view('Pasien/pCetakUmum_view', $data);
    }

    public function insertUmum()
    {
        $id_user = $this->session->userdata("session_id");
        $tanggal = date("Y-m-d");
        $antrian = $this->tambahUmum();
        $data = array(
            'id_user' => $id_user,
            'id_poli' => 1,
            'tanggal' => $tanggal,
            'no_antrian' => $antrian,
            'id_status_periksa' => 1,
            'id_status_obat' => 1
        );
        $this->Pasien_model->input_umum($data, 'tb_periksa');
        redirect('Pasien/CetakUmum');
    }

    public function tambahUmum()
    {
        $db = $this->Pasien_model->tambahUmum();
        $nomor = substr($db, 2, 3);
        $antrian = (int) $nomor + 1;
        return $antrian;
    }
}
