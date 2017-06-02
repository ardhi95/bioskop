<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller
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
            //$userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            //$userData['profile_url'] = $userProfile['link'];
            $userData['picture_url'] = $userProfile['picture'];

            $this->session->nama = $userData['first_name'];
            $this->session->id = $userData['oauth_uid'];
            $this->session->picture = $userProfile['picture'];
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }
        $this->load->view('Manager/masuk',$data);
        //$this->load->view('Admin/welcomeadmin');

    }


    public function tambah_movie(){

        $kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop');

        $data['id_bioskop']= $kode_bioskop;
        $kondisi = array('id_bioskop' => $kode_bioskop);
        $data['jadwal'] = $this->M_movie->edit_dataJam($kondisi,'jam_pemutaran');
        $data['film'] = $this->M_movie->getFilm('');
        $data['Kode'] = $this->CGenerate();
        $data['movie_list'] = $this->M_movie->get_movie($kode_bioskop);
        $this->load->view('Manager/movieadd',$data);

    }

    private function CGenerate(){
    $kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop');

     $kondisi = "id_bioskop = '" . $kode_bioskop. "' ";
     $kode = $this->M_movie->buat_kode('id_jadwal','jadwal',$kode_bioskop.'JM',$kondisi);

     return $kode;
    }

    public function profil()
    {
            $id = $this->session->userdata('kd_Manager');
            $data['code'] = "BS".rand(1, 1000);
            $data['HStep'] = $this->CekStep();
            $data['PgB'] = 100-(33.3*$this->CekStep());
            $where = array('oauth_uid' => $this->session->userdata('id'));
            $data['Man'] = $this->M_movie->edit_dataManager($id);
            $this->load->view('Manager/startup',$data);
    }

    public function Transaksi(){
        $id = $this->session->userdata('kd_Manager');
        $get['sal'] = $this->M_TSaldo->getSaldo($id);
        $get['data'] = $this->M_TSaldo->transaksi_list();
        $this->load->view('Manager/transaksisaldo',$get);
    }

    

    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('Manager');
    }

    public function Laporan(){
        $jenis = $_GET['id'];
        $manajer = $this->session->userdata('kd_Manager');
        $kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$manajer,'bioskop');

        define('Result', $this->M_other->dec($jenis));

        if (Result == 'today') {
            $a['list'] = $this->M_TSaldo->ReportNow($manajer);
        }elseif (Result == 'weekly') {
            $a['list'] = $this->M_TSaldo->ReportWeek($manajer);
        }elseif (Result == 'monthly') {
            $a['list'] = $this->M_TSaldo->ReportMonth($manajer);
        }elseif (Result == 'alltransaction') {
            $a['list'] = $this->M_TSaldo->ReportAll($manajer);
        }

        $hari = array('DATE(tgl_beli)' => date('Y-m-d'),'id_bioskop' => $kode_bioskop);
        $bulan = array('MONTH(tgl_beli)' => (int)date('m'),'id_bioskop' => $kode_bioskop);
        $tahun = array('YEAR(tgl_beli)' => (int)date('Y'),'id_bioskop' => $kode_bioskop);

        $har = $this->M_TSaldo->SUM('pembelian_tiket',$hari,'jml_uang');
        $bul = $this->M_TSaldo->SUM('pembelian_tiket',$bulan,'jml_uang');
        $year= $this->M_TSaldo->SUM('pembelian_tiket',$tahun,'jml_uang');


        $a['P_Hari'] = number_format($har,2,',','.');
        $a['P_Bulan'] = number_format($bul,2,',','.');
        $a['P_Tahun'] = number_format($year,2,',','.');
        
        $this->load->view('Manager/laporan',$a);
    }

    public function count_TPnd(){
        $where = array('status' => 0,'id_manager' => $this->session->userdata('kd_Manager'));
        $jumlah = $this->M_other->count_return_row('transaksi_withdrawal',$where);

        echo (int)$jumlah;

    }

    public function SignIn(){
        $atentikasi = $this->input->post('authID');
        $lihatData = $this->M_other->Auth('oauth_uid',$atentikasi,'manager_register');
         if ($lihatData > 0)
            {
                $this->session->nama = $this->M_movie->first_value_where('first_name','oauth_uid',$atentikasi,'manager_register');
                $this->session->level = "Manager";
                $this->session->id = $atentikasi;
                $this->session->picture = $this->M_movie->first_value_where('picture_url','oauth_uid',$atentikasi,'manager_register');
                $this->session->kd_Manager = $this->M_movie->first_value_where('id','oauth_uid',$this->session->userdata('id'),'manager_register');

                
                $this->load->view('Manager/welcomemenejer');

            }
                else{
                    $this->session->set_flashdata('gagal', '<span class="label label-danger"><span class="glyphicon glyphicon-ban-circle"></span> Maaf Username & Password Tidak Sesuai</span>');
                    redirect('Manager');
                }

    }

    public function Welcome(){
        $where = array('id_manager' => $this->session->userdata('kd_Manager'));
        $jumlah = $this->M_other->count_return_row('bioskop',$where);
        $id = $this->session->userdata('kd_Manager');

        if ($jumlah > 0) {
            $this->load->view('Manager/welcomemenejer');
        }else{
            $data['code'] = "BS".rand(1, 1000);
            $data['HStep'] = $this->CekStep();
            $data['PgB'] = 100-(33.3*$this->CekStep());
            $where = array('oauth_uid' => $this->session->userdata('id'));
            $data['Man'] = $this->M_movie->edit_dataManager($id);
            $this->load->view('Manager/startup',$data);
        }
    }

    public function CekStep(){
        $norek =  $this->M_movie->first_value_where('no_rekening','oauth_uid',$this->session->userdata('id'),'manager_register');
        $email = $this->M_movie->first_value_where('email','oauth_uid',$this->session->userdata('id'),'manager_register');

        if ($norek == 0 || $email == "") {
            (int)$step = 2;
        }else{
            (int)$step = 1;
        }

        return $step;
    }

    public function withdraw()
    {
        $id = $this->session->userdata('kd_Manager');
        $saldom = $this->M_TSaldo->getSaldo($id)->row();
        if (is_object($saldom)) {

            $tgl = date('Y-m-d');
            $waktu = date('h-i-s');
            $status = '0';
            $admin = "admin";
            $id = $this->session->userdata('kd_Manager');
            $data = array(
                'id_withdrawal' => '',
                'tanggal'       => $tgl,
                'waktu'         => $waktu,
                'id_manager'    => $id,
                'id_admin'      => $admin,
                'jumlah'        => $saldom->saldo,
                'no_transfer'   => '0',
                'status'        => $status
                );

        $this->db->insert('transaksi_withdrawal', $data);
        redirect('Manager/Transaksi');
        }
        

    }

}
