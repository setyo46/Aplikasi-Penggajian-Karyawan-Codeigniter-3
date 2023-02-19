<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 
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
      
        $data['judul'] = 'Dashboard';
        $id=$this->session->userdata('id_karyawan');
        $data['karyawan'] = $this->db->query("SELECT *FROM tb_karyawan 
        INNER JOIN tb_jabatan ON tb_karyawan.id_jabatan=tb_jabatan.id_jabatan 
        WHERE id_karyawan='$id'")->result();
       
        //load view
        $this->load->view('template_manager/header',$data);
		$this->load->view('template_manager/sidebar');
		$this->load->view('manager/v_dashboard', $data);
		$this->load->view('template_manager/footer');

    }
}

