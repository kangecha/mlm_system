<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hapussesi extends CI_Controller {

	public function index()
	{
		$this->session->sess_destroy();
	}

}

/* End of file hapussesi.php */
/* Location: ./application/controllers/hapussesi.php */