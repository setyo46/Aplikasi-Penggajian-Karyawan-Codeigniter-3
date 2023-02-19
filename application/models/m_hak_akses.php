<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class m_hak_akses extends CI_Model
    {

       // menampilkan seluruh data
        public function all_data()
        {
            $this->db->select('*');
            $this->db->from('tb_hak_akses');
            return $this->db->get()->result(); // menampilkan database
            
        }

        public function cek_login()
		{
			$username = set_value('username');
			$password = set_value('password');

			$result = $this->db->where('username',$username)
								->where('password',md5($password))
								->limit(1)
								->get('tb_karyawan');
			if($result->num_rows()>0){
				return $result->row();
			}else{
				return FALSE;
			}
		}
		
    }