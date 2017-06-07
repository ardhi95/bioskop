<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    function __construct() {
		parent::__construct();

		
    }

    public function index(){
    	if (empty($this->session->userdata('answer'))) {
    		$this->load->view('Admin/auth1');
    	}else{
    		$this->load->view('Admin/login_admin');
    	}
    }

    public function firstcek(){
    	$email = $this->input->post('email');
        $lihatData = $this->M_other->Auth('email',$email,'penyedia_layanan');
        
        if ($lihatData > 0)
            {$this->session->answer = $email;}
        else{$this->session->set_flashdata('status', ' <font color="red">Maaf, Email Salah</font><br> ');}
        
        redirect('Admin');
    }


    public function Auth(){
    	$idadmin = $this->input->post('id_admin');
    	$pwd = $this->input->post('pasword');

        $lihatData = $this->M_admin->Sign($idadmin,md5($pwd));
         if ($lihatData > 0)
            {
                $this->session->nama = $this->M_movie->first_value_where('nama','id_admin',$idadmin,'penyedia_layanan');
                $this->session->level = "Admin";
                $this->session->id = $idadmin;

                redirect('Saldo');
              

            }
                else{
                    $this->session->set_flashdata('gagal', '<span class="label label-danger"><span class="glyphicon glyphicon-ban-circle"></span> Maaf Username & Password Tidak Sesuai</span>');
                    redirect('Admin');
                    
                }
    }

    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('Admin','refresh');
    }


    public function get_manager(){
        if (empty($this->session->userdata('answer'))) {
        redirect('Admin');
      }
        $db['data'] = $this->db->get('manager_register');
        $this->load->view('Admin/ManCRUD/ManagerRegister',$db);
    }

    public function get_bioskop(){
        if (empty($this->session->userdata('answer'))) {
        redirect('Admin');
      }
        $db['data'] = $this->M_admin->pantaubioskop();
        $this->load->view('Admin/ManCRUD/Bioskop',$db);

    }

    public function get_customer(){
    if (empty($this->session->userdata('answer'))) {
        redirect('Admin');
      }
        $db['data'] = $this->db->get('customer');
        $this->load->view('Admin/ManCRUD/Customer',$db);

    }
    public function PTransaksi(){
        if (empty($this->session->userdata('answer'))) {
        redirect('Admin');
      }
        $get['data'] = $this->M_TSaldo->transaksi_Pending();
        $this->load->view('Admin/transaksisaldopending',$get);   
    }
    public function HTransaksi(){
        if (empty($this->session->userdata('answer'))) {
        redirect('Admin');
      }
        $get['data'] = $this->M_TSaldo->transaksi_History();
        $this->load->view('Admin/transaksisaldo',$get);   
    }
    public function UpdateTransaksi(){
        if (empty($this->session->userdata('answer'))) {
        redirect('Admin');
      }
        $id_trans = $this->uri->segment(3);
        $getManager = $this->db->query('SELECT id_manager FROM transaksi_withdrawal WHERE id_withdrawal="'.$id_trans.'"')->row();
        //$idMg = is_object($getManager->id_manager);
        if (is_object($getManager)) {
                        $update = array('id_withdrawal'=>$id_trans,
                                    'status'=>1);
                        $this->db->trans_start();
                        $this->db->update('transaksi_withdrawal',$update,array('id_withdrawal'=>$id_trans));
                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE) {
                            echo $this->session->set_flashdata('gagal', 'gagal');
                           } else {
                            echo $this->session->set_flashdata('oke', 'oke');
                           }

                        
                        $idMg = ($getManager->id_manager);
                        $setsal = 0;
                        //$this->db->query('Update customer set saldo="'.$upsaldo.'" Where id_customer="'.$data['id_customer'].'"'); 
                        $query = $this->db->query('UPDATE manager_register SET saldo = "'.$setsal.'" WHERE id="'.$idMg.'"');
                        redirect('Admin/PTransaksi/');
                        return $query;
                    }
    

    }

    public function get_pendapatan()
    {
        $this->load->model('M_admin');
        $data['penNow'] = $this->M_admin->getReportNow()->result();
        $data['penM'] = $this->M_admin->getReportM()->result();
        $data['penA'] = $this->M_admin->getReportA()->result();

        $data['pendapatan'] = $this->db->get('biaya_layanan')->result();
        $this->load->view('Admin/Vpendapatan', $data);
    }

    public function daftarFilm()
    {
        $data['film'] = $this->db->get('movie_new')->result();
        $this->load->view('Admin/VdaftarFilm', $data);
    }

    public function tambahFilm()
    {
        $this->load->view('Admin/VtambahFilm');
    }

 }