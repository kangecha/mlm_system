<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General {

	var $ci;

	public function __construct(){

		$this->ci = &get_instance();
		//Do your magic here
	}

	function UserIsLogin() {
        if ($this->ci->session->userdata('user_is_login') == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function cekUserLogin() {
        if ($this->UserIsLogin() != TRUE) {
            $this->ci->session->set_flashdata('error', '<i class=icon-remove-sign red></i> Anda tidak memiliki hak akses, Silahkan Login Terlebih Dahulu');
            redirect('user/c_login');
        }
    }

    function AdminIsLogin() {
        if ($this->ci->session->userdata('admin_is_login') == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function cekAdminLogin() {
        if ($this->AdminIsLogin() != TRUE) {
            $this->ci->session->set_flashdata('error', '<i class=icon-remove-sign red></i> Anda tidak memiliki hak akses, Silahkan Login Terlebih Dahulu');
            redirect('administrator/c_login');
        }
    }
}

/* End of file general.php */
/* Location: ./application/controllers/general.php */