<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function checkLogin($username, $password) {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('confirm', 1);
        $query = $this->db->get('tbl_anggota', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    public function countMember($id_anggota,$aktif,$lengkap)
    {
    	return $this->db->query('SELECT count(id_referal) as jumlah_member FROM `tbl_anggota` WHERE `id_referal` = "'.$id_anggota.'" AND `aktif` = "'.$aktif.'" AND `lengkap` = "'.$lengkap.'"')
    					->row();

    }

	public function register($data)
	{
		$this->db->insert('tbl_anggota', $data); 
	}

	public function lengkapidata($data)
	{
		$this->db->insert('tbl_detail_anggota', $data); 
	}

	public function lengkap($id_anggota)
	{
		$data = array(
               'lengkap' => '1'
            );

		$this->db->where('id_anggota', $id_anggota);
		$this->db->update('tbl_anggota', $data); 
	}

	public function profile_update($id_anggota)
	{
		$nama_lengkap = strip_tags($this->input->post('nama_lengkap'));
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$no_identitas = $this->input->post('no_identitas');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$agama = $this->input->post('agama');
		$alamat = strip_tags($this->input->post('alamat'));
		$id_kota = $this->input->post('id_kota');
		$id_provinsi = $this->input->post('id_provinsi');
		$kode_pos = $this->input->post('kode_pos');
		$no_telp = $this->input->post('no_telp');


		$data = array(
					   'nama_lengkap' => $nama_lengkap ,
					   'tempat_lahir' => $tempat_lahir ,
					   'tanggal_lahir' => $tanggal_lahir,
					   'no_identitas' => $no_identitas,
					   'jenis_kelamin' => $jenis_kelamin,
					   'agama' => $agama,
					   'alamat' => $alamat,
					   'id_kota' => $id_kota,
					   'id_provinsi' => $id_provinsi,
					   'kode_pos' => $kode_pos,
					   'no_telp' => $no_telp,
					);

		$this->db->where('id_anggota', $id_anggota);
        $this->db->update('tbl_detail_anggota', $data);

        return TRUE;
	}

	public function editPassword($id_anggota)
	{
		$data = array(
				'password' => sha1(md5($this->input->post('password')))
			);
		$this->db->where('id_anggota', $id_anggota);
        $this->db->update('tbl_anggota', $data);
	}

	public function editEmail($id_anggota)
	{
		$data = array(
				'email' => $this->input->post('email')
			);
		$this->db->where('id_anggota', $id_anggota);
        $this->db->update('tbl_anggota', $data);
	}

	public function update_avatar($id_anggota)
	{
		$filename =  $this->upload->data();
		$data = array(
					   'foto' => $filename['file_name']
					);

		$this->db->where('id_anggota', $id_anggota);
        $this->db->update('tbl_detail_anggota', $data);
	}

	public function berdasarkankode($ref)
	{
		return $this->db->get_where('tbl_anggota', array('id_anggota' => $ref))->row();
		
	}

	public function berdasarkanuser($nama)
	{
		return $this->db->get_where('tbl_anggota', array('username' => $nama))->row();
		
	}

	public function getDetailSponsor($kodesponsor)
	{
		
		return $this->db->select('a.username,a.id_referal,a.email,b.*,c.nama_kota,d.nama_provinsi')
						->from('tbl_anggota a')
						->join('tbl_detail_anggota b', 'a.id_anggota = b.id_anggota', 'left')
						->join('tbl_provinsi d', 'b.id_provinsi = d.id_provinsi', 'left')
						->join('tbl_kota c', 'b.id_kota = c.id_kota', 'left')
						->where('a.id_anggota', $kodesponsor)
						->get()
						->row();

	}

	public function getDetailUser($id_anggota)
	{
		
		return $this->db->select('c.nama_kota,d.nama_provinsi,a.username,a.tanggal,a.id_referal,a.email,a.MasterID,a.lengkap,a.aktif,a.confirm,b.*')
						->from('tbl_anggota a')
						->join('tbl_detail_anggota b', 'a.id_anggota = b.id_anggota', 'left')
						->join('tbl_kota c', 'b.id_kota = c.id_kota', 'left')
						->join('tbl_provinsi d', 'b.id_provinsi = d.id_provinsi', 'left')
						->where('a.id_anggota', $id_anggota)
						->get()
						->row();

	}

	public function getTestimoni($id_anggota)
	{
		return $this->db->select('a.username,a.id_anggota,b.judul_testi,b.isi')
						->from('tbl_anggota a')
						->join('tbl_testimoni b','a.id_anggota = b.id_anggota','left')
						->where('a.id_anggota',$id_anggota)
						->get()
						->row();
	}

	public function getAllTestimoni()
	{
		return $this->db->select('a.MasterID,a.tanggal,a.username,a.id_anggota,b.judul_testi,b.isi,c.nama_lengkap,c.foto')
						->from('tbl_anggota a')
						->join('tbl_testimoni b','a.id_anggota = b.id_anggota')
						->join('tbl_detail_anggota c','a.id_anggota = c.id_anggota','left')
						->order_by('a.tanggal','desc')
						->limit('5')
						->get()
						->result_array();
	}

	public function getAdditionalDetail($id_anggota)
	{
		
		return $this->db->select('a.username,a.id_referal,a.email,a.lengkap,a.aktif,a.confirm,b.*,c.nama_bank,c.cabang,c.nama_pemilik,c.no_rek')
						->from('tbl_anggota a')
						->join('tbl_add_anggota b', 'a.id_anggota = b.id_anggota', 'left')
						->join('tbl_bank c', 'a.id_anggota = c.id_anggota', 'left')
						->where('a.id_anggota', $id_anggota)
						->get()
						->row();

	}

	public function insertAdditional($data)
	{
		$this->db->insert('tbl_add_anggota', $data); 
	}

	public function updateAdditional($id_anggota)
	{
		$nama_ibu_kandung = $this->input->post('nama_ibu_kandung');
		$nama_ahli_waris = $this->input->post('nama_ahli_waris');
		$hubungan = $this->input->post('hubungan');
		$npwp = $this->input->post('npwp');

		$data = array(
						'nama_ibu_kandung' => $nama_ibu_kandung,
						'nama_ahli_waris' => $nama_ahli_waris,
						'hubungan' => $hubungan,
						'npwp' => $npwp
					);
		$this->db->where('id_anggota', $id_anggota);
        $this->db->update('tbl_add_anggota', $data);
	}

	public function insertBank($data)
	{
		$this->db->insert('tbl_bank', $data); 
	}

	public function insertTesti($data)
	{
		$this->db->insert('tbl_testimoni', $data); 
	}

	public function updateBank($id_anggota)
	{
		$nama_bank = $this->input->post('nama_bank');
		$cabang = $this->input->post('cabang');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$no_rek = $this->input->post('no_rek');

		$data = array(
						'nama_bank' => $nama_bank,
						'cabang' => $cabang,
						'nama_pemilik' => $nama_pemilik,
						'no_rek' => $no_rek
					);
		$this->db->where('id_anggota', $id_anggota);
        $this->db->update('tbl_bank', $data);
	}

	public function updateTesti($id_anggota)
	{
		$judul_testi = $this->input->post('judul_testi');
		$isi = $this->input->post('isi');

		$data = array(
						'judul_testi' => $judul_testi,
						'isi' => $isi
					);
		$this->db->where('id_anggota', $id_anggota);
        $this->db->update('tbl_testimoni', $data);
	}


	public function getMember($id_anggota)
	{
		
		return $this->db->select('a.*,b.nama_lengkap,b.foto')
						->from('tbl_anggota a')
						->join('tbl_detail_anggota b','a.id_anggota = b.id_anggota')
						->where('id_referal', $id_anggota)
						->where('aktif', 1)
						->order_by('tanggal','desc')
						->get()
						->result_array();

	}

	public function getNewMember($id_anggota)
	{
		
		return $this->db->select('*')
						->from('tbl_anggota')
						->where('id_referal', $id_anggota)
						->where('aktif', 0)
						->order_by('tanggal','desc')
						->get()
						->result_array();

	}

	public function konfirmasiuser($kode)
	{
		$data = array(
               'confirm' => '1'
            );

		$this->db->where('id_anggota', $kode);
		$this->db->update('tbl_anggota', $data); 
	}

	public function approveuser($kode)
	{
		$data = array(
               'aktif' => '1'
            );

		$this->db->where('id_anggota', $kode);
		$this->db->update('tbl_anggota', $data); 
	}

	public function rejectuser($kode)
	{
		$data = array(
               'confirm' => '2'
            );

		$this->db->where('id_anggota', $kode);
		$this->db->update('tbl_anggota', $data); 
	}

	public function deleteuser($kode)
	{
		$this->db->where('id_anggota', $kode);
		$this->db->delete('tbl_anggota'); 
	}

	public function carikode($ref)
	{
		$this->db->get_where('tbl_anggota', array('id_anggota' => $ref));
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
	}

	public function cariuser($nama)
	{
		$this->db->get_where('tbl_anggota', array('username' => $nama,'aktif' => '1'));
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
	}

	public function generateRandomCode($length = 5) {
        // Available characters
        $chars = '0123456789abcdefghjkmnoprstvwxyz';

        $Code = '';
        // Generate code
        for ($i = 0; $i < $length; ++$i) {
            $Code .= substr($chars, (((int) mt_rand(0, strlen($chars))) - 1), 1);
        }
        return "BMI-".strtoupper($Code);
    }

	public function randomref()
	{
		return $this->db->select('*')
				 ->order_by('id_anggota', 'RANDOM')
				 ->where('aktif','1')
	    		 ->limit(1)
	    		 ->get('tbl_anggota')
	    		 ->row();
	}

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */