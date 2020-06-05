<?php
class Admin_model extends CI_Model
{
    function getAll()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_akses', 'tb_user.id_akses=tb_akses.id_akses');
        $query = $this->db->get("");
        return $query;
    }

    function getAkses()
    {
        $this->db->order_by('id_akses', 'ASC');
        return $this->db->from('tb_akses')->get()->result();
    }

    public function getDaftar()
    {
        $this->db->select('*');
        $this->db->from('tb_akses');
        $this->db->where('tb_akses.id_akses !=', 1);
        $query = $this->db->get("");
        return $query;
    }

    function login($user, $pass, $table)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $query = $this->db->get();
        return $query;
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function getAntrianUmum()
    {
        $query = "SELECT tb_periksa.no_antrian, tb_periksa.tanggal, tb_user.nama, tb_user.no_identitas, tb_periksa.id_status_periksa, tb_periksa.id_status_obat, tb_periksa.id_user FROM tb_user , tb_periksa where tb_user.id_user = tb_periksa.id_user AND tb_periksa.tanggal = CURRENT_DATE() AND tb_periksa.id_poli = 1 AND tb_periksa.tanggal = CURRENT_DATE() GROUP BY tb_periksa.id_periksa";
        return $this->db->query($query)->result();
    }

    function getAntrianGigi()
    {
        $query = "SELECT tb_periksa.no_antrian, tb_periksa.tanggal, tb_user.no_identitas, tb_user.nama, tb_periksa.id_status_periksa, tb_periksa.id_status_obat, tb_periksa.id_user FROM tb_user , tb_periksa WHERE tb_user.id_user = tb_periksa.id_user AND tb_periksa.tanggal = CURRENT_DATE() AND tb_periksa.id_poli = 2 AND tb_periksa.tanggal = CURRENT_DATE() GROUP BY tb_periksa.id_periksa";
        return $this->db->query($query)->result();
    }
}
