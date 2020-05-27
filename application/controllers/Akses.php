<?php
class Akses extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Akses_model');
        $this->load->library('template');
    }

    function index()
    {
        $data['akses'] = $this->Admin_model->getAkses();
        $this->template->tampil('crud/home_akses', $data);
    }

    function Profil()
    {
        $data['user'] = $this->Akses_model->getProfil()->row_array();
        $this->template->tampil('admin/profil_view', $data);
    }

    function updateProfile()
    {
        $id_user=$this->input->post('id');
        $ubah_foto = $this->input->post('ubah_foto');

        if($ubah_foto){
            $data=array(
                'no_identitas' => $this->input->post('no_identitas'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'foto' => $this->input->post('foto')
            );
        }else{
            $data=array(
                'no_identitas' => $this->input->post('no_identitas'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp')
            );

        }


        if($this->Akses_model->updateProfile($id_user,$data)){
            redirect('Akses/Profil');
        }
    }



    Public function gantiPassword()
    {
        $this->template->tampil('admin/ganti_password_view');
    }

    Public function updatePassword()
    {
        $paslam=$this->input->post('paslam');
        $pasnew=$this->input->post('pasnew');
        $conpas=$this->input->post('conpas');

        $data = $this->Akses_model->getProfil()->row_array();
        
        if($paslam != $data['password']){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama anda salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('akses/gantiPassword');
        } else {
            if ($pasnew != $conpas) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Konfirmasi Password tidak sama<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('akses/gantiPassword');
            } else {
                if ($this->db->update('tb_user',['password'=>$pasnew],['id_user'=>$data['id_user']])){
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil rubah password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('akses/gantiPassword');
                    redirect('akses/gantiPassword');
                }
            }
        }
    }

}
