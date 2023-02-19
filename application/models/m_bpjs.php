<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class m_bpjs extends CI_Model
    {
         // menampilkan seluruh data
        public function all_data()
        {          
            $this->db->select('*');
            $this->db->from('tb_bpjs');
            return $this->db->get()->result(); // menampilkan database           
        }

        //insert data
        public function insert_data($data)
        {
            $this->db->insert('tb_bpjs',$data);
        }

        // detail data
        public function detail_data($npp)
	    {
            $this->db->select('*');
            $this->db->from('tb_bpjs');
            $this->db->where('npp', $npp);
            return $this->db->get()->row(); // menampilkan database		
	    }

        // edit data
        public function update_data($data)
        {
            $this->db->where('npp', $data['npp']);
            $this->db->update('tb_bpjs', $data);
            
        }

        //hapus data
        public function delete_data($data)
        {
            $this->db->where('npp', $data['npp']);
            $this->db->delete('tb_bpjs', $data);
        }
    }

?>