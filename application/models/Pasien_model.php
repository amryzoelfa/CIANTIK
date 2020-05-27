<?php
class Pasien_model extends CI_Model
{
    public function getRiwayat()
    {
        // $id_user = $this->session->userdata['logged_in']['id_user'];
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_periksa', 'tb_user.id_user=tb_periksa.id_user');
        $this->db->where('tb_periksa.id_status_periksa', 2);
        $query = $this->db->get("");
        return $query;
    }

    public function getUmum()
    {
        $query = "SELECT tb_antrian.no_antrian FROM tb_periksa, tb_poli, tb_antrian WHERE tb_poli.id_poli=tb_antrian.id_poli AND tb_periksa.id_poli=tb_poli.id_poli AND tb_periksa.id_user=tb_antrian.id_user AND tb_periksa.id_status_periksa=3 AND tb_periksa.id_poli=1 AND tb_antrian.id_poli=1 AND tb_periksa.tanggal_periksa=CURRENT_DATE() AND tb_antrian.tanggal=CURRENT_DATE() GROUP BY tb_periksa.id_periksa";
        return $this->db->query($query)->row_array();
    }

    public function getGigi()
    {
        $query = "SELECT tb_antrian.no_antrian FROM tb_periksa, tb_poli, tb_antrian WHERE tb_poli.id_poli=tb_antrian.id_poli AND tb_periksa.id_poli=tb_poli.id_poli AND tb_periksa.id_user=tb_antrian.id_user AND tb_periksa.id_status_periksa=3 AND tb_periksa.id_poli=2 AND tb_antrian.id_poli=2 AND tb_periksa.tanggal_periksa=CURRENT_DATE() AND tb_antrian.tanggal=CURRENT_DATE() GROUP BY tb_periksa.id_periksa";
        return $this->db->query($query)->row_array();
    }

    public function getJUmum()
    {
        $query = "SELECT COUNT(tb_periksa.id_user) AS jumlah_au FROM tb_periksa WHERE id_poli = 1 AND id_status_periksa = 1 AND tanggal_periksa = CURRENT_DATE()";
        return $this->db->query($query)->row_array();
    }
}
