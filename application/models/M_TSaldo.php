<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TSaldo extends CI_Model {

	public function transaksi_list(){
		$Man = $this->session->userdata('kd_Manager');
		$sql = $this->db->query("select id_withdrawal, tanggal, MR.id, MR.first_name, PL.nama, TW.jumlah, TW.status FROM transaksi_withdrawal AS TW, manager_register AS MR, penyedia_layanan AS PL WHERE MR.id = TW.id_manager AND TW.id_admin = PL.id_admin AND TW.id_manager = '$Man'");

		foreach($sql->result()as $row)
		{
			if($row->status=='1'){
				$row->status='Accepted';
			}
			else{
				$row->status='pending';
			}
		}

		return $sql;
	}

	public function transaksi_Pending(){
		$Man = $this->session->userdata('kd_Manager');
		$sql = $this->db->query("select id_withdrawal, tanggal, MR.id, MR.first_name, PL.nama, TW.jumlah, TW.status FROM transaksi_withdrawal AS TW, manager_register AS MR, penyedia_layanan AS PL WHERE MR.id = TW.id_manager AND TW.id_admin = PL.id_admin AND TW.id_manager = '$Man' AND TW.status = 0");

		return $sql;
	}

	public function ReportNow($kd_man){
		$sql = $this->db
					->query("
							SELECT 
								pt.id_pembelian as kode,
							    c.nama as customer,
							    b.nama_bioskop as bioskop,
							    pt.id_movie as film,
							    pt.tgl_beli as beli,
							    pt.tanggal_pemutaran,
							    jp.jam,
							    pt.jml_uang
							FROM
								customer as c,
							    jam_pemutaran as jp,
							    bioskop as b,
							    pembelian_tiket as pt
							WHERE
								
							    c.id_customer = pt.id_customer AND
							    jp.id_jadwal = pt.id_jadwal AND
							    b.id_bioskop = pt.id_bioskop AND
							    b.id_manager = '".$kd_man."' AND
							    DATE(tgl_beli) = DATE(NOW())
							");
		return $sql;
	}

	public function ReportAll($kd_man){
		$sql = $this->db
					->query("
							SELECT 
								pt.id_pembelian as kode,
							    c.nama as customer,
							    b.nama_bioskop as bioskop,
							    pt.id_movie as film,
							    pt.tgl_beli as beli,
							    pt.tanggal_pemutaran,
							    jp.jam,
							    pt.jml_uang
							FROM
								customer as c,
							    jam_pemutaran as jp,
							    bioskop as b,
							    pembelian_tiket as pt
							WHERE
								
							    c.id_customer = pt.id_customer AND
							    jp.id_jadwal = pt.id_jadwal AND
							    b.id_bioskop = pt.id_bioskop AND
							    b.id_manager = '".$kd_man."'
							");
		return $sql;
	}

	public function ReportMonth($kd_man){
		$sql = $this->db
					->query("
							SELECT 
								pt.id_pembelian as kode,
							    c.nama as customer,
							    b.nama_bioskop as bioskop,
							    pt.id_movie as film,
							    pt.tgl_beli as beli,
							    pt.tanggal_pemutaran,
							    jp.jam,
							    pt.jml_uang
							FROM
								customer as c,
							    jam_pemutaran as jp,
							    bioskop as b,
							    pembelian_tiket as pt
							WHERE
								
							    c.id_customer = pt.id_customer AND
							    jp.id_jadwal = pt.id_jadwal AND
							    b.id_bioskop = pt.id_bioskop AND
							    b.id_manager = '".$kd_man."' AND
								MONTH(tgl_beli) = MONTH(NOW());
							");
		return $sql;
	}

	public function ReportWeek($kd_man){
		$sql = $this->db
					->query("
							SELECT 
								pt.id_pembelian as kode,
							    c.nama as customer,
							    b.nama_bioskop as bioskop,
							    pt.id_movie as film,
							    pt.tgl_beli as beli,
							    pt.tanggal_pemutaran,
							    jp.jam,
							    pt.jml_uang
							FROM
								customer as c,
							    jam_pemutaran as jp,
							    bioskop as b,
							    pembelian_tiket as pt
							WHERE
								
							    c.id_customer = pt.id_customer AND
							    jp.id_jadwal = pt.id_jadwal AND
							    b.id_bioskop = pt.id_bioskop AND
							    b.id_manager = '".$kd_man."' AND
								WEEKOFYEAR(tgl_beli) = WEEKOFYEAR(NOW());
							");
		return $sql;
	}

	public function SUM($tabel,$where,$field){
		$this->db->select_sum($field);
		$this->db->where($where);
		$query = $this->db->get($tabel)->result();
		return $query[0]->$field;
	}


	public function shsaldo($where){
		$this->db->select('*');
		$this->db->from('transaksi_saldo');
		$this->db->where($where);
		$this->db->join('customer', 'customer.id_customer = transaksi_saldo.id_customer');
		$query = $this->db->get();

		return $query;
	}
	
}
