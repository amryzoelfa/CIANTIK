<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function loginApi($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
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
}
