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

	public function getReportNow()
	{
	
		$query = $this->db->query('SELECT SUM(`biaya_layanan`) as Total FROM biaya_layanan WHERE DATE(biaya_layanan.tgl_beli) = DATE(NOW())');
		return $query;
	}

	public function getReportM()
	{
	
		$query = $this->db->query('SELECT SUM(`biaya_layanan`) as Total FROM biaya_layanan WHERE MONTH(biaya_layanan.tgl_beli) = MONTH(NOW())');
		return $query;
	}

	public function getReportA()
	{
	
		$query = $this->db->query('SELECT SUM(`biaya_layanan`) as Total FROM biaya_layanan');
		return $query;
	}
}
