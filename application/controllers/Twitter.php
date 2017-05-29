<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Twitter extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('user');
    }

	/* show link to connect to Twiiter */
	public function index() {
		$this->load->library('twconnect');

		echo '<p><a href="' . base_url() . 'Twitter/redirect">Connect to Twitter</a></p>';
		echo '<p><a href="' . base_url() . 'Twitter/clearsession">Clear session</a></p>';

		echo 'Session data:<br/><pre>';
		print_r($this->session->all_userdata());
		echo '</pre>';
	}

	/* redirect to Twitter for authentication */
	public function redirect() {
		$this->load->library('twconnect');

		/* twredirect() parameter - callback point in your application */
		/* by default the path from config file will be used */
		$ok = $this->twconnect->twredirect('Twitter/callback');

		if (!$ok) {
			echo 'Could not connect to Twitter. Refresh the page or try again later.';
		}
	}


	/* return point from Twitter */
	/* you have to call $this->twconnect->twprocess_callback() here! */
	public function callback() {
		$this->load->library('twconnect');

		$ok = $this->twconnect->twprocess_callback();
		
		if ( $ok ) { redirect('Twitter/success'); }
			else redirect ('Twitter/failure');
	}


	/* authentication successful */
	/* it should be a different function from callback */
	/* twconnect library should be re-loaded */
	/* but you can just call this function, not necessarily redirect to it */
	public function success() {
		error_reporting(0);
		// echo 'Twitter connect succeded<br/>';
		// echo '<p><a href="' . base_url() . 'Twitter/clearsession">Do it again!</a></p>';

		$this->load->library('twconnect');

		// saves Twitter user information to $this->twconnect->tw_user_info
		// twaccount_verify_credentials returns the same information
		$this->twconnect->twaccount_verify_credentials();

		//echo 'Authenticated user info ("GET account/verify_credentials"):<br/><br>';
		$data =  json_encode($this->twconnect->tw_user_info);

		//print_r($data);

		$arr = json_decode($data);
		$keys = array();
		foreach ($arr as $value) {
		  $keys[] = current(explode(":", $value));
		}

		$name_user = $keys[2];

		$nama = explode(" ",$name_user);

			$userData['oauth_provider'] = 'Twitter';
			$userData['oauth_uid'] = $keys[1];
            $userData['first_name'] = $nama[0];
            $userData['last_name'] = $nama[1];
            $userData['email'] = '';
			$userData['locale'] = $keys[19];
            $userData['picture_url'] = $this->get_image($data);

			// Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }

            $this->session->nama = $userData['first_name'];
            $this->session->level = "Manager";
            $this->session->id = $userData['oauth_uid'];
            $this->session->picture =  $userData['picture_url'];
            $this->session->kd_Manager = $this->M_movie->first_value_where('id','oauth_uid',$this->session->userdata('id'),'manager_register');

            redirect('Manager/Welcome');
	}


	/* authentication un-successful */
	public function failure() {

		echo '<p>Twitter connect failed</p>';
		echo '<p><a href="' . base_url() . 'Twitter/clearsession">Try again!</a></p>';
	}


	/* clear session */
	public function clearsession() {

		$this->session->sess_destroy();

		redirect('/Twitter');
	}

	public function get_image($data){
		$a =  (int)strpos($data,"normal.jpg") - (int)strpos($data,'profile_image_url');
		$hasil = substr($data,strpos($data,'profile_image_url')+strlen("profile_image_url")+3,(int)$a-10);
		$newstring = str_ireplace("\/", "/", $hasil);
		return $newstring;
	}

}