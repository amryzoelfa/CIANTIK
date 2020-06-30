<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    //Model Login
    function loginApi($username, $password)
    {
        $this->db->select('id_user, id_akses, no_identitas, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, no_hp, alamat, username, password, foto'); //id_user, id_akses, no_identitas, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_hp, username, password, foto
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

    //Model Riwayat Pasien
    function getRiwayat($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_periksa');
        $this->db->join('tb_user', 'tb_periksa.id_user=tb_user.id_user');
        $this->db->join('tb_poli', 'tb_periksa.id_poli=tb_poli.id_poli');
        $this->db->where('tb_periksa.id_status_periksa', 2);
        $this->db->where('tb_periksa.id_user', $id_user);
        $query = $this->db->get("");
        return $query;
    }

    //Model Data Dokter
    function getDokter()
    {
        $query = "SELECT * FROM tb_user JOIN tb_akses ON tb_user.id_akses=tb_akses.id_akses WHERE tb_user.id_akses=3 OR tb_user.id_akses=4";
        return $this->db->query($query);
    }

    //Antrian Umum Sekarang
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

    //Antrian Gigi Sekarang
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

    //Jumlah Yang Mengantri Poli umum
    function jumlahUmum()
    {
        $query = "SELECT COUNT(tb_periksa.no_antrian) AS jumlah_au FROM tb_periksa WHERE id_poli = 1 AND id_status_periksa = 1 AND tanggal = CURRENT_DATE()";
        return $this->db->query($query);
    }

    //Jumlah Yang Mengantri Poli Gigi
    function jumlahGigi()
    {
        $query = "SELECT COUNT(tb_periksa.no_antrian) AS jumlah_ag FROM tb_periksa WHERE id_poli = 2 AND id_status_periksa = 1 AND tanggal = CURRENT_DATE()";
        return $this->db->query($query);
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //mengambil data id profil
    function getProfile($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id]);
    }

    //query update
    function updatepass($id)
    {
        $data = [
            'password' => $this->input->post('pasbar'),
        ];
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
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
        //$id_user = $this->session->userdata("session_id");
        $id_user = $this->input->post('id_user');
        $tanggal = date("Y-m-d");
        $antrian = $this->tambahUmum();
        $query = "INSERT INTO tb_periksa(id_periksa, id_user, id_poli, tanggal, no_antrian, id_status_periksa, id_status_obat) VALUES ('', '$id_user', '1', '$tanggal', '$antrian', '1','1')";
        return $this->db->query($query);
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
        //$id_user = $this->session->userdata("session_id");
        $id_user = $this->input->post('id_user');
        $tanggal = date("Y-m-d");
        $antrian = $this->tambahGigi();
        $query = "INSERT INTO tb_periksa(id_periksa, id_user, id_poli, tanggal, no_antrian, id_status_periksa, id_status_obat) VALUES ('', '$id_user', '2', '$tanggal', '$antrian', '1','1')";
        return $this->db->query($query);
    }

    function getUserById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
    }

    function updatePassword($id, $password_baru)
    {
        $data = array(
            'password' => $password_baru
        );

        return $this->db->update('tb_user', $data, ['id_user' => $id]);
    }

    function updateProfilById($id, $data)
    {
        return $this->db->update('tb_user', $data, ['id_user' => $id]);
    }

    function getListUmum()
    {
        $query = "SELECT * FROM tb_periksa, tb_user, tb_status, tb_poli WHERE tb_periksa.id_user=tb_user.id_user AND tb_periksa.id_status_periksa=tb_status.id_status  AND tb_periksa.id_poli=tb_poli.id_poli AND tb_periksa.id_poli=1 AND tb_periksa.tanggal=CURRENT_DATE()";
        return $this->db->query($query);;
    }

    function getListGigi()
    {
        $query = "SELECT * FROM tb_periksa, tb_user, tb_status, tb_poli WHERE tb_periksa.id_user=tb_user.id_user AND tb_periksa.id_status_periksa=tb_status.id_status  AND tb_periksa.id_poli=tb_poli.id_poli AND tb_periksa.id_poli=2 AND tb_periksa.tanggal=CURRENT_DATE()";
        return $this->db->query($query);
    }

    function jUmum()
    {
        $query = "SELECT COUNT(tb_periksa.id_user) AS jumlah_au FROM tb_periksa WHERE id_poli = 1 AND id_status_periksa = 1 AND tanggal = CURRENT_DATE()";
        return $this->db->query($query);
    }

    function jGigi()
    {
        $query = "SELECT COUNT(tb_periksa.id_user) AS jumlah_ag FROM tb_periksa WHERE id_poli = 2 AND id_status_periksa = 1 AND tanggal = CURRENT_DATE()";
        return $this->db->query($query);
    }

    //Antrian Umum pasien yang mengambil antrian
    public function cetakUmum($id_user)
    {
        //$id_user = $this->session->userdata("session_id");
        $query = "SELECT tanggal, MAX(no_antrian) as umum from tb_periksa where tanggal = CURRENT_DATE() and id_user = '$id_user' and id_poli = 1";
        return $this->db->query($query);
    }

    //Antrian gigi pasien yang mengambil antrian
    public function cetakGigi($id_user)
    {
        //$id_user = $this->session->userdata("session_id");
        $query = "SELECT tanggal, MAX(no_antrian) as gigi from tb_periksa where tanggal = CURRENT_DATE() and id_user = '$id_user' and id_poli = 2";
        return $this->db->query($query);
    }
}
