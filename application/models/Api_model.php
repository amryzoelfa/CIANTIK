<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function loginApi($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query;
    }
    function cekUser($user)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username', $user);
        $query = $this->db->get();
        return $query;
    }
    function cekID($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query;
    }
    function getRiwayat()
    {
        $this->db->select('tanggal_periksa,id_poli,diagnosa,tindakan,resep_obat');
        $this->db->from('tb_periksa');
        $this->db->join('tb_user', 'tb_periksa.id_user=tb_user.id_user');
        $this->db->where('tb_periksa.id_status_periksa', 2);
        $query = $this->db->get("");
        return $query;
    }
}
