<?php
class Master_model extends CI_Model
{
    function getDataAkses()
    {
        $this->db->select('*');
        $this->db->from('tb_akses');
        $query = $this->db->get();
        return $query;
    }

    function getApoteker()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('tb_user.id_akses', 5);
        $query = $this->db->get("");
        return $query;
    }

    function getDokter()
    {
        $query = "SELECT * FROM tb_user WHERE id_akses=3 OR id_akses=4";
        return $this->db->query($query);
    }

    function getPasien()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('tb_user.id_akses', 2);
        $query = $this->db->get("");
        return $query;
    }

    function getPoli()
    {
        $this->db->select('*');
        $this->db->from('tb_poli');
        $query = $this->db->get();
        return $query;
    }

    function getStatus()
    {
        $this->db->select('*');
        $this->db->from('tb_status');
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
}
