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

    // public function LoginApi()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $username = $_POST['username'];
    //         $password = $_POST['password'];

    //         $response = $this->Api_model->loginApi($username, $password)->result();

    //         $result = array();
    //         $result['login_view'] = array();
    //         if ($response != FALSE) {
    //             foreach ($response as $row) {
    //                 $index['id_user'] = $row->id_user;
    //                 $index['username'] = $row->username;
    //                 $index['foto'] = $row->foto;
    //             }
    //             array_push($result['login_view'], $index);

    //             $result['success'] = "1";
    //             $result['message'] = "success";
    //             echo json_encode($result);
    //         } else {
    //             $result['success'] = "0";
    //             $result['message'] = "error";
    //             echo json_encode($result);
    //         }
    //     }
    // }

    public function LoginApi()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $result = $this->Api_model->loginApi($username, $password)->result_array();
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function Riwayat()
    {
        $data = $this->Api_model->getRiwayat();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    public function Dokter()
    {
        $data = $this->Api_model->getDokter();
        header('content-type: application/json');
        echo json_encode($data->result_array());
    }

    public function antrianUmum()
    {
        $data = $this->Api_model->getAntrianUmum();
        header('content-type: application/json');
        echo json_encode($data->row_array());
    }

    public function antrianGigi()
    {
        $data = $this->Api_model->getAntrianGigi();
        header('content-type: application/json');
        echo json_encode($data->row_array());
    }

    public function Profile($id)
    {
        $data = $this->Api_model->getProfile($id);
        header('content-type: application/json');
        echo json_encode($data->result_array());    
    }

    public function Password()
    {
        if($this->input->post('password_lama') && $this->input->post('id_user') && $this->input->post('password_baru')){
            $id_user = $this->input->post('id_user');
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');

            $user = $this->Api_model->getUserById($id_user);

            if($user){
                if (md5($password_lama) == $user['password']) {

                    $password_baru = md5($password_baru);
                    
                    if($this->Api_model->updatePassword($id_user, $password_baru)) {
                        $response = array(
                            'status' => true, 
                            'message' => 'berhasil update password'
                        );
            
                        header('content-type: application/json');
                        echo json_encode($response);   
                    } else {
                        $response = array(
                            'status' => false, 
                            'message' => 'gagal update password'
                        );
            
                        header('content-type: application/json');
                        echo json_encode($response);   
                    }

                } else {
                    $response = array(
                        'status' => false, 
                        'message' => 'password lama salah'
                    );
        
                    header('content-type: application/json');
                    echo json_encode($response);   
                }
            
            }else{
                $response = array(
                    'status' => false, 
                    'message' => 'user tidak ditemukan'
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

    public function updateProfil(){
        if($this->input->post('id_user') && $this->input->post('nama') && $this->input->post('alamat') && $this->input->post('tempat_lahir') && $this->input->post('tanggal_lahir') && $this->input->post('jenis_kelamin')){
            $id_user = $this->input->post('id_user');

            $data = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir')
            );

            if($this->Api_model->updateProfilById($id_user, $data)){
                $response = array(
                    'status' => true, 
                    'message' => 'Berhasil update profil'
                );
    
                header('content-type: application/json');
                echo json_encode($response);   
            } else {
                $response = array(
                    'status' => false, 
                    'message' => 'Gagal update profil'
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

    public function gantipass()
    {
        $paslam = $this->input->post('paslam');
        $cek = $this->Api_model->getProfile($id)->result();
        if ($paslam != $cek['password']) {
            $result["message"] = "Password Lama Salah!";
        } else {
            $this->Api_model->updatepass();
        }
    }

    public function insertUmum()
    {
        $data = $this->Api_model->insertUmum();
        echo json_encode($data->result_array());
    }

    public function insertGigi()
    {
        $data = $this->Api_model->insertGigi();
        echo json_encode($data->result_array());
    }

    public function jumlahUmum()
    {
        $data = $this->Api_model->jumlahUmum();
        echo json_encode($data->result_array());
    }

    public function jumlahGigi()
    {
        $data = $this->Api_model->jumlahGigi();
        echo json_encode($data->result_array());
    }
}
