<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin','admin');
		$this->load->helper('captcha');
	}

	public function index()
	{
		if ($this->session->userdata('admin_is_login')) {
				redirect('administrator/c_home');
			}else{
				if ($this->input->post('username')) {
					$username = $this->input->post('username');
	            	$password = sha1(md5($this->input->post('password')));
	            	$userCaptcha = $this->input->post('userCaptcha');
    
				    /* Get the actual captcha value that we stored in the session (see below) */
				    $word = $this->session->userdata('captchaWord');

	            	$admin = $this->admin->checkLogin($username, $password);

	            	if ($userCaptcha == $word) {
	            		if (!empty($admin)) {
			                $sessionData['admin_is_login'] = TRUE;
			                $sessionData['id_admin'] = $admin['id'];
			                /* Clear the session variable */
		     				$this->session->unset_userdata('captchaWord');

			                $this->session->set_userdata($sessionData);

			                redirect('administrator/c_home');
	            		}else{
	            			$this->session->set_flashdata('error', '<i class=icon-remove-sign red></i> Login Gagal!, username dan password tidak sesuai <br>');
		            		redirect('administrator/c_login');
	            		}
	            	}else{
	            		$this->session->set_flashdata('error', '<i class=icon-remove-sign red></i> Kami Harap Anda Memasukan Huruf Pada Gambar Dengan Benar! <br>');
	            			redirect('administrator/c_login');
	            	}
				}else{
					$vals = array(
			        'img_path' => 'assets/captchaWord/',
			        'img_url' => base_url().'assets/captchaWord/',
			        );
			        
			      /* Generate the captcha */
			      $captcha = create_captcha($vals);
			      
			      /* Store the captcha value (or 'word') in a session to retrieve later */
			      $this->session->set_userdata('captchaWord', $captcha['word']);
				}
			}
		$this->load->view('admin_view/v_login',$captcha);		
	}

	public function logout() {

        $this->session->sess_destroy();
        redirect('administrator/c_login');
    }

}

/* End of file c_login.php */
/* Location: ./application/controllers/administrator/c_login.php */