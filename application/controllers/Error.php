<?php defined('BASEPATH') OR exit('No direct script access allowed');
class error extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('user');
    }

    public function index(){
    	if ($this->session->userdata('level') == "Manajer") {
    		$this->load->view('errors/404m');
    	}
    }
 }