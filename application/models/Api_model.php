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
        $this->db->select('tanggal,id_poli,diagnosa,tindakan,resep_obat');
        $this->db->from('tb_periksa');
        $this->db->join('tb_user', 'tb_periksa.id_user=tb_user.id_user');
        $this->db->where('tb_periksa.id_status_periksa', 2);
        $query = $this->db->get("");
        return $query;
    }

    function getAntrianUmum()
    {
        $this->db->select('no_antrian');
        $this->db->from('tb_periksa');
        $this->db->join('tb_poli', 'tb_periksa.id_poli=tb_poli.id_poli');
        $this->db->where('tb_periksa.id_status_periksa', 3);
        $this->db->where('tb_periksa.id_poli', 1);
        $this->db->where('tb_periksa.tanggal', 'NOW()');
        $this->db->group_by('tb_periksa.id_periksa');
        $query = $this->db->get("");
        return $query;
    }

    function getAntrianGigi()
    {
        $this->db->select('no_antrian');
        $this->db->from('tb_periksa');
        $this->db->join('tb_poli', 'tb_periksa.id_poli=tb_poli.id_poli');
        $this->db->where('tb_periksa.id_status_periksa', 3);
        $this->db->where('tb_periksa.id_poli', 2);
        $this->db->where('tb_periksa.tanggal', 'NOW()');
        $this->db->group_by('tb_periksa.id_periksa');
        $query = $this->db->get("");
        return $query;
    }
    function getProfile($id)
    {
        return $this->db->get_where('tb_user',['id_user'=>$id]);
    }

    function getUserById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }

    function updatePassword($id, $password_baru){
        $data = array(
            'password' => $password_baru
        );

        return $this->db->update('tb_user', $data, ['id_user' => $id]);
    }

    function updateProfilById($id, $data){
        return $this->db->update('tb_user', $data, ['id_user' => $id]);
    }
}
