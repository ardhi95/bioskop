<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

  public function __construct(){
      parent::__construct();
      if ($this->session->userdata('level')!='Admin'){
       redirect('Admin','refresh');
      }
    }

public function index(){
          //Konfig librari email
          //---------------------------------------------//

            $tujuan = $_GET['to'];
		        $config['useragent'] = 'CodeIgniter';
            $config['protocol'] = 'smtp';
            //$config['mailpath'] = '/usr/sbin/sendmail';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_user'] = 'moviestation.at@gmail.com';
            $config['smtp_pass'] = 'm0v13stationat';
            $config['smtp_port'] = 465; 
            $config['smtp_timeout'] = 15;
            $config['wordwrap'] = TRUE;
            $config['wrapchars'] = 76;
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['validate'] = FALSE;
            $config['priority'] = 3;
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['bcc_batch_mode'] = FALSE;
            $config['bcc_batch_size'] = 200;
          //<!library email>---------------------------------------



            // Load email library and passing configured values to email library 
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            
            // Sender email address
            $this->email->from('moviestation.at@gmail.com', 'Movie Station');
            // Receiver email address
            $this->email->to($tujuan);
            // Subject of email
            $this->email->subject('Notifikasi Saldo');
            // Message in email
            $this->email->message('Saldo Anda Telah Berhasil Kami Tambahkan');

            if ($this->email->send()) {
              echo $this->session->set_flashdata('status2', 'berhasil');
              redirect('Saldo');
            } else {
              show_error($this->email->print_debugger());
            }
      }

}