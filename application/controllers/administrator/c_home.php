<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_home extends CI_Controller {

	private $template = "template/admin/v_home";

	public function __construct()
	{
		parent::__construct();
		$this->general->cekAdminLogin();
		$this->load->model('m_setting','setting');
		$this->load->model('m_user','user');
	}
	public function index()
	{
		// Count Member Terbanyak = SELECT count(a.id_anggota) as jumlah_member,a.* FROM tbl_anggota a JOIN tbl_anggota b ON a.id_anggota = b.id_referal GROUP BY a.id_anggota ORDER BY jumlah_member DESC
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_index";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Halaman Utama";
		$tgl1 = date('Y-m-d');
		$tgl2 = date('Y-m-d', strtotime('-6 days', strtotime($tgl1)));
		$this->data['topsponsor'] = $this->setting->getTopSponsor($tgl1,$tgl2);
		$this->data['newmember'] = $this->setting->getNewMember();
		$this->data['memberaktif'] = $this->setting->getMember();
		$this->load->view($this->template, $this->data);
	}

	public function setting()
	{
		$this->data['judul'] = "Setting Administrator ~ PT. Berkat Merdeka Indonesia";
		$this->data['breadcrumb'] = "Profile";
		$this->data['fungsi'] = "Profile Anda";
		$this->data['content'] = "admin_view/content/v_setting";

		if ($this->setting->getLeader() != NULL) {
			$this->data['nama_leader'] = $this->setting->getLeader()->nama_lengkap;
			$this->data['telp_leader'] = $this->setting->getLeader()->no_telp;
			$this->data['bbm_leader'] = $this->setting->getLeader()->pin_bbm;
			$this->data['link_profile'] = $this->setting->getLeader()->link_profile;
			$this->data['alamat_leader'] = $this->setting->getLeader()->alamat;
			$this->data['foto_leader'] = $this->setting->getLeader()->foto;
		}

		$this->load->view($this->template, $this->data);
	}

	public function password_edit()
	{
		$id_admin = $this->session->userdata('id_admin');
		if ($this->input->post('password') == $this->input->post('repassword')) {
			if ($this->input->post('password')) {
				$this->setting->editPassword($id_admin);
				$this->session->set_flashdata('pesansetting', '
										<div class="alert alert-block alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<i class="icon-ok green"></i>
											Password Anda Telah di Update! Terimakasih.
										</div>
									');
				redirect(base_url("administrator/c_home/setting"));

			}
		}else{
				$this->session->set_flashdata('pesansetting', '
										<div class="alert alert-block alert-warning">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<i class="icon-remove red"></i>
											Maaf Password Tidak Sama, Mohon Ulangi Dan Periksa Kembali
										</div>
									');
			redirect(base_url("administrator/c_home/setting"));

		}
	}

	public function edit_leader()
	{
		$config['upload_path'] = './assets/avatars/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);



		if ($this->input->post('nama_lengkap')) {

					if ($_FILES['userfile']['error'] != 4) {
						if ( ! $this->upload->do_upload()){
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('pesansetting', '
																<div class="alert alert-block alert-warning">
																	<button type="button" class="close" data-dismiss="alert">
																		<i class="icon-remove"></i>
																	</button>

																	<i class="icon-remove-sign red"></i>
																	Maaf Foto Anda Tidak Tepat, Mohon Tidak Melebihi 100mb dan maximal lebar 1024 dan tinggi 768
																	<br> Mohon Perhatikan Tipe Foto Bertipe PNG/JPG/GIF, Terimakasih.
																</div>
																');
							redirect(base_url("administrator/c_home/setting"));

						}else{
							$this->setting->leader_update('1');
						}
					}

			$this->session->set_flashdata('pesansetting', '
										<div class="alert alert-block alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<i class="icon-ok green"></i>
											Profile Anda Telah di Update! Terimakasih.
										</div>
									');
			redirect(base_url()."administrator/c_home/setting");
		}
	}

	// Banner
	// ==================================================
	public function kelolaBanner()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_kelolaBanner";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Edit/Hapus Banner";
		$this->data['banner'] = $this->setting->getBanner();
		$this->load->view($this->template, $this->data);
	}

	public function tambahBanner()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_tambahBanner";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Tambah Gambar Banner Baru";

		$config['upload_path'] = './assets/images/banner/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ($this->input->post('judul_banner')) {
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('pesanbanner', '
													<div class="alert alert-block alert-warning">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>

														<i class="icon-remove-sign red"></i>
														Maaf Foto Anda Tidak Tepat, Mohon Tidak Melebihi 100mb dan maximal lebar 1024 dan tinggi 768
														<br> Mohon Perhatikan Tipe Foto Bertipe PNG/JPG/GIF, Terimakasih.
													</div>
													');
			redirect(base_url("administrator/c_home/kelolaBanner"));

			}
			else
			{
				$filename =  $this->upload->data();
			}

			$data = array(
					'judul_banner' => $this->input->post('judul_banner'),
					'link' => $this->input->post('link'),
					'lokasi' => $this->input->post('lokasi'),
					'file' => $filename['file_name']
				);

			$this->setting->insertBanner($data);
			redirect(base_url("administrator/c_home/kelolaBanner"));
		}

		$this->load->view($this->template, $this->data);
	}

	public function hapusBanner($id_banner)
	{
		$this->setting->hapusBanner($id_banner);
		redirect(base_url("administrator/c_home/kelolaBanner"));
	}

	public function editBanner($id_banner = NULL)
	{
		if (empty($id_banner) OR $this->setting->getBannerID($id_banner) == NULL) {
			$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
			$this->data['breadcrumb'] = "Banner";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";
		}else{

			$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
			$this->data['content'] = "admin_view/content/v_editBanner";
			$this->data['breadcrumb'] = "Administrator";
			$this->data['fungsi'] = "Edit Banner";
			$this->data['judul_banner'] = $this->setting->getBannerID($id_banner)->judul_banner;
			$this->data['link'] = $this->setting->getBannerID($id_banner)->link;
			$this->data['lokasi'] = $this->setting->getBannerID($id_banner)->lokasi;
			$this->data['id_banner'] = $this->setting->getBannerID($id_banner)->id_banner;

			$config['upload_path'] = './assets/images/banner/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);



			if ($this->input->post('judul_banner')) {

					if ($_FILES['userfile']['error'] != 4) {
						if ( ! $this->upload->do_upload()){
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('pesanbanner', '
																<div class="alert alert-block alert-warning">
																	<button type="button" class="close" data-dismiss="alert">
																		<i class="icon-remove"></i>
																	</button>

																	<i class="icon-remove-sign red"></i>
																	Maaf Foto Anda Tidak Tepat, Mohon Tidak Melebihi 100mb dan maximal lebar 1024 dan tinggi 768
																	<br> Mohon Perhatikan Tipe Foto Bertipe PNG/JPG/GIF, Terimakasih.
																</div>
																');
							redirect(base_url("administrator/c_home/kelolaBanner"));

						}else{
							$this->setting->editBanner($id_banner);
						}
					}

				$this->session->set_flashdata('pesanbanner', '
											<div class="alert alert-block alert-success">
												<button type="button" class="close" data-dismiss="alert">
													<i class="icon-remove"></i>
												</button>

												<i class="icon-ok green"></i>
												Slider Anda Telah di Update! Terimakasih.
											</div>
										');
			redirect(base_url("administrator/c_home/kelolaBanner"));
			}
		}

			$this->load->view($this->template, $this->data);
	}

	// Website
	// =================================================
	public function kelolaWebsite()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_kelolaWebsite";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Edit/Hapus Website Replika";
		$this->data['website'] = $this->setting->getWebsite();
		$this->load->view($this->template, $this->data);
	}

	public function tambahWebsite()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_tambahWebsite";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Tambah Web Replika Baru";

		if ($this->input->post('nama_website')) {
			$data = array(
					'nama_website' => $this->input->post('nama_website'),
					'deskripsi' => $this->input->post('deskripsi'),
					'link' => $this->input->post('link')
				);
			$this->setting->insertWebsite($data);
			redirect(base_url("administrator/c_home/kelolaWebsite"));
		}

		$this->load->view($this->template, $this->data);
	}

	public function editWebsite($id_website = NULL)
	{
		if (empty($id_website) OR $this->setting->getWebsiteByID($id_website) == NULL) {
			$this->data['judul'] = "Edit Website ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Website";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";
		}else{

			$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
			$this->data['content'] = "admin_view/content/v_editWebsite";
			$this->data['breadcrumb'] = "Administrator";
			$this->data['fungsi'] = "Edit Web Replika";

			$this->data['id_website'] = $this->setting->getWebsiteByID($id_website)->id_website;
			$this->data['nama_website'] = $this->setting->getWebsiteByID($id_website)->nama_website;
			$this->data['link'] = $this->setting->getWebsiteByID($id_website)->link;
			$this->data['deskripsi'] = $this->setting->getWebsiteByID($id_website)->deskripsi;

			if ($this->input->post('nama_website')) {
				$this->setting->editWebsite($id_website);
				redirect(base_url("administrator/c_home/kelolaWebsite"));
			}
		}

			$this->load->view($this->template, $this->data);
	}

	public function hapusWebsite($id_website)
	{
		$this->setting->hapusWebsite($id_website);
		redirect(base_url("administrator/c_home/kelolaWebsite"));
	}

	// Slider
	//===================================================

	public function kelolaSlider()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_kelolaSlider";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Edit/Hapus Silder";
		$this->data['slide'] = $this->setting->getSlider();
		$this->load->view($this->template, $this->data);
	}

	public function hapusSlider($id_slider)
	{
		$this->setting->hapusSlider($id_slider);
		redirect(base_url("administrator/c_home/kelolaSlider"));
	}

	public function editSlider($id_slider = NULL)
	{
		if (empty($id_slider) OR $this->setting->getSliderID($id_slider) == NULL) {
			$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
			$this->data['breadcrumb'] = "Slider";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";
		}else{

			$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
			$this->data['content'] = "admin_view/content/v_editSlider";
			$this->data['breadcrumb'] = "Administrator";
			$this->data['fungsi'] = "Tambah Halaman Baru";
			$this->data['judul_slider'] = $this->setting->getSliderID($id_slider)->judul_slider;
			$this->data['id_slider'] = $this->setting->getSliderID($id_slider)->id_slider;

			$config['upload_path'] = './assets/images/slider/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);



			if ($this->input->post('judul_slider')) {

					if ($_FILES['userfile']['error'] != 4) {
						if ( ! $this->upload->do_upload()){
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('pesanslider', '
																<div class="alert alert-block alert-warning">
																	<button type="button" class="close" data-dismiss="alert">
																		<i class="icon-remove"></i>
																	</button>

																	<i class="icon-remove-sign red"></i>
																	Maaf Foto Anda Tidak Tepat, Mohon Tidak Melebihi 100mb dan maximal lebar 1024 dan tinggi 768
																	<br> Mohon Perhatikan Tipe Foto Bertipe PNG/JPG/GIF, Terimakasih.
																</div>
																');
							redirect(base_url("administrator/c_home/kelolaSlider"));

						}else{
							$this->setting->editSlider($id_slider);
						}
					}

				$this->session->set_flashdata('pesanslider', '
											<div class="alert alert-block alert-success">
												<button type="button" class="close" data-dismiss="alert">
													<i class="icon-remove"></i>
												</button>

												<i class="icon-ok green"></i>
												Slider Anda Telah di Update! Terimakasih.
											</div>
										');
			redirect(base_url("administrator/c_home/kelolaSlider"));
			}
		}

			$this->load->view($this->template, $this->data);
	}

	public function tambahSlider()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_tambahSlider";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Tambah Gambar Slide Baru";

		$config['upload_path'] = './assets/images/slider/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ($this->input->post('judul_slider')) {
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('pesanslider', '
													<div class="alert alert-block alert-warning">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>

														<i class="icon-remove-sign red"></i>
														Maaf Foto Anda Tidak Tepat, Mohon Tidak Melebihi 100mb dan maximal lebar 1024 dan tinggi 768
														<br> Mohon Perhatikan Tipe Foto Bertipe PNG/JPG/GIF, Terimakasih.
													</div>
													');
			redirect(base_url("administrator/c_home/kelolaSlider"));

			}
			else
			{
				$filename =  $this->upload->data();
			}

			$data = array(
					'judul_slider' => $this->input->post('judul_slider'),
					'file' => $filename['file_name']
				);

			$this->setting->insertSlider($data);
			redirect(base_url("administrator/c_home/kelolaSlider"));
		}

		$this->load->view($this->template, $this->data);
	}



	// Berita
	// ==================================================
	public function kelolaBerita()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_kelolaBerita";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Edit/Hapus Berita";
		$this->data['berita'] = $this->setting->getAllBerita();
		$this->load->view($this->template, $this->data);
	}

	public function tambahBerita()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_tambahBerita";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Tambah Berita Baru";

		if ($this->input->post('judul_berita')) {
			$data = array(
					'judul_berita' => $this->input->post('judul_berita'),
					'permalink' => $this->input->post('permalink'),
					'tanggal' => date('Y-m-d'),
					'isi_berita' => $this->input->post('isi_berita')
				);
			$this->setting->insertBerita($data);
			redirect(base_url("administrator/c_home/kelolaBerita"));
		}

		$this->load->view($this->template, $this->data);
	}

	public function editBerita($id_berita = NULL)
	{
		if (empty($id_berita) OR $this->setting->getBeritaByID($id_berita) == NULL) {
			$this->data['judul'] = "Edit Berita ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Edit Berita";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";
		}else{

			$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
			$this->data['content'] = "admin_view/content/v_editBerita";
			$this->data['breadcrumb'] = "Administrator";
			$this->data['fungsi'] = "Edit Berita Baru";

			$this->data['id_berita'] = $this->setting->getBeritaByID($id_berita)->id_berita;
			$this->data['judul_berita'] = $this->setting->getBeritaByID($id_berita)->judul_berita;
			$this->data['permalink'] = $this->setting->getBeritaByID($id_berita)->permalink;
			$this->data['tanggal'] = $this->setting->getBeritaByID($id_berita)->tanggal;
			$this->data['isi_berita'] = $this->setting->getBeritaByID($id_berita)->isi_berita;

			if ($this->input->post('judul_berita')) {
				$this->setting->editBerita($id_berita);
				redirect(base_url("administrator/c_home/kelolaBerita"));
			}
		}

			$this->load->view($this->template, $this->data);
	}

	public function hapusBerita($id_berita)
	{
		$this->setting->hapusBerita($id_berita);
		redirect(base_url("administrator/c_home/kelolaBerita"));
	}

	// Halaman
	// ==================================================
	public function kelolaHalaman()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_kelolaHalaman";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Edit/Hapus Halaman";
		$this->data['halaman'] = $this->setting->getAllHalaman();
		$this->load->view($this->template, $this->data);
	}

	public function tambahHalaman()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_tambahHalaman";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Tambah Halaman Baru";

		if ($this->input->post('judul_halaman')) {
			$data = array(
					'judul_halaman' => $this->input->post('judul_halaman'),
					'permalink' => $this->input->post('permalink'),
					'posisi' => $this->input->post('posisi'),
					'isi' => $this->input->post('isi')
				);
			$this->setting->insertHalaman($data);
			redirect(base_url("administrator/c_home/kelolaHalaman"));
		}

		$this->load->view($this->template, $this->data);
	}

	public function editHalaman($id_halaman = NULL)
	{
		if (empty($id_halaman) OR $this->setting->getHalamanByID($id_halaman) == NULL) {
			$this->data['judul'] = "Edit Halaman ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Edit Halaman";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";
		}else{

			$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
			$this->data['content'] = "admin_view/content/v_editHalaman";
			$this->data['breadcrumb'] = "Administrator";
			$this->data['fungsi'] = "Edit Halaman";

			$this->data['id_halaman'] = $this->setting->getHalamanByID($id_halaman)->id_halaman;
			$this->data['judul_halaman'] = $this->setting->getHalamanByID($id_halaman)->judul_halaman;
			$this->data['permalink'] = $this->setting->getHalamanByID($id_halaman)->permalink;
			$this->data['posisi'] = $this->setting->getHalamanByID($id_halaman)->posisi;
			$this->data['isi'] = $this->setting->getHalamanByID($id_halaman)->isi;

			if ($this->input->post('judul_halaman')) {
				$this->setting->editHalaman($id_halaman);
				redirect(base_url("administrator/c_home/kelolaHalaman"));
			}
		}

			$this->load->view($this->template, $this->data);
	}

	public function hapusHalaman($id_halaman)
	{
		$this->setting->hapusHalaman($id_halaman);
		redirect(base_url("administrator/c_home/kelolaHalaman"));
	}

	// Profile And Member
	// ====================================================
	public function aktifasiMember()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_aktifasi";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Aktifasi/Approved Member";
		$aktif = "0";
		$this->data['member'] = $this->setting->getAllMember($aktif);

		$this->load->view($this->template, $this->data);
	}

	public function kelolaMember()
	{
		$this->data['judul'] = "Halaman Administrator BMI Tiger Group ~ Member Of PT. Berka Merdeka Indonesia";
		$this->data['content'] = "admin_view/content/v_kelolaMember";
		$this->data['breadcrumb'] = "Administrator";
		$this->data['fungsi'] = "Edit/Hapus Member Yang Aktif";
		$aktif = "1";
		$this->data['member'] = $this->setting->getAllMember($aktif);
		$this->load->view($this->template, $this->data);
	}

	public function updateMasterID()
	{
		if ($this->input->post('MasterID')) {
			$this->setting->updateMID();
			redirect(base_url()."administrator/c_home/kelolaMember");
		}
	}
	
	public function updatePassword()
	{
		if ($this->input->post('password')) {
			$this->setting->updatePassword();
			redirect(base_url()."administrator/c_home/kelolaMember");
		}
	}

	public function confirm($id_anggota)
	{
		$this->user->konfirmasiuser($id_anggota);
		$this->session->set_flashdata('pesanconfirm', '
													<div class="alert alert-block alert-success">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>

														<i class="icon-ok green"></i>
														Calon Member Telah Di Konfirmasi, Silahkan Hubungi Upline Member Tersebut.
													</div>
												');
		redirect(base_url()."administrator/c_home/aktifasiMember");
	}

	public function approve($id_anggota)
	{
		$this->user->approveuser($id_anggota);
		//------- Send Confirmation Email------------------//
					
					$email = $this->user->berdasarkankode($id_anggota )->email;
					$this->data['datausername'] = $this->user->berdasarkankode($id_anggota )->username;
					$this->data['nama_lengkap_user'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
					$this->data['dataemail'] = $this->user->berdasarkankode($id_anggota )->email;
					$koderef= $this->user->berdasarkankode($id_anggota )->id_referal;
					$this->data['namasponsor'] = $this->user->getDetailUser($koderef)->nama_lengkap;
					$this->data['email'] = $this->user->getDetailUser($koderef)->email;
					$this->data['nohp'] = $this->user->getDetailUser($koderef)->no_telp;
					$this->data['website'] = $this->setting->getWebsite();
					
			                $this->load->library('email');
			                $config['protocol'] = 'mail';
			                /*$config['smtp_host'] = 'iix11.sharehostserver.com';
			                $config['smtp_user'] = 'noreply@bmi-eksekutif.com';
			                $config['smtp_pass'] = 'noreply123';*/
			                $config['mailtype'] = 'html';
			                $this->email->initialize($config);
		
			                $this->email->to($email);
			                $this->email->from("noreply@bmi-eksekutif.com");
			                $this->email->subject('Account Approved.');
			                $message = '';
			                
			                $message .= $this->load->view('email/v_approve_ok', $this->data, TRUE);
		
			                $this->email->message($message);
			                $this->email->send();
					
			                //------- Send Confirmation Email------------------//
		$this->session->set_flashdata('pesanconfirm', '
													<div class="alert alert-block alert-success">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>

														<i class="icon-ok green"></i>
														Calon Member Telah Di Approved (Telah Memenuhi Administrasi), Dan Resmi Menjadi Anggota BMI Group, Silahkan Update Master ID Pada Halaman Kelola Member.
													</div>
												');
		redirect(base_url()."administrator/c_home/aktifasiMember");
	}

	public function reject($id_anggota)
	{
		$this->user->rejectuser($id_anggota);
		$this->session->set_flashdata('pesanconfirm', '
													<div class="alert alert-block alert-important">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>

														<i class="icon-remove red"></i>
														Member Ini Telah Di Reject/Di Tolak Untuk Menjadi Member BMI Group.
													</div>
												');
		redirect(base_url()."administrator/c_home/aktifasiMember");
	}

	public function delete($id_anggota)
	{
		$this->user->deleteuser($id_anggota);
		$this->session->set_flashdata('pesanconfirm', '
													<div class="alert alert-block alert-important">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>

														<i class="icon-ok remove"></i>
														Member Ini Telah Di Hapus Dari Member BMI Group.
													</div>
												');
		redirect(base_url()."administrator/c_home/aktifasiMember");
	}

	public function viewuser($id_anggota = NULL)
	{
		if (empty($id_anggota) OR $this->user->getDetailUser($id_anggota) == NULL) {
			$this->data['judul'] = "View User ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Detail Profile";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";

		}else{
			$this->data['judul'] = "View User ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Detail Profile";
			$this->data['fungsi'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
			$this->data['content'] = "admin_view/content/v_viewuser";
			$this->data['member_aktif'] = $this->user->countMember($id_anggota,'1','1')->jumlah_member;
			$this->data['member_lengkap'] = $this->user->countMember($id_anggota,'0','1')->jumlah_member;
			$this->data['calon_member'] = $this->user->countMember($id_anggota,'0','0')->jumlah_member;


			if ($this->user->getDetailUser($id_anggota) != NULL) {
				$this->data['namauser'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
				$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
				$this->data['tanggal'] = $this->user->getDetailUser($id_anggota)->tanggal;
				$this->data['tempat_lahir'] = $this->user->getDetailUser($id_anggota)->tempat_lahir;
				$this->data['no_identitas'] = $this->user->getDetailUser($id_anggota)->no_identitas;
				$this->data['tanggal_lahir'] = $this->user->getDetailUser($id_anggota)->tanggal_lahir;
				$this->data['jenis_kelamin'] = $this->user->getDetailUser($id_anggota)->jenis_kelamin;
				$this->data['agama'] = $this->user->getDetailUser($id_anggota)->agama;
				$this->data['alamat'] = $this->user->getDetailUser($id_anggota)->alamat;
				$this->data['id_kota'] = $this->user->getDetailUser($id_anggota)->id_kota;
				$this->data['kota'] = $this->user->getDetailUser($id_anggota)->nama_kota;
				$this->data['id_provinsi'] = $this->user->getDetailUser($id_anggota)->id_provinsi;
				$this->data['provinsi'] = $this->user->getDetailUser($id_anggota)->nama_provinsi;
				$this->data['kode_pos'] = $this->user->getDetailUser($id_anggota)->kode_pos;
				$this->data['no_telp'] = $this->user->getDetailUser($id_anggota)->no_telp;
				$this->data['email'] = $this->user->getDetailUser($id_anggota)->email;
				$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
				
				$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;
				$aktif = $this->user->getDetailUser($id_anggota)->aktif;
				$this->data['statususer'] = $this->user->getDetailUser($id_anggota)->aktif;
				$this->data['status'] = $this->user->getDetailUser($id_anggota)->aktif;
				$this->data['fotouser'] = $this->user->getDetailUser($id_anggota)->foto;
				$this->data['foto'] = $this->user->getDetailUser($id_anggota)->foto;
				$kodesponsor = $this->user->getDetailUser($id_anggota)->id_referal;
			}

				$this->data['member'] = $this->user->getMember($id_anggota);
				$this->data['judul_testi'] = $this->user->getTestimoni($id_anggota)->judul_testi;
				$this->data['isi'] = $this->user->getTestimoni($id_anggota)->isi;

			if ($lengkap == 0) {
				redirect('user/c_dashboard/lengkapi');
			}
		}

		$this->load->view($this->template, $this->data);
	}

	public function editprofile($id_anggota = NULL)
	{
		if (empty($id_anggota) OR $this->user->getDetailUser($id_anggota) == NULL) {
			$this->data['judul'] = "Edit Profile ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Ubah Profile";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";

		}else{

			$this->data['judul'] = "Profile Member ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Ubah Profile";
			$this->data['fungsi'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
			$this->data['content'] = "admin_view/content/v_editprofile";

			$this->data['kotaall'] = $this->setting->getKota();
			$this->data['provinsiall'] = $this->setting->getProvinsi();

			if ($this->user->getDetailUser($id_anggota) != NULL) {
				$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
				$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
				$this->data['MasterID'] = $this->user->getDetailUser($id_anggota)->MasterID;
				$this->data['tempat_lahir'] = $this->user->getDetailUser($id_anggota)->tempat_lahir;
				$this->data['no_identitas'] = $this->user->getDetailUser($id_anggota)->no_identitas;
				$this->data['tanggal_lahir'] = $this->user->getDetailUser($id_anggota)->tanggal_lahir;
				$this->data['jenis_kelamin'] = $this->user->getDetailUser($id_anggota)->jenis_kelamin;
				$this->data['agama'] = $this->user->getDetailUser($id_anggota)->agama;
				$this->data['alamat'] = $this->user->getDetailUser($id_anggota)->alamat;
				$this->data['id_kota'] = $this->user->getDetailUser($id_anggota)->id_kota;
				$this->data['kota'] = $this->user->getDetailUser($id_anggota)->nama_kota;
				$this->data['id_provinsi'] = $this->user->getDetailUser($id_anggota)->id_provinsi;
				$this->data['provinsi'] = $this->user->getDetailUser($id_anggota)->nama_provinsi;
				$this->data['kode_pos'] = $this->user->getDetailUser($id_anggota)->kode_pos;
				$this->data['no_telp'] = $this->user->getDetailUser($id_anggota)->no_telp;
				$this->data['email'] = $this->user->getDetailUser($id_anggota)->email;
				$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
				
				$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;
				$aktif = $this->user->getDetailUser($id_anggota)->aktif;
				$this->data['status'] = $this->user->getDetailUser($id_anggota)->aktif;
				$this->data['foto'] = $this->user->getDetailUser($id_anggota)->foto;
				$kodesponsor = $this->user->getDetailUser($id_anggota)->id_referal;
			}

			$this->data['judul_testi'] = $this->user->getTestimoni($id_anggota)->judul_testi;
			$this->data['isi'] = $this->user->getTestimoni($id_anggota)->isi;

			$this->data['nama_ibu_kandung'] = $this->user->getAdditionalDetail($id_anggota)->nama_ibu_kandung;
			$this->data['nama_ahli_waris'] = $this->user->getAdditionalDetail($id_anggota)->nama_ahli_waris;
			$this->data['hubungan'] = $this->user->getAdditionalDetail($id_anggota)->hubungan;
			$this->data['npwp'] = $this->user->getAdditionalDetail($id_anggota)->npwp;
			// Info Bank
			$this->data['nama_bank'] = $this->user->getAdditionalDetail($id_anggota)->nama_bank;
			$this->data['cabang'] = $this->user->getAdditionalDetail($id_anggota)->cabang;
			$this->data['nama_pemilik'] = $this->user->getAdditionalDetail($id_anggota)->nama_pemilik;
			$this->data['no_rek'] = $this->user->getAdditionalDetail($id_anggota)->no_rek;

			if ($lengkap == 0) {
				redirect('user/c_dashboard/lengkapi');
			}

			$this->data['member'] = $this->user->getMember($id_anggota);
			$this->data['newmember'] = $this->user->getNewMember($id_anggota);

			// Let's Do IT Here!
		}

		$this->load->view($this->template, $this->data);
	}

	// Profile Edited Proses!
	public function profile_edit()
	{

		$config['upload_path'] = './assets/avatars/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ($this->input->post('nama_lengkap')) {
			$id_anggota = $this->input->post('id_anggota');
			if ($this->user->profile_update($id_anggota)) {
				if ($_FILES['userfile']['error'] != 4) {
					if ( ! $this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('pesanupdate', '
															<div class="alert alert-block alert-warning">
																<button type="button" class="close" data-dismiss="alert">
																	<i class="icon-remove"></i>
																</button>

																<i class="icon-remove-sign red"></i>
																Maaf Foto Anda Tidak Tepat, Mohon Tidak Melebihi 100mb dan maximal lebar 1024 dan tinggi 768
																<br> Mohon Perhatikan Tipe Foto Bertipe PNG/JPG/GIF, Terimakasih.
															</div>
															');
						redirect(base_url()."administrator/c_home/editprofile/".$id_anggota);

					}else{
						$this->user->update_avatar($id_anggota);
					}
				}
			}

			$this->session->set_flashdata('pesanupdate', '
										<div class="alert alert-block alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<i class="icon-ok green"></i>
											Profile Anda Telah di Update! Terimakasih.
										</div>
									');
			redirect(base_url()."administrator/c_home/editprofile/".$id_anggota);
		}
	}

	public function additional_edit()
	{
		$id_anggota = $this->input->post('id_anggota');
		$dtnama_ibu_kandung = $this->user->getAdditionalDetail($id_anggota)->nama_ibu_kandung;

		// INPUT POST!
		$nama_ibu_kandung = $this->input->post('nama_ibu_kandung');
		$nama_ahli_waris = $this->input->post('nama_ahli_waris');
		$hubungan = $this->input->post('hubungan');
		$npwp = $this->input->post('npwp');


		if ($this->input->post('nama_ibu_kandung')) {
			if ($dtnama_ibu_kandung == NULL) {
				$data = array(
						'id_anggota' => $id_anggota,
						'nama_ibu_kandung' => $nama_ibu_kandung,
						'nama_ahli_waris' => $nama_ahli_waris,
						'hubungan' => $hubungan,
						'npwp' => $npwp
					);

				$this->user->insertAdditional($data);
			}else{
				$this->user->updateAdditional($id_anggota);
			}
		}

		$this->session->set_flashdata('pesanupdate', '
										<div class="alert alert-block alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<i class="icon-ok green"></i>
											Informasi Tambahan Anda Telah di Update! Terimakasih.
										</div>
									');
		redirect(base_url()."administrator/c_home/editprofile/".$id_anggota);	
	}

	public function bank_edit()
	{
		$id_anggota = $this->input->post('id_anggota');
		$dtnama_bank = $this->user->getAdditionalDetail($id_anggota)->nama_bank;

		// INPUT POST!
		$nama_bank = $this->input->post('nama_bank');
		$cabang = $this->input->post('cabang');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$no_rek = $this->input->post('no_rek');



		if ($this->input->post('nama_bank')) {
			if ($dtnama_bank == NULL) {
				$data = array(
						'id_anggota' => $id_anggota,
						'nama_bank' => $nama_bank,
						'cabang' => $cabang,
						'nama_pemilik' => $nama_pemilik,
						'no_rek' => $no_rek
					);

				$this->user->insertBank($data);
			}else{
				$this->user->updateBank($id_anggota);
			}
		}

		$this->session->set_flashdata('pesanupdate', '
										<div class="alert alert-block alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<i class="icon-ok green"></i>
											Informasi Bank Anda Telah di Update! Terimakasih.
										</div>
									');
		redirect(base_url()."administrator/c_home/editprofile/".$id_anggota);	
	}

	public function testimoni_edit()
	{
		
		$id_anggota = $this->input->post('id_anggota');
		$dttesti = $this->user->getTestimoni($id_anggota)->judul_testi;

		// INPUT POST!
		$judul_testi = $this->input->post('judul_testi');
		$isi = $this->input->post('isi');

		

		if ($this->input->post('judul_testi')) {
			if ($dttesti == NULL) {
				$data = array(
						'id_anggota' => $id_anggota,
						'judul_testi' => $judul_testi,
						'isi' => $isi
					);

				$this->user->insertTesti($data);
			}else{
				$this->user->updateTesti($id_anggota);
			}
		}

		$this->session->set_flashdata('pesanupdate', '
										<div class="alert alert-block alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<i class="icon-ok green"></i>
											Terimakasih Telah Memberikan Testimoni Kepada Kami, Kami Akan Terus Menjadi Yang Terbaik atas Aspirasi Anda.
										</div>
									');
		redirect(base_url()."administrator/c_home/editprofile/".$id_anggota);	
	}

}

/* End of file c_home.php */
/* Location: ./application/controllers/administrator/c_home.php */