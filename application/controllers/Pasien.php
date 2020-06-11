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
    public function ambilUmum()
    {
        $data['ambil'] = $this->Pasien_model->insertUmum();
        $data['antrian'] = $this->Pasien_model->cetakUmum();
        $this->load->view('Pasien/pCetakUmum_view', $data);
    }

    public function ambilGigi()
    {
        $data['ambil'] = $this->Pasien_model->insertGigi();
        $data['antrian'] = $this->Pasien_model->cetakGigi();
        $this->load->view('Pasien/pCetakGigi_view', $data);
    }
    public function print(){
         ob_start();
        $this->load->view('Admin/print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/plugin/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Transaksi.pdf', 'D');
    }
}
