<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StartUp extends CI_Controller {

	public function insbioskop(){
			$data=$this->input->post();
			
			$this->db->trans_start();
			$this->db->insert('bioskop',$data);
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
	               return "Query Failed";
	           } else {
	               echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
			 		<a href="'. base_url('Manager/tambah_movie') .'" class="close" data-dismiss="alert">&times;</a>
			  	    <strong>Success!</strong> Data Sudah masuk !!
				    </div>');
				    redirect('Manager/Welcome');
	        }
	}

	public function UpdateAkun(){
		$kd_man = $this->session->userdata('kd_Manager');
		$update = array('email'=>$this->input->post('email'),
					'no_rekening'=>$this->input->post('no_rekening'));

		$this->db->trans_start();
		$this->db->update('manager_register',$update,array('id'=> $kd_man));
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
               return "Query Failed";
           } else {
           	echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Manager/tambah_movie') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Success!</strong> Berhasil Diperbarui !!
			    </div>');
           }

        redirect('Manager/Welcome');
	}
	
}
