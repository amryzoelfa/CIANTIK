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
        $password = $this->input->post('password');
        $result = $this->Api_model->loginApi($username, $password);
        echo json_encode($result);
    }
    public function Riwayat()
    {
        $data = $this->Api_model->getRiwayat();
        echo json_encode($data->result_array());
    }
}
