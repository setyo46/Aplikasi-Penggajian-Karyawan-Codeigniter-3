<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slipgaji extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gaji');
		$this->load->model('m_slipgaji');
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

		$data['judul'] = 'Cetak Slip Gaji';

		$data['karyawan'] 	= $this->m_karyawan->all_data();
		$data['potongan'] = $this->m_potongan->all_data();
		
        //load view tampil data
		$this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/laporan/v_slipgaji', $data);
        $this->load->view('template_admin/footer');
    }

	public function cetak_slipgaji()
    {

		$data['judul'] = 'Cetak Slip Gaji';

		if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}

		
		$nama = $this->input->post('nama_karyawan');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$bulantahun =$bulan.$tahun;
		
		$data['potongan'] = $this->m_potongan->all_data();
		$data['iuran_bpjs'] = $this->m_bpjs->all_data();
		$data['slip_gaji'] = $this->m_slipgaji->all_data($bulantahun, $nama);
        //load view tampil data
		
	
		$this->load->view('template_admin/header',$data);
        $this->load->view('admin/laporan/v_cetakslipgaji', $data);

    }


}