<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_movie extends CI_Model {

	public function get_tabel($tabel){
		$a = $this->db->get($tabel);
		return $a;
	}

	public function get_enum($post){
		$a="";
		foreach($this->input->post($post) as $day){
		$a .= $day.',';
		}
		return $a;
	}

	public function get_movie($kode_bioskop){
		$query = $this->db->query("SELECT jadwal.id_jadwal, movie_new.Title, jadwal.jam, jadwal.type_theater, jadwal.kuota, jadwal.tgl_mulai, jadwal.tgl_selesai FROM jadwal INNER JOIN movie_new ON jadwal.id_movie = movie_new.id_movie WHERE jadwal.id_bioskop = '$kode_bioskop'");
		return $query;
	}

	public function getTikectNow($kode_bioskop)
	{
		$query = $this->db->query("SELECT SUM(`kursi`) As Kursi FROM `pembelian_tiket` WHERE `id_bioskop`= '".$kode_bioskop."' AND DATE(pembelian_tiket.tgl_beli) = DATE(NOW())");
		return $query;
	}

	public function getTikectMonth($kode_bioskop)
	{
		$query = $this->db->query("SELECT SUM(`kursi`) As Kursi FROM `pembelian_tiket` WHERE `id_bioskop`= '".$kode_bioskop."' AND MONTH(pembelian_tiket.tgl_beli) = MONTH(NOW())");
		return $query;
	}

	public function getTikectA($kode_bioskop)
	{
		$query = $this->db->query("SELECT SUM(`kursi`) As Kursi FROM `pembelian_tiket` WHERE `id_bioskop`= '".$kode_bioskop."'");
		return $query;
	}

	public function getFilm()
	{
		return $this->db->get('movie_new')->result();

	}
	public function first_value_where($field,$field_kondisi1,$field_kondisi2,$tabel){
		$id = $this -> db
	       -> select($field)
	       -> where($field_kondisi1, $field_kondisi2)
	       -> limit(1)
	       -> get($tabel)
	       -> result_array()[0][$field];

	       return $id;
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($id){
		$this->db->where('id_jadwal', $id);
		return $this->db->get('jadwal')->result();
	}

	public function edit_dataManager($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('manager_register')->result();
	}

	public function edit_dataJam($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function buat_kode($field,$tabelmu,$kod,$kondisi)
	{
		$this->db->select('RIGHT('.$field.',3) as kode', FALSE);
		$this->db->order_by($field,'DESC');
		$this->db->limit(1);
		$this->db->where($kondisi);

		$query = $this->db->get($tabelmu);
		//cek dulu apakah ada sudah ada kode di tabel.
		if($query->num_rows() <> 0){
		//jika kode ternyata sudah ada.
		$data = $query->row();
		$kode = intval($data->kode) + 1;
		}else{
		//jika kode belum ada
		$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = $kod.$kodemax;
		return $kodejadi;
	}

	public function get_movieku($idbioskopmu){
		$query = $this
                ->db
                ->where('id_bioskop', $idbioskopmu)
                ->get('movie');

     $data = array();

     foreach ($query->result() as $row)
     {
         $data = $row->nama_film;
     }
     return $data;
	}

	public function clean($string) {
   		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   		return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
   	}

   	public function getHarga($condition)
   	{
   		$query = $this->db->get_where('harga', array('id_bioskop' => $condition,'status' => '0'))->result();
   		return $query;
   	}
   	public function getRiwayatHarga($condition)
   	{
   		$this->db->where(array('id_bioskop' => $condition,'status' => '1'));
   		$this->db->order_by("waktu", "asc");
   		$query = $this->db->get('harga')->result();
   		return $query;
   	}
}
