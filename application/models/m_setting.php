<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_setting extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getSlider()
	{
		return $this->db->get('tbl_slider')
						->result_array();
	}

	public function getTopSponsor($tgl1,$tgl2)
	{
		return $this->db->query("SELECT count(a.id_anggota) as jumlah_member,a.* FROM tbl_anggota a JOIN tbl_anggota b ON a.id_anggota = b.id_referal WHERE b.aktif = '1' AND (b.tanggal BETWEEN '".$tgl2."' AND '".$tgl1."') GROUP BY a.id_anggota ORDER BY jumlah_member DESC LIMIT 5")
						->result_array();
	}

	public function getMember()
	{
		
		return $this->db->select('a.*,b.nama_lengkap,b.foto')
						->from('tbl_anggota a')
						->join('tbl_detail_anggota b','a.id_anggota = b.id_anggota')
						->where('aktif', 1)
						->limit(5)
						->order_by('tanggal','desc')
						->get()
						->result_array();

	}

	public function getNewMember()
	{
		
		return $this->db->select('*')
						->from('tbl_anggota')
						->where('aktif', 0)
						->limit(5)
						->order_by('tanggal','desc')
						->get()
						->result_array();

	}

	public function getBanner()
	{
		return $this->db->get('tbl_banner')
						->result_array();
	}

	public function getBannerByLokasi($lokasi)
	{
		return $this->db->select('*')
						->where('lokasi',$lokasi)
						->get('tbl_banner')
						->result_array();
	}

	public function getSliderID($id_slider)
	{
		return $this->db->select('*')
						->where('id_slider',$id_slider)
						->get('tbl_slider')
						->row();
	}

	public function getBannerID($id_banner)
	{
		return $this->db->select('*')
						->where('id_banner',$id_banner)
						->get('tbl_banner')
						->row();
	}

	public function insertSlider($data)
	{
		$this->db->insert('tbl_slider', $data); 
	}

	public function insertBanner($data)
	{
		$this->db->insert('tbl_banner', $data); 
	}

	public function editSlider($id_slider)
	{
		$filename =  $this->upload->data();
		$data = array(
				'judul_slider' => $this->input->post('judul_slider'),
				'file' => $filename['file_name']
			);

		$this->db->where('id_slider', $id_slider);
        $this->db->update('tbl_slider', $data);
	}

	public function editBanner($id_banner)
	{
		$filename =  $this->upload->data();
		$data = array(
				'judul_banner' => $this->input->post('judul_banner'),
				'link' => $this->input->post('link'),
				'lokasi' => $this->input->post('lokasi'),
				'file' => $filename['file_name']
			);

		$this->db->where('id_banner', $id_banner);
        $this->db->update('tbl_banner', $data);
	}

	/*public function updateSlider($id_slider)
	{
		$filename =  $this->upload->data();
		$data = array(
					   'file' => $filename['file_name']
					);

		$this->db->where('id_slider', $id_slider);
        $this->db->update('tbl_slider', $data);
	}*/

	public function hapusSlider($id_slider)
	{
		$this->db->where('id_slider', $id_slider);
		$this->db->delete('tbl_slider');
	}

	public function hapusBanner($id_banner)
	{
		$this->db->where('id_banner', $id_banner);
		$this->db->delete('tbl_banner');
	}

	public function getAllMember($aktif)
	{
		return $this->db->select('a.username,a.id_anggota as id_member,a.email,a.aktif,a.lengkap,a.confirm,a.MasterID,a.id_referal,a.tanggal,b.*')
					->from('tbl_anggota a')
					->join('tbl_detail_anggota b','a.id_anggota = b.id_anggota','left')
					->where('aktif',$aktif)
					->order_by('tanggal','desc')
					->get()
					->result_array();
	}

	public function getAllHalaman()
	{
		return $this->db->select('*')
						->from('tbl_halaman')
						->get()
						->result_array();
	}

	public function getBerita($limit)
	{
		return $this->db->select('*')
						->from('tbl_berita')
						->limit($limit)
						->order_by('tanggal','desc')
						->get()
						->result_array();
	}
	public function getAllBerita()
	{
		return $this->db->select('*')
						->from('tbl_berita')
						->get()
						->result_array();
	}

	public function getHalamanByID($id_halaman)
	{
		return $this->db->select('*')
						->from('tbl_halaman')
						->where('id_halaman',$id_halaman)
						->get()
						->row();
	}

	public function getBeritaByID($id_berita)
	{
		return $this->db->select('*')
						->from('tbl_berita')
						->where('id_berita',$id_berita)
						->get()
						->row();
	}

	public function getWebsiteByID($id_website)
	{
		return $this->db->select('*')
						->from('tbl_website')
						->where('id_website',$id_website)
						->get()
						->row();
	}

	public function updateMID()
	{
		$id_anggota = $this->input->post('id_anggota');
		$data = array(
               'MasterID' => $this->input->post('MasterID')
            );

		$this->db->where('id_anggota', $id_anggota);
		$this->db->update('tbl_anggota', $data); 
	}
	
	public function updatePassword()
	{
		$id_anggota = $this->input->post('id_anggota');
		$data = array(
               'password' => sha1(md5($this->input->post('password')))
            );

		$this->db->where('id_anggota', $id_anggota);
		$this->db->update('tbl_anggota', $data); 
	}


	public function getWebsite()
	{
		return $this->db->select('*')
						->from('tbl_website')
						->get()
						->result_array();	
	}

	public function getLeader()
	{
		return $this->db->select('*')
						->where('id_leader','1')
						->get('tbl_leader',1)
						->row();	
	}

	public function editPassword($id)
	{
		$data = array(
				'password' => sha1(md5($this->input->post('password')))
			);
		$this->db->where('id', $id);
        $this->db->update('tbl_admin', $data);
	}

	public function leader_update($id)
	{
		$filename =  $this->upload->data();
		$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'no_telp' => $this->input->post('no_telp'),
				'pin_bbm' => $this->input->post('pin_bbm'),
				'link_profile' => $this->input->post('link_profile'),
				'alamat' => $this->input->post('alamat'),
				'foto' => $filename['file_name']
			);

		$this->db->where('id_leader', $id);
        $this->db->update('tbl_leader', $data);
	}

	public function insertWebsite($data)
	{
		$this->db->insert('tbl_website', $data); 
	}

	public function getKota()
	{
		return $this->db->select('*')
						->from('tbl_kota')
						->get()
						->result_array();	
	}

	public function getProvinsi()
	{
		return $this->db->select('*')
						->from('tbl_provinsi')
						->get()
						->result_array();	
	}

	// EDIT DAN KELOLA DATABASE HALAMAN 
	public function getHalaman($posisi)
	{
		return $this->db->select('*')
						->from('tbl_halaman')
						->where('posisi',$posisi)
						->get()
						->result_array();	
	}

	public function hapusHalaman($id_halaman)
	{
		$this->db->where('id_halaman', $id_halaman);
		$this->db->delete('tbl_halaman');
	}

	public function hapusBerita($id_berita)
	{
		$this->db->where('id_berita', $id_berita);
		$this->db->delete('tbl_berita');
	}

	public function hapusWebsite($id_website)
	{
		$this->db->where('id_website', $id_website);
		$this->db->delete('tbl_website');
	}

	public function editHalaman($id_halaman)
	{
		$data = array(
					'judul_halaman' => $this->input->post('judul_halaman'),
					'permalink' => $this->input->post('permalink'),
					'posisi' => $this->input->post('posisi'),
					'isi' => $this->input->post('isi')
				);
		$this->db->where('id_halaman', $id_halaman);
        $this->db->update('tbl_halaman', $data);
	}

	public function editBerita($id_berita)
	{
		$data = array(
					'judul_berita' => $this->input->post('judul_berita'),
					'permalink' => $this->input->post('permalink'),
					'tanggal' => date('Y-m-d'),
					'isi_berita' => $this->input->post('isi_berita')
				);
		$this->db->where('id_berita', $id_berita);
        $this->db->update('tbl_berita', $data);
	}

	public function editWebsite($id_website)
	{
		$data = array(
					'nama_website' => $this->input->post('nama_website'),
					'link' => $this->input->post('link'),
					'deskripsi' => $this->input->post('deskripsi')
				);
		$this->db->where('id_website', $id_website);
        $this->db->update('tbl_website', $data);
	}

	public function insertHalaman($data)
	{
		$this->db->insert('tbl_halaman', $data); 
	}

	public function insertBerita($data)
	{
		$this->db->insert('tbl_berita', $data); 
	}

	public function getPagesByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get('tbl_halaman', 1);

        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }

    public function getBeritaByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get('tbl_berita', 1);

        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }
}

/* End of file m_setting.php */
/* Location: ./application/models/m_setting.php */