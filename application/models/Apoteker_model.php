<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apoteker_model extends CI_Model
{
	public function Antrian() {
		$query = "SELECT * FROM tb_antrian, tb_user, tb_poli, tb_periksa, tb_status WHERE tb_antrian.id_poli=	tb_poli.id_poli AND tb_antrian.id_user=tb_user.id_user AND tb_user.id_user=tb_periksa.id_user AND tb_periksa.id_status_periksa=tb_status.id_status AND tb_periksa.id_status_periksa=2 AND tb_periksa.tanggal_periksa = CURRENT_DATE() AND tb_antrian.tanggal = CURRENT_DATE()  GROUP BY tb_antrian.id_antrian";//digunakan untuk mengambil data dari database lalu menampilkannya pada tabel
		return $this->db->query($query)->result();
	}

	public function Riwayat($whereantrian, $wherepoli) {
		$query = "SELECT tb_periksa.id_periksa, tb_user.nama, tb_user.tempat_lahir, tb_user.tanggal_lahir, YEAR(CURRENT_DATE()) - YEAR(tb_user.tanggal_lahir) as umur, tb_user.jenis_kelamin, tb_user.alamat, tb_periksa.resep_obat, tb_periksa.keterangan FROM tb_user JOIN tb_periksa ON tb_user.id_user = tb_periksa.id_user WHERE tb_user.no_identitas = '$whereantrian' AND id_poli = '$wherepoli' AND tb_periksa.tanggal_periksa = CURRENT_DATE() GROUP BY tb_periksa.id_periksa";
		return $this->db->query($query)->result_array();
	}
}
