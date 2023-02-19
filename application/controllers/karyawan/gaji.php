<?php 
    class Gaji extends CI_Controller{
        public function  __construct()
        {
            parent::__construct();
            $this->load->model('m_potongan');
            $this->load->model('m_bpjs');

            if($this->session->userdata('hak_akses') !='3') {
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
            $data['judul'] = "Data Gaji";
            $data['potongan'] = $this->m_potongan->all_data();
            $data['iuran_bpjs'] = $this->m_bpjs->all_data();

            $id_karyawan = $this->session->userdata('id_karyawan');
            $data['gaji'] = $this->db->query("SELECT tb_karyawan.nama_karyawan, tb_karyawan.nik, 
            tb_jabatan.gaji_dasar, tb_jabatan.tj_dasar, tb_jabatan.tj_jabatan, tb_jabatan.tj_operasional,
            tb_jabatan.tj_biaya_perumahan,tb_bpjs.total_tagihan,tb_bpjs.iuran_perusahaan,    
            tb_kehadiran.alpha, tb_kehadiran.telat, tb_kehadiran.bulan, tb_kehadiran.id_kehadiran
            FROM tb_karyawan
            INNER JOIN tb_kehadiran ON tb_kehadiran.id_karyawan=tb_karyawan.id_karyawan
            INNER JOIN tb_bpjs      ON tb_bpjs.npp=tb_karyawan.npp
            INNER JOIN tb_jabatan   ON tb_jabatan.id_jabatan=tb_karyawan.id_jabatan
            WHERE tb_kehadiran.id_karyawan='$id_karyawan'
            ORDER BY tb_kehadiran.bulan ASC")->result();

            // var_dump($data['gaji']);
            // die();
          
            $this->load->view('template_karyawan/header', $data);
            $this->load->view('template_karyawan/sidebar');
            $this->load->view('karyawan/v_datagaji', $data);
            $this->load->view('template_karyawan/footer');


        }
        public function cetak_slip($id){
            $data['judul'] = "Cetak Slip Gaji";
            $data['potongan'] = $this->m_potongan->all_data();
                        
            $data['slip_gaji'] = $this->db->query
            ("SELECT tb_karyawan.nik, tb_karyawan.nama_karyawan, tb_jabatan.nama_jabatan, 
            tb_jabatan.gaji_dasar, tb_jabatan.tj_dasar, tb_jabatan.tj_jabatan, tb_jabatan.tj_operasional,
            tb_jabatan.tj_biaya_perumahan,tb_bpjs.total_tagihan,tb_bpjs.iuran_perusahaan,  
            tb_kehadiran.alpha, tb_kehadiran.telat, tb_kehadiran.bulan
            FROM tb_karyawan
            INNER JOIN tb_kehadiran ON tb_kehadiran.id_karyawan=tb_karyawan.id_karyawan
            INNER JOIN tb_bpjs ON tb_bpjs.npp=tb_karyawan.npp
            INNER JOIN tb_jabatan ON tb_jabatan.id_jabatan=tb_karyawan.id_jabatan
            WHERE tb_kehadiran.id_kehadiran='$id'")->result();
          
            $this->load->view('template_karyawan/header', $data);
            $this->load->view('karyawan/v_cetakslipgaji', $data); 
        }
    }
?>