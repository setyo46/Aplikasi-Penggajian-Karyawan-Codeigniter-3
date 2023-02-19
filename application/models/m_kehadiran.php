<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class m_kehadiran extends CI_Model
    {

       // menampilkan seluruh data
        public function all_data($bulantahun)
        {
            $this->db->select('*');
            $this->db->from('tb_kehadiran');
            $this->db->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_kehadiran.id_karyawan', 'left');
            $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_kehadiran.id_jabatan', 'left');
            $this->db->where('tb_kehadiran.bulan', $bulantahun );
            return $this->db->get()->result(); // menampilkan database

            
        }

        public function input_data($bulantahun)
        {            
            
            return $this->db->query("
            SELECT tb_karyawan.* , tb_jabatan.nama_jabatan FROM tb_karyawan 
			INNER JOIN tb_jabatan ON tb_karyawan.id_jabatan = tb_jabatan.id_jabatan 
			WHERE NOT EXISTS (SELECT * FROM tb_kehadiran 
            WHERE bulan = '$bulantahun' AND tb_karyawan.id_karyawan = tb_kehadiran.id_karyawan)")->result_array();

           
        }

        public function insert_batch($data)
        {
            
            $jumlahData = count($data);
            // var_dump($jumlahData); die;
            if($jumlahData > 0) {
                $this->db->insert_batch('tb_kehadiran', $data);
            }
           
        }

        public function delete_data($data)
        {
            $this->db->where('id_kehadiran', $data['id_kehadiran']);
            $this->db->delete('tb_kehadiran', $data);
        }

    }