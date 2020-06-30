<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
    }

    public function index()
    {
        echo 'ANTIK (Antrian Klinik)';
    }

    //Login
    public function LoginApi()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $result = $this->Api_model->loginApi($username, $password)->result_array();
        header('content-type: application/json');
        echo json_encode($result);
    }

    //Riwayat Pasien
    public function Riwayat($id_user)
    {
        $data = $this->Api_model->getRiwayat($id_user);
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    //Data Dokter
    public function Dokter()
    {
        $data = $this->Api_model->getDokter();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    //Profil
    public function Profile($id)
    {
        $data = $this->Api_model->getProfile($id);
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    //Ganti Password
    public function Password()
    {
        if ($this->input->post('password_lama') && $this->input->post('id_user') && $this->input->post('password_baru')) {
            $id_user = $this->input->post('id_user');
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');

            $user = $this->Api_model->getUserById($id_user);

            if ($user) {
                if (md5($password_lama) == $user['password']) {

                    $password_baru = md5($password_baru);

                    if ($this->Api_model->updatePassword($id_user, $password_baru)) {
                        $response = array(
                            'status' => true,
                            'message' => 'Berhasil Update Password'
                        );

                        header('content-type: application/json');
                        echo json_encode($response);
                    } else {
                        $response = array(
                            'status' => false,
                            'message' => 'Gagal Update Password'
                        );

                        header('content-type: application/json');
                        echo json_encode($response);
                    }
                } else {
                    $response = array(
                        'status' => false,
                        'message' => 'Password Lama Salah'
                    );

                    header('content-type: application/json');
                    echo json_encode($response);
                }
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'User Tidak Ditemukan'
                );

                header('content-type: application/json');
                echo json_encode($response);
            }
        } else {
            $response = array(
                'status' => false,
                'message' => 'input tidak sesuai'
            );

            header('content-type: application/json');
            echo json_encode($response);
        }
    }

    //Edit Profil
    public function updateProfil()
    {
        if ($this->input->post('id_user') && $this->input->post('nama') && $this->input->post('alamat') && $this->input->post('tempat_lahir') && $this->input->post('tanggal_lahir') && $this->input->post('jenis_kelamin') && $this->input->post('no_hp')) {
            $id_user = $this->input->post('id_user');

            $data = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'no_hp' => $this->input->post('no_hp')
            );

            if ($this->Api_model->updateProfilById($id_user, $data)) {
                $response = array(
                    'status' => true,
                    'message' => 'Berhasil, Silahkan Login Kembali'
                );

                header('content-type: application/json');
                echo json_encode($response);
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Gagal Update Profil'
                );

                header('content-type: application/json');
                echo json_encode($response);
            }
        } else {
            $response = array(
                'status' => false,
                'message' => 'Input Tidak Sesuai'
            );

            header('content-type: application/json');
            echo json_encode($response);
        }
    }

    //Antrian umum yg diproses sekarang
    public function antrianUmum()
    {
        $data = $this->Api_model->getAntrianUmum();
        header('content-type: application/json');
        echo json_encode($data->row_array());
    }

    //Antrian gigi yang diproses sekarang
    public function antrianGigi()
    {
        $data = $this->Api_model->getAntrianGigi();
        header('content-type: application/json');
        echo json_encode($data->row_array());
    }

    public function insertUmum($id_user)
    {
        //$id_user = $this->input->post('id_user');
        $antrian = $this->Api_model->tambahUmum();
        $tanggal = date("Y-m-d");
        $periksa = 1;
        $obat = 1;
        $poli = 1;
        // $data = $this->Api_model->insertUmum($id_user);
        // header('content-type: application/json');
        // echo json_encode($data->result_array());
        $data = array(
            'id_user' => $id_user,
            'id_poli' => $poli,
            'tanggal' => $tanggal,
            'no_antrian' => $antrian,
            'id_status_periksa' => $periksa,
            'id_status_obat' => $obat
        );
        if ($this->Api_model->input_data($data, 'tb_periksa')) {
            $response = array(
                'status' => true,
                'message' => 'Berhasil Ambil Antrian'
            );

            header('content-type: application/json');
            echo json_encode($response);
        } else {
            $response = array(
                'status' => false,
                'message' => 'Berhasil Ambil Antrian'
            );

            header('content-type: application/json');
            echo json_encode($response);
        }
    }

    public function insertGigi($id_user)
    {
        // $id_user = $this->input->post('id_user');
        // $data = $this->Api_model->insertGigi($id_user);
        // header('content-type: application/json');
        // echo json_encode($data->result_array());
        $antrian = $this->Api_model->tambahGigi();
        $tanggal = date("Y-m-d");
        $periksa = 1;
        $obat = 1;
        $poli = 2;
        $data = array(
            'id_user' => $id_user,
            'id_poli' => $poli,
            'tanggal' => $tanggal,
            'no_antrian' => $antrian,
            'id_status_periksa' => $periksa,
            'id_status_obat' => $obat
        );
        if ($this->Api_model->input_data($data, 'tb_periksa')) {
            $response = array(
                'status' => true,
                'message' => 'Berhasil Ambil Antrian'
            );

            header('content-type: application/json');
            echo json_encode($response);
        } else {
            $response = array(
                'status' => false,
                'message' => 'Berhasil Ambil Antrian'
            );

            header('content-type: application/json');
            echo json_encode($response);
        }
    }

    public function jumlahUmum()
    {
        $data = $this->Api_model->jumlahUmum();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    public function jumlahGigi()
    {
        $data = $this->Api_model->jumlahGigi();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    //List Antrian Umum
    public function listUmum()
    {
        $data = $this->Api_model->getListUmum();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    //List Antrian Gigi
    public function listGigi()
    {
        $data = $this->Api_model->getListGigi();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    public function getJumum()
    {
        $data = $this->Api_model->Jumum();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    public function getJgigi()
    {
        $data = $this->Api_model->JGigi();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    public function cetakUmum($id_user)
    {
        $data = $this->Api_model->cetakUmum($id_user);
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    public function cetakGigi($id_user)
    {
        $data = $this->Api_model->cetakGigi($id_user);
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }
}
