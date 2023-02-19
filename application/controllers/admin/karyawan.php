<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan');
        $this->load->model('m_bpjs');
        $this->load->model('m_jabatan');
        $this->load->model('m_hak_akses');

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
            
        $data['judul'] = "Data Karyawan";
        $data['karyawan'] = $this->m_karyawan->all_data();
        // $data['jabatan'] = $this->m_jabatan->all_data();
    
        //load view tampil data
        $this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/karyawan/v_karyawan', $data);
		$this->load->view('template_admin/footer');
    }

    // load tambah data
    public function input_karyawan()
    {
        $data['judul'] = 'Input Karyawan';   
        $data['jabatan'] = $this->m_jabatan->all_data();
        $data['hakakses'] = $this->m_hak_akses->all_data();
        $data['bpjs'] = $this->m_bpjs->all_data();

        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/karyawan/v_inputkaryawan', $data);
        $this->load->view('template_admin/footer');

    }

    public function input_karyawan_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
			$this->input_karyawan();
            // jika validasi form gagal atau tidak lolos validasi
        } else {
            //jika lolos validasi
            $data = array(
               
                'nik'              => $this->input->post('nik'), 
                'nama_karyawan'    => $this->input->post('nama_karyawan'),
                'username'         => $this->input->post('username'),  
                'password'		   => md5($this->input->post('password')),
                'id_jabatan'       => $this->input->post('id_jabatan'), 
                'masa_kerja'       => $this->input->post('masa_kerja'),
                'id_hak_akses'     => $this->input->post('id_hak_akses'),
                'npp'              => $this->input->post('npp'),
                'photo'            => $this->input->post('photo'),
                'email'            => $this->input->post('email'),
                                                   
                );
                
            $this->m_karyawan->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
        </div>');
        redirect('admin/karyawan/index');              
        }   

    }

    public function update_karyawan($id_karyawan)
    {
        $data['judul']  = 'Edit Data Karyawan';
        $data['karyawan']   = $this->m_karyawan->detail_data($id_karyawan);
        $data['jabatan']  = $this->m_jabatan->all_data(); // relasi
        $data['hakakses']  = $this->m_hak_akses->all_data();
        $data['bpjs'] = $this->m_bpjs->all_data();
 
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/karyawan/v_updatekaryawan', $data);
        $this->load->view('template_admin/footer');
              
            
    }

    public function update_karyawan_aksi($id_karyawan)
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
		    $this->update_karyawan($id_karyawan);
        // jika validasi form gagal atau tidak lolos validasi  
        } else {
            //jika lolos validasi
            $data = array(

                'id_karyawan'       =>  $id_karyawan, 
                'nik'              => $this->input->post('nik'),
                'nama_karyawan'    => $this->input->post('nama_karyawan'), 
                'username'         => $this->input->post('username'),             
                'id_jabatan'      => $this->input->post('id_jabatan'), 
                'masa_kerja'       => $this->input->post('masa_kerja'),
                'id_hak_akses'      => $this->input->post('id_hak_akses'),
                'npp'              => $this->input->post('npp'),
                'photo'            => $this->input->post('photo'),
                'email'            => $this->input->post('email'),
                                                
            );               
            $this->m_karyawan->update_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate !!!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/karyawan/index');   
        }
    }

    public function delete_karyawan($id_karyawan)
    {
        $data = array('id_karyawan' => $id_karyawan);

        $this->m_karyawan->delete_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data berhasil dihapus!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
        redirect('admin/karyawan/index');
        

    }
    
    public function _rules()
    {
         // form validasi
         $this->form_validation->set_rules('nik','NIK','required',['required' =>'%s Harus Diisi']);
         $this->form_validation->set_rules('nama_karyawan','nama karyawan','required',['required' =>'%s Harus Diisi']);
         $this->form_validation->set_rules('username','username','required',['required' =>'%s Harus Diisi']);
         $this->form_validation->set_rules('id_jabatan','jabatan','required',['required' =>'%s Harus Diisi']);
         $this->form_validation->set_rules('masa_kerja','masa kerja','required',['required' =>'%s Harus Diisi']);
         $this->form_validation->set_rules('id_hak_akses','keterangan hak akses','required',['required' =>'%s Harus Diisi']);
         $this->form_validation->set_rules('npp','npp bpjs','required',['required' =>'%s Harus Diisi']);
         $this->form_validation->set_rules('photo','photo','required');
    }


}

