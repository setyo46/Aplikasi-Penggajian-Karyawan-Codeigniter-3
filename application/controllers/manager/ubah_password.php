<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_Password extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_karyawan');
        $this->load->model('m_karyawan');

        if($this->session->userdata('hak_akses') !='2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum login!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data['judul'] = 'Ubah Password';

        //load view tampil data
        $this->load->view('template_manager/header',$data);
        $this->load->view('template_manager/sidebar');
        $this->load->view('manager/v_ubahpassword', $data);
        $this->load->view('template_manager/footer');
    }

    public function ubah_password_aksi()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');
     
        $this->form_validation->set_rules('passBaru','password baru','required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass','ulangi password baru','required');

        if($this->form_validation->run() != FALSE) {
            $data = array('password' => md5($passBaru));
            $id = array('id_karyawan' => $this->session->userdata('id_karyawan'));
            $this->m_karyawan->update_password($data, $id);
            var_dump($data, $id);
            die();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Password berhasil diganti !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
        </div>');
        redirect('login');  
        } else {
            $data['judul'] = 'Ubah Password';

            //load view tampil data
            $this->load->view('template_manager/header',$data);
            $this->load->view('template_manager/sidebar');
            $this->load->view('manager/v_ubahpassword', $data);
            $this->load->view('template_manager/footer');
        }
    }
}