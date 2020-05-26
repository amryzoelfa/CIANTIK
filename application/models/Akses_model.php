<?php
class Akses_model extends CI_Model
{
    function getProfil()
    {
        $id_user = $this->session->userdata['logged_in']['id_user']; // dapatkan id user yg login
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_akses', 'tb_user.id_akses=tb_akses.id_akses');
        $query = $this->db->get("");
        return $query;
    }
}