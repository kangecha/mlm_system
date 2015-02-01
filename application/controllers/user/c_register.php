<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_register extends CI_Controller {

	private $template = "user_view/v_register";
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','user');
		$this->load->helper('captcha');
	}

	public function _remap($ref)
	{
		$this->index($ref);
	}

	public function index($ref)
	{
		$ref_username = NULL;
		$id_referal = NULL;
		$id_anggota = $this->user->generateRandomCode();
		if ($ref != "index") {
			if ($this->user->cariuser($ref)) {
				$id_referal = $this->user->berdasarkanuser($ref)->id_anggota;
				
				$ref_username = $this->user->getDetailUser($id_referal)->username;
				$this->session->set_userdata( 'id_referal',$id_referal );
				
			}else{
				$this->template = "v_ref_salah";
			}
		}else{
			if ($this->session->userdata('id_referal') == NULL) {
				
				$id_referal = $this->user->randomref()->id_anggota;
				$ref_username = $this->user->getDetailUser($id_referal)->username;
				$this->session->set_userdata( 'id_referal',$id_referal );
				
			}else{
				
				$id_referal = $this->session->userdata('id_referal');
				$ref_username = $this->user->getDetailUser($id_referal)->username;
			}
		}


		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		$tanggal = date('Y-m-d');
		
		$this->data['datausername'] = $username;
		if ($this->user->getDetailSponsor($id_referal) != NULL) {
			$this->data['namasponsor'] = $this->user->getDetailSponsor($id_referal)->nama_lengkap;
			$this->data['email'] = $this->user->getDetailSponsor($id_referal)->email;
			$this->data['nohp'] = $this->user->getDetailSponsor($id_referal)->no_telp;
		} 
		$this->data['konfirmasi'] = $id_anggota;
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean|is_unique[tbl_anggota.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_anggota.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]');
		$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required');

				if ($this->input->post('username')) {
					if ($this->form_validation->run() == FALSE) {
						$this->data['refferal'] = $ref_username."/".$id_referal;
						$this->load->view($this->template,$this->data);
					}else{
						$data = array(
						   'id_anggota' => $id_anggota ,
						   'id_referal' => $id_referal ,
						   'username' => trim($username) ,
						   'email' => $email,
						   'password' => sha1(md5($password)),
						   'tanggal' => $tanggal
						);

						$this->user->register($data);
						//------- Send Confirmation Email------------------//
		                $this->load->library('email');
		                $config['protocol'] = 'mail';
		                /*$config['smtp_host'] = 'iix11.sharehostserver.com';
		                $config['smtp_user'] = 'noreply@bmi-eksekutif.com';
		                $config['smtp_pass'] = 'noreply123';*/
		                $config['mailtype'] = 'html';
		                $this->email->initialize($config);

		                $this->email->to($email);
		                $this->email->from("noreply@bmi-eksekutif.com");
		                $this->email->subject('Konfirmasi Aktifasi Akun Anda.');
		                $message = '';
		                
		                $message .= $this->load->view('email/v_konfirmasi', $this->data, TRUE);

		                $this->email->message($message);
		                $this->email->send();

		                redirect(base_url("user/c_konfirmasi/"));
		                //------- Send Confirmation Email------------------//
					}
				}else{
					$this->data['refferal'] = $ref_username."/".$id_referal;
					$this->load->view($this->template,$this->data);
				}
	}

}

/* End of file c_register.php */
/* Location: ./application/controllers/user/c_register.php */