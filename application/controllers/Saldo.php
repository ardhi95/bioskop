<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Saldo extends CI_Controller
{
    function __construct() {
		parent::__construct();
		  if (empty($this->session->userdata('answer'))) {
        redirect('Admin');
      }
    }

    public function index(){
    	$where = array('status' => 0);
    	$a['data'] = $this->M_TSaldo->shsaldo($where);
    	$this->load->view('Admin/belisaldo',$a);
    }

    public function verified(){
      $where = array('status' => 1);
      $a['data'] = $this->M_TSaldo->shsaldo($where);
      $this->load->view('Admin/belisaldo',$a);
    }

    public function update(){
    	$id = $_GET['kode'];
      $mail = $_GET['mail'];
    	$update = array('status'=> '1');

		$this->db->trans_start();
		$this->db->update('transaksi_saldo',$update,array('id_transaksi_saldo'=> $this->M_other->dec($id)));
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
               echo $this->session->set_flashdata('status1', 'gagal');
               redirect('Saldo');
           } else {
           	  redirect('Email?to='.$mail);
           }
    }

}