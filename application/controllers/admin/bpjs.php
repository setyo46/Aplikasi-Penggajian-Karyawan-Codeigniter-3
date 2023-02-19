<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpjs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bpjs');

        if($this->session->userdata('hak_akses') !='1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum login!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('login');
        }
    }

    // menampilkan data
    public function index()
    {
            
        $data['judul'] = "Data BPJS";
        $data['bpjs'] = $this->m_bpjs->all_data();

        //load view tampil data
        $this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/bpjs/v_bpjs', $data);
		$this->load->view('template_admin/footer');
    }

    // load tambah data
    public function input_bpjs()
    {
        $data['judul'] = 'Input BPJS'; 
        
       
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/bpjs/v_inputbpjs', $data);
        $this->load->view('template_admin/footer');
                   
        
    }

    public function input_bpjs_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
			$this->input_bpjs();
            // jika validasi form gagal atau tidak lolos validasi
        } else {
            //jika lolos validasi
            $data = array(
                
                'npp'               => $this->input->post('npp'),
                'kelas'             => $this->input->post('kelas'),
                'total_tagihan'     => $this->input->post('total_tagihan'),
                'iuran_perusahaan'  => $this->input->post('iuran_perusahaan'),
                                                    
                );
                
            $this->m_bpjs->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
        </div>');
        redirect('admin/bpjs/index');             
        }   

    }

    public function update_bpjs($npp)
    {       
        $data['judul'] = 'Update  ';    
        $data['bpjs'] = $this->m_bpjs->detail_data($npp);    
        
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/bpjs/v_updatebpjs', $data);
        $this->load->view('template_admin/footer');          
    }

    public function update_bpjs_aksi($npp)
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
			$this->update_bpjs($npp);
        } else {
            //jika lolos validasi

            $data = array (
                
                'npp'               => $this->input->post('npp'),
                'kelas'             => $this->input->post('kelas'),
                'total_tagihan'     => $this->input->post('total_tagihan'),
                'iuran_perusahaan'  => $this->input->post('iuran_perusahaan'),
            );
                                
            $this->m_bpjs->update_data($data);
        
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate !!!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
          redirect('admin/bpjs/index');             
        }  
    }

    public function delete_bpjs($npp)
    {
        $data = array('npp' => $npp);

        $this->m_bpjs->delete_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/bpjs/index');
        
    }

    public function _rules()
    {
        // form validasi
        $this->form_validation->set_rules('npp','npp','required');
        $this->form_validation->set_rules('kelas','kelas','required');
        $this->form_validation->set_rules('total_tagihan','total tagihan','required');
        $this->form_validation->set_rules('iuran_perusahaan','iuran perusahaan','required');
    }


}

