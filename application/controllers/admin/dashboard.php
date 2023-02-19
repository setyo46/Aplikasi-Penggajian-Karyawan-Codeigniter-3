<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('hak_akses') !='1') {
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
      
        $karyawan = $this->db->query("SELECT * FROM tb_karyawan");//menampilkan jumlah data pegawai di dashboard
        $admin =$this->db->query("SELECT * FROM tb_karyawan WHERE id_hak_akses = '1'");
        $jabatan =$this->db->query("SELECT * FROM tb_jabatan");
        $kehadiran =$this->db->query("SELECT * FROM tb_kehadiran");

        $data ['judul'] = 'Dashboard' ;
        $data['karyawan']=$karyawan->num_rows();
        $data['admin']=$admin->num_rows();
        $data['jabatan']=$jabatan->num_rows();
        $data['kehadiran']=$kehadiran->num_rows();
        
        
        //load view
        $this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/v_dashboard', $data);
		$this->load->view('template_admin/footer');

    }
}

