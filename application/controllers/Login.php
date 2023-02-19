<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_hak_akses');
    }
    public function index()
	{
        $this->_rules();     

        if ($this->form_validation->run()==FALSE) {
            $data ['judul'] = 'Login' ;
            $this->load->view('template_admin/header',$data);
            $this->load->view('user/v_login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // $data['hakakses'] = $this->m_hak_akses->all_data();
            $cek = $this->m_hak_akses->cek_login($username, $password);

            if ($cek == FALSE) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau password salah!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('login');
            } else {

                $this->session->set_userdata('hak_akses', $cek->id_hak_akses);
                $this->session->set_userdata('nama_karyawan', $cek->nama_karyawan);
                $this->session->set_userdata('photo', $cek->photo);
                $this->session->set_userdata('id_karyawan', $cek->id_karyawan);
                $this->session->set_userdata('nik', $cek->nik);

                switch ($cek->id_hak_akses) {
					case 1 : redirect('admin/dashboard');
						break;
					case 2 : redirect('manager/dashboard');
						break;
                    case 3 : redirect('karyawan/dashboard');
						break;
					default:
						break;
                 }
            }         
        }      
	}

    public function _rules()
    {
        $this->form_validation->set_rules('username','username','required',
        ['required' =>'%s harus diisi']);
        $this->form_validation->set_rules('password','password','required',
        ['required' =>'%s harus diisi']);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}
