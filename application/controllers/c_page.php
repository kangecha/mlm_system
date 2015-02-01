<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','user');
		$this->load->model('m_setting','setting');
		$this->data['sidebar'] = $this->setting->getHalaman('Sidebar');
		$this->data['berita'] = $this->setting->getBerita('10');

	}
	public $view = "view_page";


	public function index($permalink,$ref = NULL)
	{
		$this->view = "view_page";
		$randomuser = $this->user->randomref()->username;
		$randomid = $this->user->randomref()->id_anggota;
		$this->data['banner'] = $this->setting->getBannerByLokasi('depan');

		if ($this->setting->getPagesByPermalink($permalink) == NULL) {
			redirect('NotFound');
		}


		/* Halaman */
			$posisi = "Landing Page";
			$this->data['halaman'] = $this->setting->getHalaman($posisi);
			$this->data['peluang'] = $this->setting->getPagesByPermalink('peluang')->isi;
			$this->data['mengapakami'] = $this->setting->getPagesByPermalink('mengapa-kami')->isi;
			$this->data['presentasibisnis'] = $this->setting->getPagesByPermalink('presentasi-bisnis')->isi;
			$this->data['carakerja'] = $this->setting->getPagesByPermalink('cara-kerja')->isi;

			$this->data['testimoni'] = $this->user->getAllTestimoni();
			$this->data['slider'] = $this->setting->getSlider();
			$this->data['isi_berita'] = $this->setting->getPagesByPermalink($permalink)->isi;
			$this->data['judul_berita'] = $this->setting->getPagesByPermalink($permalink)->judul_halaman;
		/* Halaman */
		if ($ref != NULL) {
			if ($this->user->cariuser($ref)) {
				# code...
				$id_referal = $this->user->berdasarkanuser($ref)->id_anggota;
				$this->session->set_userdata( 'id_referal',$id_referal );
				

				// Deklarasi Variable Untuk di halaman depan
				$this->namasponsor = $this->user->getDetailUser($id_referal)->nama_lengkap;
				$this->kota = $this->user->getDetailUser($id_referal)->nama_kota;
				$this->notlp = $this->user->getDetailUser($id_referal)->no_telp;

				$this->data['namasponsor'] = $this->namasponsor;
				$this->data['username'] = $this->user->getDetailUser($id_referal)->username;
				$this->data['kota'] = $this->kota;
				$this->data['telp'] = $this->notlp;
				
			}else{
				$this->data['error'] = "Error";
				$this->view = "v_ref_salah";
			}
			
		}else{
			if ($this->session->userdata('id_referal') != NULL) {
				# code...
				$cacheid = $this->session->userdata('id_referal');
				// Deklarasi Variable Untuk di halaman depan
				$this->namasponsor = $this->user->getDetailUser($cacheid)->nama_lengkap;
				$this->kota = $this->user->getDetailUser($cacheid)->nama_kota;
				$this->notlp = $this->user->getDetailUser($cacheid)->no_telp;

				$this->data['namasponsor'] = $this->namasponsor;
				$this->data['username'] = $this->user->getDetailUser($cacheid)->username;
				$this->data['kota'] = $this->kota;
				$this->data['telp'] = $this->notlp;	

			}else{
				// Deklarasi Variable Untuk di halaman depan
				$this->session->set_userdata( 'id_referal',$randomid);
								
				$this->namasponsor = $this->user->getDetailUser($randomid)->nama_lengkap;
				$this->username = $this->user->getDetailUser($randomid)->username;
				$this->kota = $this->user->getDetailUser($randomid)->nama_kota;
				$this->notlp = $this->user->getDetailUser($randomid)->no_telp;

				$this->data['namasponsor'] = $this->namasponsor;
				$this->data['username'] = $this->username;
				$this->data['kota'] = $this->kota;
				$this->data['telp'] = $this->notlp;				
			}
		}
		
		$this->load->view($this->view, $this->data);
	}

	public function viewberita($permalink,$ref = NULL)
	{
		$this->view = "view_berita";
		$randomuser = $this->user->randomref()->username;
		$randomid = $this->user->randomref()->id_anggota;
		$this->data['banner'] = $this->setting->getBannerByLokasi('depan');
		if ($this->setting->getBeritaByPermalink($permalink) == NULL) {
			redirect('NotFound');
		}


		/* Halaman */
			$posisi = "Landing Page";
			$this->data['halaman'] = $this->setting->getHalaman($posisi);
			$this->data['peluang'] = $this->setting->getPagesByPermalink('peluang')->isi;
			$this->data['mengapakami'] = $this->setting->getPagesByPermalink('mengapa-kami')->isi;
			$this->data['presentasibisnis'] = $this->setting->getPagesByPermalink('presentasi-bisnis')->isi;
			$this->data['carakerja'] = $this->setting->getPagesByPermalink('cara-kerja')->isi;

			$this->data['testimoni'] = $this->user->getAllTestimoni();
			$this->data['slider'] = $this->setting->getSlider();
			$this->data['isi_berita'] = $this->setting->getBeritaByPermalink($permalink)->isi_berita;
			$this->data['judul_berita'] = $this->setting->getBeritaByPermalink($permalink)->judul_berita;
			$this->data['tanggal'] = $this->setting->getBeritaByPermalink($permalink)->tanggal;
		/* Halaman */
		if ($ref != NULL) {
			if ($this->user->cariuser($ref)) {
				# code...
				$id_referal = $this->user->berdasarkanuser($ref)->id_anggota;
				$this->session->set_userdata( 'id_referal',$id_referal );
				

				// Deklarasi Variable Untuk di halaman depan
				$this->namasponsor = $this->user->getDetailUser($id_referal)->nama_lengkap;
				$this->kota = $this->user->getDetailUser($id_referal)->nama_kota;
				$this->notlp = $this->user->getDetailUser($id_referal)->no_telp;

				$this->data['namasponsor'] = $this->namasponsor;
				$this->data['username'] = $this->user->getDetailUser($id_referal)->username;
				$this->data['kota'] = $this->kota;
				$this->data['telp'] = $this->notlp;
				
			}else{
				$this->data['error'] = "Error";
				$this->view = "v_ref_salah";
			}
			
		}else{
			if ($this->session->userdata('id_referal') != NULL) {
				# code...
				$cacheid = $this->session->userdata('id_referal');
				// Deklarasi Variable Untuk di halaman depan
				$this->namasponsor = $this->user->getDetailUser($cacheid)->nama_lengkap;
				$this->kota = $this->user->getDetailUser($cacheid)->nama_kota;
				$this->notlp = $this->user->getDetailUser($cacheid)->no_telp;

				$this->data['namasponsor'] = $this->namasponsor;
				$this->data['username'] = $this->user->getDetailUser($cacheid)->username;
				$this->data['kota'] = $this->kota;
				$this->data['telp'] = $this->notlp;	

			}else{
				// Deklarasi Variable Untuk di halaman depan
				$this->session->set_userdata( 'id_referal',$randomid);
								
				$this->namasponsor = $this->user->getDetailUser($randomid)->nama_lengkap;
				$this->username = $this->user->getDetailUser($randomid)->username;
				$this->kota = $this->user->getDetailUser($randomid)->nama_kota;
				$this->notlp = $this->user->getDetailUser($randomid)->no_telp;

				$this->data['namasponsor'] = $this->namasponsor;
				$this->data['username'] = $this->username;
				$this->data['kota'] = $this->kota;
				$this->data['telp'] = $this->notlp;				
			}
		}
		
		$this->load->view($this->view, $this->data);
	}

}

/* End of file c_page.php */
/* Location: ./application/controllers/c_page.php */