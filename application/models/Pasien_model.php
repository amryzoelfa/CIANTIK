<?php
class Pasien_model extends CI_Model
{
    public function getRiwayat()
    {
        // $id_user = $this->session->userdata['logged_in']['id_user'];
        $id_user = $this->session->userdata("session_id"); // dapatkan id user yg login
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_periksa', 'tb_user.id_user=tb_periksa.id_user');
        $this->db->where('tb_periksa.id_user', $id_user);
        $this->db->where('tb_periksa.id_status_periksa', 2);
        $query = $this->db->get("");
        return $query;
    }

    public function getUmum()
    {
        $query = "SELECT tb_periksa.no_antrian FROM tb_periksa, tb_poli WHERE tb_poli.id_poli=tb_periksa.id_poli AND tb_periksa.id_status_periksa=3 AND tb_periksa.id_poli=1 AND tb_periksa.tanggal=CURRENT_DATE() GROUP BY tb_periksa.id_periksa";
        return $this->db->query($query);
    }

    public function getGigi()
    {
        $query = "SELECT tb_periksa.no_antrian FROM tb_periksa, tb_poli WHERE tb_periksa.id_poli=tb_poli.id_poli AND tb_periksa.id_status_periksa=3 AND tb_periksa.id_poli=2 AND tb_periksa.tanggal=CURRENT_DATE() GROUP BY tb_periksa.id_periksa";
        return $this->db->query($query);
    }

    public function getJUmum()
    {
        $query = "SELECT COUNT(tb_periksa.id_user) AS jumlah_au FROM tb_periksa WHERE id_poli = 1 AND id_status_periksa = 1 AND tanggal = CURRENT_DATE()";
        return $this->db->query($query);
    }

    public function getJGigi()
    {
        $query = "SELECT COUNT(tb_periksa.id_user) AS jumlah_ag FROM tb_periksa WHERE id_poli = 2 AND id_status_periksa = 1 AND tanggal = CURRENT_DATE()";
        return $this->db->query($query);
    }

    public function tambahUmum()
    {
        $tanggal = date('Y-m-d');
        $this->db->select("COUNT(no_antrian) AS antrianUmum");
        $this->db->where('tanggal', $tanggal);
        $this->db->where('id_poli', 1);
        $query = $this->db->get('tb_periksa');
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $noUmum = intval($data->antrianUmum) + 1;
        } else {
            $noUmum = 1;  //cek jika kode belum terdapat pada table
        }
        return $noUmum;
        $data = $this->db->get();
        if ($data->num_rows() <> 0) {
            return $data->result_array();
        } else {
            return false;
        }
    }

    public function insertUmum()
    {
        $id_user = $this->session->userdata("session_id");
        $tanggal = date("Y-m-d");
        $antrian = $this->tambahUmum();
        $query = "INSERT INTO tb_periksa(id_periksa, id_user, id_poli, tanggal, no_antrian, id_status_periksa, id_status_obat) VALUES ('', '$id_user', '1', '$tanggal', '$antrian', '1','1')";
        return $this->db->query($query);
    }

    public function cetakUmum()
    {
        $id_user = $this->session->userdata("session_id");
        $query = "SELECT MAX(no_antrian) as umum from tb_periksa where tanggal = CURRENT_DATE() and id_user = '$id_user' and id_poli = 1";
        return $this->db->query($query)->result();
    }

    public function tambahGigi()
    {
        $tanggal = date('Y-m-d');
        $this->db->select("COUNT(no_antrian) AS antrianGigi");
        $this->db->where('tanggal', $tanggal);
        $this->db->where('id_poli', 2);
        $query = $this->db->get('tb_periksa');
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $noGigi = intval($data->antrianGigi) + 1;
        } else {
            $noGigi = 1;  //cek jika kode belum terdapat pada table
        }
        return $noGigi;
        $data = $this->db->get();
        if ($data->num_rows() <> 0) {
            return $data->result_array();
        } else {
            return false;
        }
    }

    public function insertGigi()
    {
        $id_user = $this->session->userdata("session_id");
        $tanggal = date("Y-m-d");
        $antrian = $this->tambahGigi();
        $query = "INSERT INTO tb_periksa(id_periksa, id_user, id_poli, tanggal, no_antrian, id_status_periksa, id_status_obat) VALUES ('', '$id_user', '2', '$tanggal', '$antrian', '1','1')";
        return $this->db->query($query);
    }

    public function cetakGigi()
    {
        $id_user = $this->session->userdata("session_id");
        $query = "SELECT MAX(no_antrian) as gigi from tb_periksa where tanggal = CURRENT_DATE() and id_user = '$id_user' and id_poli = 2";
        return $this->db->query($query)->result();
    }

    public function selesaiUmum()
    {
        $query = "SELECT COUNT(no_antrian) as sUmum from tb_periksa where tanggal = CURRENT_DATE() and id_status_periksa=2 and id_poli = 1";
        return $this->db->query($query);
    }

    public function selesaiGigi()
    {
        $query = "SELECT COUNT(no_antrian) as sGigi from tb_periksa where tanggal = CURRENT_DATE() and id_status_periksa=2 and id_poli = 2";
        return $this->db->query($query);
    }
}
