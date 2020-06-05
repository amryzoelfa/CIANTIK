<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function view_by_date($date)
    {
        $this->db->select('*');
        $this->db->from('tb_periksa');
        $this->db->where('DATE(tb_periksa.tanggal)', $date);
        $this->db->join('tb_user', 'tb_user.id_user=tb_periksa.id_user');
        $query = $this->db->get("")->result();
        return $query;
        // $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user AND DATE(tb_periksa.tanggal)='" . $date . "'";
        // return $this->db->get($query)->result();
        //$this->db->where('DATE(tgl)', $date); // Tambahkan where tanggal nya
        //return $this->db->get('transaksi')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_month($month, $year)
    {
        $this->db->select('*');
        $this->db->from('tb_periksa');
        $this->db->where('MONTH(tb_periksa.tanggal)', $month);
        $this->db->where('YEAR(tb_periksa.tanggal)', $year);
        $this->db->join('tb_user', 'tb_user.id_user=tb_periksa.id_user');
        $query = $this->db->get("")->result();
        return $query;
        // $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user AND MONTH(tb_periksa.tanggal)='" . $month . "' AND YEAR(tb_periksa.tanggal)='" . $year . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        // return $this->db->get($query)->result();
        // $this->db->where('MONTH(tgl)', $month); // Tambahkan where bulan
        // $this->db->where('YEAR(tgl)', $year); // Tambahkan where tahun
        // return $this->db->get('transaksi')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year)
    {
        $this->db->select('*');
        $this->db->from('tb_periksa');
        $this->db->where('YEAR(tb_periksa.tanggal)', $year);
        $this->db->join('tb_user', 'tb_user.id_user=tb_periksa.id_user');
        $query = $this->db->get("")->result();
        return $query;
        // $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user AND YEAR(tb_periksa.tanggal)='" . $year . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        // return $this->db->get($query)->result();
        // $this->db->where('YEAR(tgl)', $year); // Tambahkan where tahun
        // return $this->db->get('transaksi')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }

    public function view_all()
    {
        $this->db->select('*');
        $this->db->from('tb_periksa');
        $this->db->order_by('tb_periksa.tanggal');
        $this->db->join('tb_user', 'tb_user.id_user=tb_periksa.id_user');
        $query = $this->db->get("")->result();
        return $query;
        // $query = "SELECT * FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user ORDER BY tb_periksa.tanggal"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
        // return $this->db->get($query)->result(); // Tampilkan semua data transaksi
    }

    public function option_tahun()
    {
        $this->db->select('YEAR(tanggal) AS tahun');
        $this->db->from('tb_periksa');
        $this->db->join('tb_user', 'tb_user.id_user=tb_periksa.id_user');
        $this->db->order_by('YEAR(tb_periksa.tanggal)');
        $this->db->group_by('YEAR(tb_periksa.tanggal)');
        $query = $this->db->get("")->result();
        return $query;
        //$query = "SELECT YEAR(tanggal) AS tahun FROM tb_periksa, tb_user WHERE tb_periksa.id_user=tb_user.id_user ORDER BY YEAR(tb_periksa.tanggal) GROUP BY YEAR(tb_periksa.tanggal)";
        // $this->db->select('YEAR(tgl) AS tahun'); // Ambil Tahun dari field tgl
        // $this->db->from('transaksi'); // select ke tabel transaksi
        // $this->db->order_by('YEAR(tgl)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        // $this->db->group_by('YEAR(tgl)'); // Group berdasarkan tahun pada field tgl

        //return $this->db->get($query)->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}
