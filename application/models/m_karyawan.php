<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class m_karyawan extends CI_Model
    {       
       // menampilkan seluruh data
        public function all_data()
        {
            $this->db->select('*');
            $this->db->from('tb_karyawan');           
            $this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_karyawan.id_jabatan', 'left');
            $this->db->join('tb_hak_akses', 'tb_hak_akses.id_hak_akses = tb_karyawan.id_hak_akses', 'left');
            $this->db->join('tb_bpjs', 'tb_bpjs.npp = tb_karyawan.npp', 'left');
            return $this->db->get()->result();
            //  menampilkan database
            
        }
        
        //insert data
        public function insert_data($data)
        {
            $this->db->insert('tb_karyawan',$data);
        }

        //detail data
        public function detail_data($id_karyawan)
	    {
            $this->db->select('*');
            $this->db->from('tb_karyawan');
            $this->db->where('id_karyawan', $id_karyawan);
            return $this->db->get()->row(); // menampilkan database		
	    }

        // edit data
        public function update_data($data)
        {
            $this->db->where('id_karyawan', $data['id_karyawan']);
            $this->db->update('tb_karyawan', $data);
        }

        //hapus data
        public function delete_data($data)
        {
            $this->db->where('id_karyawan', $data['id_karyawan']);
            $this->db->delete('tb_karyawan', $data);
        }

        public function update_password($data){
            // $this->db->where('id_karyawan');
            $this->db->update('tb_karyawan', $data);
        }
    }

?>