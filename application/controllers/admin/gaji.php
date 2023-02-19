<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gaji');
		$this->load->model('m_karyawan');
		$this->load->model('m_bpjs');
		$this->load->model('m_kehadiran');
		$this->load->model('m_potongan');

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
		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}

		$data['judul'] = 'Data Gaji';
		
		$data['gaji'] 	  = $this->m_gaji->all_data($bulantahun);
		$data['potongan'] = $this->m_potongan->all_data();
		
        //load view tampil data
		$this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/gaji/v_gaji', $data);
        $this->load->view('template_admin/footer');
    }

	public function input_gaji()
    {

		$data['judul'] = 'Input Gaji';

		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	
		$data['input_gaji'] = $this->m_gaji->input_data($bulantahun);
		//load view tampil data
		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/gaji/v_inputgaji', $data);
		$this->load->view('template_admin/footer');
    }

	public function input_gaji_aksi()
	{
		$post = $this->input->post();

		foreach($post['bulan'] as $key => $value) {
			if($post['bulan'][$key] != null || $post['id_karyawan'][$key] != null) {
				$data[] =
					[
						'bulan'				 => $post['bulan'][$key],
						'id_karyawan'		 => $post['id_karyawan'][$key],
						'id_jabatan'		 => $post['id_jabatan'][$key],
						'id_kehadiran'		 => $post['id_kehadiran'][$key],
						
					];
				}
			}
			
		$this->m_gaji->insert_batch($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
          redirect('admin/gaji'); 

	}

	public function delete_gaji($id_gaji)
    {
        $data = array('id_gaji' => $id_gaji);

        $this->m_gaji->delete_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
        redirect('admin/gaji/index');
        

    }


}