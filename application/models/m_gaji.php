<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class m_gaji extends CI_Model
    {

        // menampilkan seluruh data
        public function all_data($bulantahun)
        {
            $this->db->select('*');
            $this->db->from('tb_gaji');
            $this->db->join('tb_karyawan', 'tb_karyawan.id_karyawan = tb_gaji.id_karyawan', 'left');
            $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_gaji.id_jabatan', 'left');
            $this->db->join('tb_kehadiran', 'tb_kehadiran.id_kehadiran = tb_gaji.id_kehadiran', 'left');
            $this->db->join('tb_bpjs', 'tb_bpjs.npp = tb_karyawan.npp', 'left');
            $this->db->where('tb_gaji.bulan', $bulantahun );
            return $this->db->get()->result(); // menampilkan database

        }

        public function input_data($bulantahun)
        {            
            
            return $this->db->query("
            SELECT tb_kehadiran.* , tb_karyawan.nama_karyawan, tb_karyawan.nik, tb_jabatan.nama_jabatan, 
            tb_jabatan.gaji_dasar, tb_jabatan.tj_dasar, tb_jabatan.tj_jabatan, tb_jabatan.tj_operasional, 
            tb_jabatan.tj_biaya_perumahan, bulan  
            FROM tb_kehadiran
            INNER JOIN tb_jabatan ON tb_kehadiran.id_jabatan = tb_jabatan.id_jabatan
            INNER JOIN tb_karyawan ON tb_kehadiran.id_karyawan = tb_karyawan.id_karyawan
			WHERE NOT EXISTS (SELECT * FROM tb_gaji
            WHERE bulan = '$bulantahun' AND tb_kehadiran.id_kehadiran = tb_gaji.id_kehadiran)")->result_array();

        }
        public function insert_batch($data)
        {
            
            $jumlahData = count($data);
            // var_dump($jumlahData); die;
            if($jumlahData > 0) {
                $this->db->insert_batch('tb_gaji', $data);
            }
           
        }

        public function delete_data($data)
        {
            $this->db->where('id_gaji', $data['id_gaji']);
            $this->db->delete('tb_gaji', $data);
        }



    }