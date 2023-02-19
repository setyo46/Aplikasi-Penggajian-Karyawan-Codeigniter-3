<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kehadiran');
        $this->load->model('m_karyawan');

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

		
		$data['judul'] = 'Data Kehadiran';
		$data['kehadiran'] = $this->m_kehadiran->all_data($bulantahun);
		// var_dump($data);
		// die();
			

        //load view tampil data
		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/kehadiran/v_kehadiran', $data);
		$this->load->view('template_admin/footer');
       
    }

	public function input_kehadiran()
    {

		$data['judul'] = 'Input Kehadiran';

		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	
		$data['input_kehadiran'] = $this->m_kehadiran->input_data($bulantahun);
		//load view tampil data
		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/kehadiran/v_inputkehadiran', $data);
		$this->load->view('template_admin/footer');
    }

	public function input_kehadiran_aksi()
	{
		$post = $this->input->post();

		foreach($post['bulan'] as $key => $value) {
			if($post['bulan'][$key] != null || $post['id_karyawan'][$key] != null) {
				$data[] =
					[
						'bulan'			=> $post['bulan'][$key],
						'id_karyawan'	=> $post['id_karyawan'][$key],
						'id_jabatan'	=> $post['id_jabatan'][$key],
						'hadir'			=> $post['hadir'][$key],
						'sakit'			=> $post['sakit'][$key],
						'alpha'			=> $post['alpha'][$key],
						'telat'			=> $post['telat'][$key],
					];
				}
			}
			
		$this->m_kehadiran->insert_batch($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
          redirect('admin/kehadiran'); 

	}

	public function delete_kehadiran($id_kehadiran)
    {
        $data = array('id_kehadiran' => $id_kehadiran);

        $this->m_kehadiran->delete_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
        redirect('admin/kehadiran/index');
        

    }
}