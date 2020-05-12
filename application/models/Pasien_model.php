<?php
class Pasien_model extends CI_Model
{
    public function getRiwayat()
    {
        // $id_user = $this->session->userdata['logged_in']['id_user'];
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_periksa', 'tb_user.id_user=tb_periksa.id_user');
        $this->db->where('tb_periksa.id_status_periksa', 2);
        $query = $this->db->get("");
        return $query;
    }

    
}
