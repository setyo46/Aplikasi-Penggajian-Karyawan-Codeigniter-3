<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class m_slipgaji extends CI_Model
    {

        public function all_data($bulantahun, $nama)
        {
            $this->db->select('*');
            $this->db->from('tb_kehadiran');
            $this->db->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_kehadiran.id_karyawan', 'left');
            $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_kehadiran.id_jabatan', 'left');
            $this->db->join('tb_bpjs', 'tb_bpjs.npp = tb_karyawan.npp', 'left');
            $this->db->where('tb_kehadiran.bulan', $bulantahun);
            $this->db->where('tb_karyawan.nama_karyawan', $nama);
            return $this->db->get()->result(); // menampilkan database
            
        }


    }