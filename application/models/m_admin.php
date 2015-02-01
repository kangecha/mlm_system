<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function checkLogin($username, $password) {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_admin', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }	

}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */