<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jabatan');

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
            
        $data['judul'] = "Data Jabatan";
        $data['jabatan'] = $this->m_jabatan->all_data();

        //load view tampil data
        $this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/jabatan/v_jabatan', $data);
		$this->load->view('template_admin/footer');
    }

    // load tambah data
    public function input_jabatan()
    {
        $data['judul'] = 'Input Jabatan'; 
        
       
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jabatan/v_inputjabatan', $data);
        $this->load->view('template_admin/footer');
                   
        
    }

    public function input_jabatan_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
			$this->input_jabatan();
            // jika validasi form gagal atau tidak lolos validasi
        } else {
            //jika lolos validasi
            $data = array(
                
                'id_jabatan'          => $this->input->post('id_jabatan'), 
                'nama_jabatan'        => $this->input->post('nama_jabatan'), 
                'gaji_dasar'          => $this->input->post('gaji_dasar'), 
                'tj_dasar'            => $this->input->post('tj_dasar'), 
                'tj_jabatan'          => $this->input->post('tj_jabatan'),
                'tj_operasional'      => $this->input->post('tj_operasional'),
                'tj_biaya_perumahan'  => $this->input->post('tj_biaya_perumahan'),
                                                    
                );
                
            $this->m_jabatan->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
        </div>');
        redirect('admin/jabatan/index');             
        }   

    }

    public function update_jabatan($id_jabatan)
    {       
        $data['judul'] = 'Update  ';    
        $data['jabatan'] = $this->m_jabatan->detail_data($id_jabatan);    
        
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jabatan/v_updatejabatan', $data);
        $this->load->view('template_admin/footer');          
    }

    public function update_jabatan_aksi($id_jabatan)
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE) {
			$this->update_jabatan($id_jabatan);
        } else {
            //jika lolos validasi

            $data = array (
                
                'id_jabatan'          => $this->input->post('id_jabatan'), 
                'nama_jabatan'        => $this->input->post('nama_jabatan'), 
                'gaji_dasar'          => $this->input->post('gaji_dasar'), 
                'tj_dasar'            => $this->input->post('tj_dasar'), 
                'tj_jabatan'          => $this->input->post('tj_jabatan'),
                'tj_operasional'      => $this->input->post('tj_operasional'),
                'tj_biaya_perumahan'  => $this->input->post('tj_biaya_perumahan'),
            );
                                
            $this->m_jabatan->update_data($data);
        
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate !!!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
          redirect('admin/jabatan/index');             
        }  
    }


    public function delete_jabatan($id_jabatan)
    {
        $data = array('id_jabatan' => $id_jabatan);

        $this->m_jabatan->delete_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/jabatan/index');
        
    }

    public function _rules()
    {
        // form validasi
        $this->form_validation->set_rules('id_jabatan','id jabatan','required');
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
        $this->form_validation->set_rules('gaji_dasar','gaji dasar','required');
        $this->form_validation->set_rules('tj_dasar','tunjangan dasar','required');
        $this->form_validation->set_rules('tj_jabatan','tunjangan jabatan','required');
        $this->form_validation->set_rules('tj_operasional','tunjangan operasioanal','required');
        $this->form_validation->set_rules('tj_biaya_perumahan','tunjangan biaya perumahan','required');
    }


}

