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
		$sql = $this->db->query("SELECT transaksi_withdrawal.id_withdrawal, 
									transaksi_withdrawal.tanggal, 
								    manager_register.id, 
								    manager_register.first_name, 
								    penyedia_layanan.nama, 
								    transaksi_withdrawal.jumlah, 
								    transaksi_withdrawal.status 
								FROM transaksi_withdrawal 
								JOIN manager_register ON transaksi_withdrawal.id_manager = manager_register.id
								JOIN penyedia_layanan ON transaksi_withdrawal.id_admin = penyedia_layanan.id_admin
								WHERE transaksi_withdrawal.status = 0 AND transaksi_withdrawal.id_admin='admin'
								");

		return $sql;
	}

	public function transaksi_History(){
		$sql = $this->db->query("SELECT transaksi_withdrawal.id_withdrawal, 
									transaksi_withdrawal.tanggal, 
								    manager_register.id, 
								    manager_register.first_name, 
								    penyedia_layanan.nama, 
								    transaksi_withdrawal.jumlah, 
								    transaksi_withdrawal.status 
								FROM transaksi_withdrawal 
								JOIN manager_register ON transaksi_withdrawal.id_manager = manager_register.id
								JOIN penyedia_layanan ON transaksi_withdrawal.id_admin = penyedia_layanan.id_admin
								WHERE transaksi_withdrawal.id_admin='admin'
								");

		return $sql;
	}

	public function ReportNow($kd_man){
		$sql = $this->db
					->query("
						SELECT customer.nama as customer, 
							jadwal.id_jadwal as kode, 
						    movie_new.Title as title, 
						    bioskop.nama_bioskop as bioskop, 
						    pembelian_tiket.tgl_beli as tgl_beli, 
						    jadwal.jam as jam, 
						    pembelian_tiket.id_kursi as id_kursi,
						    pembelian_tiket.jml_uang as uang
						FROM pembelian_tiket 
						    JOIN jadwal ON jadwal.id_jadwal = pembelian_tiket.id_jadwal
						    JOIN movie_new ON jadwal.id_movie = movie_new.id_movie
						    JOIN bioskop ON bioskop.id_bioskop = pembelian_tiket.id_bioskop
						    JOIN customer ON customer.id_customer = pembelian_tiket.id_customer
						WHERE bioskop.id_manager = '".$kd_man."' AND
							DATE(pembelian_tiket.tgl_beli) = DATE(NOW())
							");
		return $sql;
	}

	public function ReportAll($kd_man){
		$sql = $this->db
					->query("
						SELECT customer.nama as customer, 
							jadwal.id_jadwal as kode, 
						    movie_new.Title as title, 
						    bioskop.nama_bioskop as bioskop, 
						    pembelian_tiket.tgl_beli as tgl_beli, 
						    jadwal.jam as jam, 
						    pembelian_tiket.id_kursi as id_kursi,
						    pembelian_tiket.jml_uang as uang
						FROM pembelian_tiket 
						    JOIN jadwal ON jadwal.id_jadwal = pembelian_tiket.id_jadwal
						    JOIN movie_new ON jadwal.id_movie = movie_new.id_movie
						    JOIN bioskop ON bioskop.id_bioskop = pembelian_tiket.id_bioskop
						    JOIN customer ON customer.id_customer = pembelian_tiket.id_customer
						WHERE bioskop.id_manager = '".$kd_man."'
							");
		return $sql;
	}

	public function ReportMonth($kd_man){
		$sql = $this->db
					->query("
						SELECT customer.nama as customer, 
							jadwal.id_jadwal as kode, 
						    movie_new.Title as title, 
						    bioskop.nama_bioskop as bioskop, 
						    pembelian_tiket.tgl_beli as tgl_beli, 
						    jadwal.jam as jam, 
						    pembelian_tiket.id_kursi as id_kursi,
						    pembelian_tiket.jml_uang as uang
						FROM pembelian_tiket 
						    JOIN jadwal ON jadwal.id_jadwal = pembelian_tiket.id_jadwal
						    JOIN movie_new ON jadwal.id_movie = movie_new.id_movie
						    JOIN bioskop ON bioskop.id_bioskop = pembelian_tiket.id_bioskop
						    JOIN customer ON customer.id_customer = pembelian_tiket.id_customer
						WHERE bioskop.id_manager = '".$kd_man."' AND
								MONTH(tgl_beli) = MONTH(NOW());
							");
		return $sql;
	}

	public function SUM($tabel,$where,$field){
		$this->db->select_sum($field);
		$this->db->where($where);
		$query = $this->db->get($tabel)->result();
		return $query[0]->$field;
	}

	public function getSaldo($id)
	{
		$this->db->select('saldo');
		$this->db->from('manager_register');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query;

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
