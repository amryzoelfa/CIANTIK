<?php
class Master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');
        $this->load->model('Admin_model');
        $this->load->library('template');
    }

    public function DataAkses()
    {
        $data['akses'] = $this->Admin_model->getAkses();
        $this->template->tampil('Admin/DataAkses_view', $data);
    }

    public function editAkses($id)
    {
        $where = array('id_akses' => $id);
        $data['akses'] = $this->Admin_model->edit_data($where, 'tb_akses')->result();
        $data['akses'] = $this->Admin_model->getAkses();
        $this->template->tampil('Admin/edit_DataAkses', $data);
    }

    public function update()
    {
        $id_user = $this->input->post('id_user');
        $akses = $this->input->post('akses');
        $no_identitas = $this->input->post('no_identitas');
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'id_akses' => $akses,
            'id_user' => $id_user,
            'no_identitas' => $no_identitas,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan,
            'username' => $username,
            'password' => $password
        );
        $where = array('id_user' => $id_user);
        $this->Master_model->update_data($where, $data, 'tb_user');
        // redirect('Admin');
        if ($akses == 2) {
            redirect('Master/DataPasien');
        } elseif ($akses == 3) {
            redirect('Master/DataDokter');
        } else if ($akses == 4) {
            redirect('Master/DataDokter');
        } else if ($akses == 5) {
            redirect('Master/DataApoteker');
        }
    }

    public function hapus($id_user)
    {
        $akses = $this->input->post('akses');
        $data = array(
            'id_akses' => $akses
        );
        $where = array('id_user' => $id_user);
        $this->Master_model->hapus_data($where, 'tb_user');
        // redirect('Admin');
        if ($akses == 2) {
            redirect('Master/DataPasien');
        } elseif ($akses == 3) {
            redirect('Master/DataDokter');
        } else if ($akses == 4) {
            redirect('Master/DataDokter');
        } else if ($akses == 5) {
            redirect('Master/DataApoteker');
        }
    }

    public function DataApoteker()
    {
        $data['apoteker'] = $this->Master_model->getApoteker()->result();
        $this->template->tampil('Admin/DataApoteker_view', $data);
    }

    public function edit($id_user)
    {
        $where = array('id_user' => $id_user);
        $data['apoteker'] = $this->Master_model->edit_data($where, 'tb_user')->result();
        $data['dokter'] = $this->Master_model->edit_data($where, 'tb_user')->result();
        $data['pasien'] = $this->Master_model->edit_data($where, 'tb_user')->result();
        $this->template->tampil('Admin/edit_Data', $data);
    }

    public function DataDokter()
    {
        $data['dokter'] = $this->Master_model->getDokter()->result();
        $this->template->tampil('Admin/DataDokter_view', $data);
    }

    public function DataPasien()
    {
        $data['pasien'] = $this->Master_model->getPasien()->result();
        $this->template->tampil('Admin/DataPasien_view', $data);
    }

    public function DataPoli()
    {
        $data['poli'] = $this->Master_model->getPoli()->result();
        $this->template->tampil('Admin/DataPoli_view', $data);
    }

    public function DataStatus()
    {
        $data['status'] = $this->Master_model->getStatus()->result();
        $this->template->tampil('Admin/DataStatus_view', $data);
    }
}
