<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_model extends CI_Model
{
	function drUmum()
	{
		$query1 = "SELECT tb_antrian.no_antrian, tb_user.nama, tb_periksa.id_status_periksa, tb_periksa.id_user FROM tb_antrian , tb_user , tb_periksa WHERE tb_antrian.id_user =  tb_user.id_user AND tb_user.id_user = tb_periksa.id_user AND tb_periksa.tanggal_periksa = CURRENT_DATE() AND tb_periksa.id_poli = 1 AND tb_antrian.id_poli=1 AND tb_antrian.tanggal = CURRENT_DATE()  GROUP BY tb_periksa.id_periksa";
		return $this->db->query($query1)->row_array();
	}
	function drGigi()
	{
		$query2 = "SELECT tb_antrian.no_antrian, tb_antrian.tanggal, tb_user.no_identitas, tb_user.nama, tb_periksa.id_status_periksa, tb_periksa.id_status_obat, tb_periksa.id_user FROM tb_antrian , tb_user , tb_periksa WHERE tb_antrian.id_user = tb_user.id_user AND tb_user.id_user = tb_periksa.id_user AND tb_periksa.tanggal_periksa = CURRENT_DATE() AND tb_periksa.id_poli = 2 AND tb_antrian.id_poli=2 AND tb_antrian.tanggal = CURRENT_DATE() GROUP BY tb_antrian.id_antrian";
		return $this->db->query($query2)->row_array();
	}
	function edit_data($where){
		$query = "SELECT * FROM tb_periksa JOIN tb_user ON tb_user.id_user = tb_periksa.id_user WHERE tb_periksa.tanggal_periksa = CURRENT_DATE() and tb_periksa.id_poli=1 and tb_periksa.id_user = '$where' GROUP BY tb_periksa.id_user";
		return $this->db->query($query);		
	}
}
