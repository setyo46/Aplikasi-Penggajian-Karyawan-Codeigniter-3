<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporangaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gaji');
		$this->load->model('m_karyawan');
		$this->load->model('m_bpjs');
		$this->load->model('m_kehadiran');
		$this->load->model('m_potongan');

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
		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}

		
		$data['gaji'] 	= $this->m_gaji->all_data($bulantahun);
		$data['potongan'] = $this->m_potongan->all_data();
	
		$data['judul'] = 'Laporan Data Gaji';
		
        //load view tampil data
		$this->load->view('template_manager/header',$data);
        $this->load->view('template_manager/sidebar');
        $this->load->view('manager/laporan/v_laporangaji', $data);
        $this->load->view('template_manager/footer');
    }

	public function cetak_laporan_gaji()
    {
		$data['judul'] = 'Cetak Laporan Gaji';

		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}


		$data['cetakgaji'] = $this->m_gaji->all_data($bulantahun);
		$data['potongan'] = $this->m_potongan->all_data();
	
        //load view tampil data
		$this->load->view('template_manager/header',$data);
        $this->load->view('manager/laporan/v_cetaklaporangaji', $data);

    }


}