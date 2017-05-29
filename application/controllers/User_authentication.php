<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('user');
    }
    
    public function index(){
		// Include the google api php libraries
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		
		// Google Project API Credentials
		$clientId = '766133586892-i5dm8qm771l50stlag2elmtgch5ms28g.apps.googleusercontent.com';
        $clientSecret = '7zNqIKZb1LJ0S5j5iWEbXe4A';
        $redirectUrl = 'http://localhost/bioskop/User_authentication';
        //===============================================================
		
		// Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to codexworld.com');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        //Jika User merequest dari button akun google
        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
			$userData['locale'] = $userProfile['locale'];
            $userData['picture_url'] = $userProfile['picture'];


			// Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }

            //Set Session
            $this->session->nama = $userData['first_name'];
            $this->session->level = "Manajer";
            $this->session->id = $userData['oauth_uid'];
            $this->session->picture = $userProfile['picture'];
            $this->session->kd_Manager = $this->M_movie->first_value_where('id','oauth_uid',$this->session->userdata('id'),'manager_register');

        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }
		//$this->load->view('user_authentication/index',$data);
        redirect('Manager/Welcome');
    }
}
