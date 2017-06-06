<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Movie extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('user');
    }

    public function tambahkan(){

		$data = array(
					'id_jadwal'		=>	$this->input->post('id_jadwal'),
					'id_movie'		=>	$this->input->post('id_movie'),
					'id_bioskop'	=>	$this->input->post('id_bioskop'),
					'jam'			=> 	$this->input->post('jam'),
					'type_theater'	=> 	$this->input->post('type_theater'),
					'kuota'			=> 	$this->input->post('kuota'),
					'tgl_mulai'		=> 	$this->input->post('tgl_mulai'),
					'tgl_selesai'	=> 	$this->input->post('tgl_selesai'),
					'harga'			=>	$this->M_movie->clean($this->input->post('harga')),
					'status_tayang' 		=> 	"belum");


		$this->db->trans_start();
		$this->db->insert('jadwal',$data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
               return "Query Failed";
           } else {
               echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Manager/tambah_movie') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Success!</strong> Data Sudah masuk !!
			    </div>');
			    redirect('Manager/tambah_movie');
           }
    	

	}


	public function delete($id)
	{
		$this->db->trans_start();
		$where = array('id_movie' => $id);
		$this->M_movie->hapus_data($where,'movie');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
               return "Query Failed";
           } else {
           	echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Manager/tambah_movie') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Success!</strong> Data Dihapus !!
			    </div>');
			    redirect('Manager/tambah_movie');
           }
		
	}

	public function edit($id){
		$data['data_edit']=$this->M_movie->edit_data($id);
		$data['film'] = $this->M_movie->getFilm('');
		/*$where = array('id_movie' => $id);
		$data['data_edit'] = $this->M_movie->edit_data($where,'jadwal')->result();
		$kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop');
		*/
        /*$data['movie_list'] = $this->M_movie->get_movie($kode_bioskop);
		$data['bioskop'] = $this->db->get('bioskop');
		$data['jadwal'] = $this->db->get('jam_pemutaran');
		$data['qry'] = $this->db->last_query();*/
		$this->load->view('Manager/movieedit',$data);
	}

	public	function update(){
		$update = array(
					'id_jadwal'		=>	$this->input->post('id_jadwal'),
					'id_movie'		=>	$this->input->post('id_movie'),
					'id_bioskop'	=>	$this->input->post('id_bioskop'),
					'jam'			=> 	$this->input->post('jam'),
					'type_theater'	=> 	$this->input->post('type_theater'),
					'kuota'			=> 	$this->input->post('kuota'),
					'tgl_mulai'		=> 	$this->input->post('tgl_mulai'),
					'tgl_selesai'	=> 	$this->input->post('tgl_selesai'),
					'harga'			=>	$this->M_movie->clean($this->input->post('harga')),
					'status_tayang' 		=> 	"belum");


		$this->db->trans_start();
		$this->db->update('jadwal',$update,array('id_jadwal'=>$update['id_jadwal']));
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
               return "Query Failed";
           } else {
           	echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Manager/tambah_movie') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Success!</strong> Berhasil Diperbarui !!
			    </div>');
			    redirect('Manager/tambah_movie');
           }
	}
	
	public function tayang(){
		$kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop');

		$where = array('id_bioskop' => $kode_bioskop);
		
		$data['jam'] = $this->M_movie->edit_dataJam($where,'jam_pemutaran');
		$this->load->view('Manager/JamTayang',$data);
	}

	public function TimeAdd(){

		$data = array('id_jadwal'=> $this->CGenerate(),
					'id_bioskop'=> $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop'),
					'jam'=> date("H:i", strtotime($this->input->post('jam')))
					);


		$this->db->trans_start();
		$this->db->insert('jam_pemutaran',$data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
            echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-danger">
		 		<a href="'. base_url('Movie/tayang') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Gagal!</strong> Query Failed(Koneksi Buruk) !!
			    </div>');
           } else {
           	echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Movie/tayang') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Berhasil!</strong> Data Ditambah
			    </div>');
           }

        redirect('Movie/tayang');
	}

	private function CGenerate(){
    $kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop');
    $kondisi = array('id_bioskop' => $kode_bioskop);
    $kode = $this->M_movie->buat_kode('id_jadwal','jam_pemutaran',$kode_bioskop.'WKT',$kondisi);

     return $kode;
    }

	public function TimeEdit(){

		$id = $_GET['id'];
		$update = array('jam'=> date("H:i", strtotime($this->input->post('jam'))),
					'id_jadwal'=>$this->M_other->dec($id));

		$this->db->trans_start();
		$this->db->update('jam_pemutaran',$update,array('id_jadwal'=>$update['id_jadwal']));
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
            echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-danger">
		 		<a href="'. base_url('Movie/tayang') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Gagal!</strong> Data Gagal Dirubah, Periksa Koneksi !!
			    </div>');
           } else {
           	echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Movie/tayang') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Success!</strong> Data Telah Berubah
			    </div>');
           }

        redirect('Movie/tayang');
	}
 }