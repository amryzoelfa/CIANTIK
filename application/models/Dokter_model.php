<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_model extends CI_Model
{
	function drUmum()
	{
		$query1 = "SELECT tb_periksa.no_antrian, tb_user.nama, tb_periksa.tanggal, tb_periksa.id_status_periksa, tb_periksa.id_user FROM tb_user , tb_periksa WHERE tb_user.id_user = tb_periksa.id_user AND tb_periksa.tanggal = CURRENT_DATE() AND tb_periksa.id_poli = 1";
		return $this->db->query($query1)->result();
	}
	function drGigi()
	{
		$query2 = "SELECT tb_periksa.no_antrian, tb_periksa.tanggal, tb_user.nama, tb_periksa.id_status_periksa,tb_periksa.id_user FROM tb_user , tb_periksa WHERE tb_user.id_user = tb_periksa.id_user AND tb_periksa.tanggal = CURRENT_DATE() AND tb_periksa.id_poli = 2";
		return $this->db->query($query2)->result();
	}
	function edit_data_umum($where){
		$query = "SELECT * FROM tb_periksa JOIN tb_user ON tb_user.id_user = tb_periksa.id_user WHERE tb_periksa.tanggal = CURRENT_DATE() and tb_periksa.id_poli=1 and tb_periksa.id_status_periksa = 1 and tb_periksa.id_user = '$where' GROUP BY tb_periksa.id_user";
		return $this->db->query($query);		
	}
	function edit_data_gigi($where){
		$query = "SELECT * FROM tb_periksa JOIN tb_user ON tb_user.id_user = tb_periksa.id_user WHERE tb_periksa.tanggal = CURRENT_DATE() and tb_periksa.id_poli=2 and tb_periksa.id_status_periksa = 1 and tb_periksa.id_user = '$where' GROUP BY tb_periksa.id_user";
		return $this->db->query($query);		
	}
	function update_data_umum($id_user){
		$tanggal = date('Y-m-d');
		$data = [
			'tensi_darah' => $this->input->post('tensi_darah'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gejala' => $this->input->post('gejala'),
            'diagnosa' => $this->input->post('diagnosa'),
            'tindakan' => $this->input->post('tindakan'),
            'resep_obat' => $this->input->post('obat'),
            'keterangan' => $this->input->post('keterangan'),
            'id_status_periksa' => 2,
		];
		$this->db->where('id_user',$id_user);
		$this->db->where('id_poli',1);
		$this->db->where('tanggal',$tanggal);
		$this->db->update('tb_periksa',$data);
	}
	function proses_umum($id_user){
		$tanggal = date('Y-m-d');
		$ubah = [
			'id_status_periksa' => 3,
		];
		$this->db->where('id_user',$id_user);
		$this->db->where('id_poli',1);
		$this->db->where('tanggal',$tanggal);
		$this->db->update('tb_periksa',$ubah);
	}

	function update_data_gigi($id_user){
		$tanggal = date('Y-m-d');
		$data = [
			'tensi_darah' => $this->input->post('tensi_darah'),
            'riwayat_penyakit' => $this->input->post('riwayat_penyakit'),
            'gejala' => $this->input->post('gejala'),
            'diagnosa' => $this->input->post('diagnosa'),
            'tindakan' => $this->input->post('tindakan'),
            'resep_obat' => $this->input->post('obat'),
            'keterangan' => $this->input->post('keterangan'),
            'id_status_periksa' => 2,
		];
		$this->db->where('id_user',$id_user);
		$this->db->where('id_poli',2);
		$this->db->where('tanggal',$tanggal);
		$this->db->update('tb_periksa',$data);
	}
	function proses_gigi($id_user){
		$tanggal = date('Y-m-d');
		$ubah = [
			'id_status_periksa' => 3,
		];
		$this->db->where('id_user',$id_user);
		$this->db->where('id_poli',2);
		$this->db->where('tanggal',$tanggal);
		$this->db->update('tb_periksa',$ubah);
	}
	function kembali_umum(){
		$tanggal = date('Y-m-d');
		$ubah = [
			'id_status_periksa' => 1,
		];
		$this->db->where('id_poli',1);
		$this->db->where('id_status_periksa',3);
		$this->db->where('tanggal',$tanggal);
		$this->db->update('tb_periksa',$ubah);
	}
	function kembali_gigi(){
		$tanggal = date('Y-m-d');
		$ubah = [
			'id_status_periksa' => 1,
		];
		$this->db->where('id_poli',2);
		$this->db->where('id_status_periksa',3);
		$this->db->where('tanggal',$tanggal);
		$this->db->update('tb_periksa',$ubah);
	}
}
?>