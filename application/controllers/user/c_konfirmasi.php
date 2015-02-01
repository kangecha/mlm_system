<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_konfirmasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_user','user');
	}

	public function index()
	{
		$this->load->view('konfirmasi/v_konfirmasi');
	}

	public function kode($kode = null)
	{
		if ($this->input->post('inputkode')) {
			
			$inputkode = $this->input->post('inputkode');

			if ($this->user->carikode($inputkode)) {
					$this->user->konfirmasiuser($inputkode);
					
					//------- Send Confirmation Email------------------//
					$email = $this->user->berdasarkankode($inputkode)->email;
					$this->data['datausername'] = $this->user->berdasarkankode($inputkode)->username;
					$this->data['dataemail'] = $this->user->berdasarkankode($inputkode)->email;
					$koderef= $this->user->berdasarkankode($inputkode)->id_referal;
					$this->data['namasponsor'] = $this->user->getDetailUser($koderef)->nama_lengkap;
					$this->data['email'] = $this->user->getDetailUser($koderef)->email;
					$this->data['nohp'] = $this->user->getDetailUser($koderef)->no_telp;
					
					
			                $this->load->library('email');
			                $config['protocol'] = 'mail';
			                /*$config['smtp_host'] = 'iix11.sharehostserver.com';
			                $config['smtp_user'] = 'noreply@bmi-eksekutif.com';
			                $config['smtp_pass'] = 'noreply123';*/
			                $config['mailtype'] = 'html';
			                $this->email->initialize($config);
		
			                $this->email->to($email);
			                $this->email->from("noreply@bmi-eksekutif.com");
			                $this->email->subject('Konfirmasi Email Berhasil.');
			                $message = '';
			                
			                $message .= $this->load->view('email/v_konfirmasi_ok', $this->data, TRUE);
		
			                $this->email->message($message);
			                $this->email->send();
					
			                //------- Send Confirmation Email------------------//
			                $this->load->view('konfirmasi/v_berhasil_konfirmasi');
				}else{
					$this->load->view('konfirmasi/v_gagal_konfirmasi');
				}
		}else{
			if (empty($kode)) {
				$this->load->view('konfirmasi/v_gagal_konfirmasi');
			}else{
				if ($this->user->carikode($kode)) {
					$this->user->konfirmasiuser($kode);
					
					//------- Send Confirmation Email------------------//
					
					$email = $this->user->berdasarkankode($kode)->email;
					$this->data['datausername'] = $this->user->berdasarkankode($kode)->username;
					$this->data['dataemail'] = $this->user->berdasarkankode($kode)->email;
					$koderef= $this->user->berdasarkankode($kode)->id_referal;
					$this->data['namasponsor'] = $this->user->getDetailUser($koderef)->nama_lengkap;
					$this->data['email'] = $this->user->getDetailUser($koderef)->email;
					$this->data['nohp'] = $this->user->getDetailUser($koderef)->no_telp;
					
			                $this->load->library('email');
			                $config['protocol'] = 'mail';
			                /*$config['smtp_host'] = 'iix11.sharehostserver.com';
			                $config['smtp_user'] = 'noreply@bmi-eksekutif.com';
			                $config['smtp_pass'] = 'noreply123';*/
			                $config['mailtype'] = 'html';
			                $this->email->initialize($config);
		
			                $this->email->to($email);
			                $this->email->from("noreply@bmi-eksekutif.com");
			                $this->email->subject('Konfirmasi Email Berhasil.');
			                $message = '';
			                
			                $message .= $this->load->view('email/v_konfirmasi_ok', $this->data, TRUE);
		
			                $this->email->message($message);
			                $this->email->send();
					
			                //------- Send Confirmation Email------------------//
			                $this->load->view('konfirmasi/v_berhasil_konfirmasi');
				}else{
					$this->load->view('konfirmasi/v_gagal_konfirmasi');
				}
			}
		}
	}

}

/* End of file c_konfirmasi.php */
/* Location: ./application/controllers/user/c_konfirmasi.php */