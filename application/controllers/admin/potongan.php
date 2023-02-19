<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class potongan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
        
        $data = [
            'judul' => "Data Potongan Gaji",
            'potongan' => $this->m_potongan->all_data(),
        ];

        //load view tampil data
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/potongan/v_potongangaji', $data);
        $this->load->view('template_admin/footer');
        
    }

    // load tambah data
    public function input_potongan()
    {
        // form validasi
        $this->form_validation->set_rules('potongan','Jenis Potongan','required');
        $this->form_validation->set_rules('jumlah_potongan','Jumlah Potongan','required');


        if ($this->form_validation->run() == FALSE) {
        // jika validasi form gagal atau tidak lolos validasi  

            $data = array(
                'judul' => 'Tambah Data Potongan Gaji',
            );
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/potongan/v_inputpotongangaji', $data);
            $this->load->view('template_admin/footer');

        } else {
            //jika lolos validasi
            $data = array(
                'potongan'        => $this->input->post('potongan'), 
                'jumlah_potongan' => $this->input->post('jumlah_potongan'), 
                                                       
                );
                
            $this->m_potongan->insert_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
          redirect('admin/potongan/index');             
        }            
    }

    public function update_potongan($id_potongan)
    {
        // form validasi
        $this->form_validation->set_rules('potongan','Jenis Potongan','required');
        $this->form_validation->set_rules('jumlah_potongan','Jumlah Potongan','required');

        if ($this->form_validation->run() == FALSE) {
            // jika validasi form gagal atau tidak lolos validasi  
        $data = array(
            'judul'     => 'Edit Data Potongan Gaji',
            'potongan'   => $this->m_potongan->detail_data($id_potongan),
        );
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/potongan/v_updatepotongangaji', $data);
        $this->load->view('template_admin/footer');

        } else {
            //jika lolos validasi
            $data = array(
                'id_potongan'          => $id_potongan,
                'potongan'             => $this->input->post('potongan'), 
                'jumlah_potongan'      => $this->input->post('jumlah_potongan'), 
                                                  
            );               
            $this->m_potongan->update_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate !!!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          </div>');
          redirect('admin/potongan/index');             
        }      
    }

    public function delete_potongan($id_potongan)
    {
        $data = array('id_potongan' => $id_potongan);

        $this->m_potongan->delete_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data berhasil dihapus!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin/potongan/index');
        

    }

    


}

