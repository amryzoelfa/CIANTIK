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
}
