<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class m_jabatan extends CI_Model
    {
         // menampilkan seluruh data
        public function all_data()
        {          
            $this->db->select('*');
            $this->db->from('tb_jabatan');
            return $this->db->get()->result(); // menampilkan database           
        }

        //insert data
        public function insert_data($data)
        {
            $this->db->insert('tb_jabatan',$data);
        }

        // detail data
        public function detail_data($id_jabatan)
	    {
            $this->db->select('*');
            $this->db->from('tb_jabatan');
            $this->db->where('id_jabatan', $id_jabatan);
            return $this->db->get()->row(); // menampilkan database		
	    }

        // edit data
        public function update_data($data)
        {
            $this->db->where('id_jabatan', $data['id_jabatan']);
            $this->db->update('tb_jabatan', $data);
            
        }

        //hapus data
        public function delete_data($data)
        {
            $this->db->where('id_jabatan', $data['id_jabatan']);
            $this->db->delete('tb_jabatan', $data);
        }
    }

?>