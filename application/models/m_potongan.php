<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class m_potongan extends CI_Model
    {

       // menampilkan seluruh data
        public function all_data()
        {
            $this->db->select('*');
            $this->db->from('tb_potongan_gaji');
            //$this->db->join('tb_jabatan', 'tb_jabatan.id_jabatan = tb_potongan_gaji.id_jabatan', 'left');
            return $this->db->get()->result(); // menampilkan database
            
        }
        
        //insert data
        public function insert_data($data)
        {
            $this->db->insert('tb_potongan_gaji',$data);
        }

        //detail data
        public function detail_data($id_potongan)
	    {
            $this->db->select('*');
            $this->db->from('tb_potongan_gaji');
            $this->db->where('id_potongan', $id_potongan);
            return $this->db->get()->row(); // menampilkan database		
	    }

        // edit data
        public function update_data($data)
        {
            $this->db->where('id_potongan', $data['id_potongan']);
            $this->db->update('tb_potongan_gaji', $data);
        }

        //hapus data
        public function delete_data($data)
        {
            $this->db->where('id_potongan', $data['id_potongan']);
            $this->db->delete('tb_potongan_gaji', $data);
        }
    }

?>