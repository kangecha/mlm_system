<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','user');
	}

	public function index()
	{
		if ($this->session->userdata('user_is_login')) {
			if ($this->session->userdata('lengkap') == 1) {
				if ($this->session->userdata('aktif') == 1) {
					$this->session->set_flashdata('pesan', 'Selamat Datang di Dashboard Member <strong>PT. Berkat Merdeka Indonesia</strong>');
				}else{
					$this->session->set_flashdata('pesan', 'Terimakasih Telah Bergabung di <strong>PT. Berkat Merdeka Indonesia</strong><br>
													Status Anda Saat Ini <span class="red">TIDAK AKTIF</span> Silahkan Hubungi <a href="#">Sponsor</a> Anda
													<br> Dan Dapatkan 6 Website Replika GRATIS! Sekarang Juga.
													');
				}
                redirect('user/c_dashboard');
            } else {
                redirect('user/c_dashboard/lengkapi');
            }
		}else{
			if ($this->input->post('username')) {
				$username = $this->input->post('username');
	            $password = sha1(md5($this->input->post('password')));

	            $user = $this->user->checkLogin($username, $password);

	            if (!empty($user)) {
	                $sessionData['id_anggota_login'] = $user['id_anggota'];
	                $sessionData['username_login'] = $user['username'];
	                $sessionData['lengkap'] = $user['lengkap'];
	                $sessionData['aktif'] = $user['aktif'];
	                $sessionData['user_is_login'] = TRUE;

	                $this->session->set_userdata($sessionData);

	                if ($this->session->userdata('lengkap') == 1) {
	                	if ($this->session->userdata('aktif') == 1) {
							$this->session->set_flashdata('pesan', 'Selamat Datang di Dashboard Member <strong>PT. Berkat Merdeka Indonesia</strong>');
						}else{
							$this->session->set_flashdata('pesan', 'Terimakasih Telah Bergabung di <strong>PT. Berkat Merdeka Indonesia</strong><br>
															Status Anda Saat Ini <span class="red">TIDAK AKTIF</span> Silahkan Hubungi <a href="#">Sponsor</a> Anda
															<br> Dan Dapatkan 6 Website Replika GRATIS! Sekarang Juga.
															');
						}
	                    redirect('user/c_dashboard');
	                } else {
	                    redirect('user/c_dashboard/lengkapi');
	                }
	            }

	            $this->session->set_flashdata('error', '<i class=icon-remove-sign red></i> Login Gagal!, username dan password tidak sesuai atau belum terkonfirmasi <br>');
	            redirect('user/c_login');
			}
		}
		
		$this->load->view('user_view/v_login');		
	}

	public function logout() {

        $this->session->sess_destroy();
        redirect('user/c_login');
    }

}

/* End of file c_login.php */
/* Location: ./application/controllers/user/c_login.php */