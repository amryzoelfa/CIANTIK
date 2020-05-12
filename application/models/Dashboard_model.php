<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function getJumlahUser()
    {
        $this->db->select('COUNT(*) AS total_user');
        $this->db->from('tb_user');
        $this->db->where('tb_user.id_akses !=', 1);
        $sum = $this->db->get()->row_array();
        return $sum;
    }

    public function getJumlahPasien()
    {
        $this->db->select('COUNT(*) AS total_pasien');
        $this->db->from('tb_user');
        $this->db->where('tb_user.id_akses', 2);
        $sum = $this->db->get()->row_array();
        return $sum;
    }

    public function getJumlahDokter()
    {
        // $this->db->select('COUNT(*) AS total_dokter');
        // $this->db->from('tb_user');
        // $this->db->where('tb_user.id_akses', 3);
        // $this->db->where('tb_user.id_akses', 4);
        // $sum = $this->db->get()->row_array();
        // return $sum;
        $query = "SELECT COUNT(*) as total_dokter FROM tb_user WHERE id_akses=3 OR id_akses=4";
        return $this->db->query($query)->row_array();
    }

    public function getJumlahApoteker()
    {
        $this->db->select('COUNT(*) AS total_apoteker');
        $this->db->from('tb_user');
        $this->db->where('tb_user.id_akses', 5);
        $sum = $this->db->get()->row_array();
        return $sum;
    }

    public function getKunjunganHari()
    {
        $query = "SELECT COUNT(*) as totalkh FROM tb_antrian WHERE tanggal=CURRENT_DATE()";
        return $this->db->query($query)->row_array();
    }
}
