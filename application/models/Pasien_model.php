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

    public function getCetak()
    {
        $id_user = $this->session->userdata("session_id");
        $query = "SELECT tb_periksa.no_antrian FROM tb_periksa WHERE id_poli = 1 AND tanggal=CURRENT_DATE() AND id_user=$id_user";
        return $this->db->query($query);
    }

    public function getTambahUmum()
    {
        $id_user = $this->session->userdata("session_id");
        $this->db->select('*');
        $this->db->from('tb_periksa');
        $this->db->join('tb_user', 'tb_user.id_user=tb_periksa.id_user');
        $this->db->where('tb_periksa.id_poli', 1);
        $this->db->where('tb_periksa.id_user', $id_user);
        $query = $this->db->get("");
        return $query;
    }

    public function getAntrianUmum()
    {
        $id_user = $this->session->userdata("session_id");
        $tanggal = date("Y-m-d");
        $sql = "SELECT MAX(no_antrian) AS kode FROM tb_periksa WHERE tanggal=CURRENT_DATE() AND id_poli = 1";
        $data = $this->db->query($sql);
        $tambah = $data['kode'];
        $antrian = (int) $tambah;
        $antrian++;
        // var_dump($antrian);
        // die();
        $query = "INSERT INTO tb_periksa(id_periksa, id_user, id_poli, tanggal, no_antrian, id_status_periksa, id_status_obat) 
        VALUES ('', '$id_user', '1', '$tanggal', '$antrian', '1','1')";
        return $this->db->query($query);
        //UPDATE tb_periksa SET tanggal = $tanggal, no_antrian = $antrian WHERE id_poli=1 AND tanggal = CURRENT_DATE() AND id_user=$id_user
    }

    public function updateAntrianGigi()
    {
        $id_user = $this->session->userdata("session_id");
        $tanggal = date("Y-m-d");
        $tambah = "SELECT MAX(no_antrian) FROM tb_periksa WHERE tanggal=CURRENT_DATE() AND id_poli=1";
        $antrian = $tambah['no_antrian'] + 1;
        $query = "INSERT INTO tb_periksa(id_periksa, id_user, id_poli, tanggal, no_antrian, id_status_periksa, id_status_obat) VALUES ('', '$id_user', '1', '$tanggal', '$antrian', '1','1')";
        return $this->db->query($query);
        //UPDATE tb_periksa SET tanggal = $tanggal, no_antrian = $antrian WHERE id_poli=1 AND tanggal = CURRENT_DATE() AND id_user=$id_user
    }

    public function updateAntrianUmum()
    {
        $this->db->select('MAX(tb_periksa.no_antrian) as nomor');
        $this->db->where('tanggal', 'CURRENT_DATE()');
        $this->db->where('id_poli', 1);
        $query = $this->db->get('tb_periksa');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->no_antrian) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        // var_dump($kode);
        // die();
        $id_user = $this->session->userdata("session_id");
        $tanggal = date("Y-m-d");
        $antrian = "00" . $kode;  //format kode
        $sql = "INSERT INTO tb_periksa(id_periksa, id_user, id_poli, tanggal, no_antrian, id_status_periksa, id_status_obat) VALUES ('', '$id_user', '1', '$tanggal', '$antrian', '1','1')";
        return $this->db->query($sql);
        //return $kodetampil;
    }
}
