<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

function Sign($Nama,$password){
			
			$condition = "id_admin = '" . $Nama . "' and password ='" . $password . "' ";
			$this->db->select('*');
			$this->db->from('penyedia_layanan');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
			return true;
			} else {
			return false;
			}
		}


public function pantaubioskop(){
		$this->db->select('*');
		$this->db->from('bioskop');
		$this->db->join('manager_register', 'bioskop.id_manager = manager_register.id');
		$query = $this->db->get();

		return $query;
	}
}
