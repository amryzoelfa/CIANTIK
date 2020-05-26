<?php
class Akses extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('template');
    }

    function index()
    {
        $data['akses'] = $this->Admin_model->getAkses();
        $this->template->tampil('crud/home_akses', $data);
    }

    function Profil($id_user)
    {
    }
}
