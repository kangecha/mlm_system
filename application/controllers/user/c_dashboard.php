<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	private $template = "template/user/v_dashboard";

	public function __construct()
	{
		parent::__construct();
		$this->general->cekUserLogin();
		$this->load->model('m_user','user');
		$this->load->model('m_setting','setting');
		$this->data['banner'] = $this->setting->getBannerByLokasi('dashboard');

	}

	public function index()
	{
		$this->data['content'] = "user_view/content/v_index";
		$this->data['judul'] = "Dashboard Member PT. Berkat Merdeka Indonesia";
		$this->data['breadcrumb'] = "Dashboard";
		$this->data['fungsi'] = "Halaman Utama";
		$id_anggota = $this->session->userdata('id_anggota_login');
		if ($this->user->getDetailUser($id_anggota) != NULL) {
			$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
			$this->data['email'] = $this->user->getDetailUser($id_anggota)->email;
			$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
			$this->data['masterID'] = $this->user->getDetailUser($id_anggota)->MasterID;
			
			$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;
			$aktif = $this->user->getDetailUser($id_anggota)->aktif;
			$this->data['status'] = $this->user->getDetailUser($id_anggota)->aktif;
			$this->data['foto'] = $this->user->getDetailUser($id_anggota)->foto;
			$kodesponsor = $this->user->getDetailUser($id_anggota)->id_referal;
		}

			$this->data['member'] = $this->user->getMember($id_anggota);
			$this->data['newmember'] = $this->user->getNewMember($id_anggota);
		if ($aktif != '0') {
			$this->data['page_dashboard'] = "Selamat Datang Sdr/i. <strong>~".$this->user->getDetailUser($id_anggota)->nama_lengkap."</strong><br>".$this->setting->getPagesByPermalink('dashboard-member-aktif')->isi;
		}else{
			$this->data['page_dashboard'] = "Mohon Maaf Sdr/i. <strong>~".$this->user->getDetailUser($id_anggota)->nama_lengkap."</strong><br>".$this->setting->getPagesByPermalink('dashboard-member-belum-aktif')->isi;
		}

		if ($this->user->getDetailSponsor($kodesponsor) != NULL) {
			$this->data['fotosponsor'] = $this->user->getDetailSponsor($kodesponsor)->foto;
			$this->data['namasponsor'] = $this->user->getDetailSponsor($kodesponsor)->nama_lengkap;
			$this->data['emailsponsor'] = $this->user->getDetailSponsor($kodesponsor)->email;
			$this->data['nohpsponsor'] = $this->user->getDetailSponsor($kodesponsor)->no_telp;
			$this->data['kotasponsor'] = $this->user->getDetailSponsor($kodesponsor)->nama_kota;
			$this->data['provinsisponsor'] = $this->user->getDetailSponsor($kodesponsor)->nama_provinsi;
		}

		if ($this->setting->getLeader() != NULL) {
			$this->data['nama_leader'] = $this->setting->getLeader()->nama_lengkap;
			$this->data['telp_leader'] = $this->setting->getLeader()->no_telp;
			$this->data['bbm_leader'] = $this->setting->getLeader()->pin_bbm;
			$this->data['link_profile'] = $this->setting->getLeader()->link_profile;
			$this->data['alamat_leader'] = $this->setting->getLeader()->alamat;
			$this->data['foto_leader'] = $this->setting->getLeader()->foto;
		}

		if ($this->setting->getWebsite() != NULL) {
			$this->data['website'] = $this->setting->getWebsite();
		}

		if ($lengkap == 0) {
			redirect('user/c_dashboard/lengkapi');
		}
			if ($aktif == 1) {
				$this->session->set_flashdata('pesan', 'Selamat Datang di Dashboard Member <strong>PT. Berkat Merdeka Indonesia</strong>');
			}else{
				$this->session->set_flashdata('pesan', 'Terimakasih Telah Bergabung di <strong>PT. Berkat Merdeka Indonesia</strong><br>
												Status Anda Saat Ini <span class="red">TIDAK AKTIF</span> Silahkan Hubungi <a href="#">Sponsor</a> Anda
												<br> Dan Dapatkan 6 Website Replika GRATIS! Sekarang Juga.
												');
			}
			$this->load->view($this->template, $this->data);
		
		
	}

	public function setting()
	{
		$this->data['content'] = "user_view/content/v_setting";
		$this->data['judul'] = "Dashboard Member PT. Berkat Merdeka Indonesia";
		$this->data['breadcrumb'] = "Dashboard";
		$this->data['fungsi'] = "Setiing";
		$id_anggota = $this->session->userdata('id_anggota_login');
		if ($this->user->getDetailUser($id_anggota) != NULL) {
			$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
			$this->data['email'] = $this->user->getDetailUser($id_anggota)->email;
			$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
			$this->data['masterID'] = $this->user->getDetailUser($id_anggota)->MasterID;
			
			$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;
			$aktif = $this->user->getDetailUser($id_anggota)->aktif;
			$this->data['status'] = $this->user->getDetailUser($id_anggota)->aktif;
			$this->data['foto'] = $this->user->getDetailUser($id_anggota)->foto;
			$kodesponsor = $this->user->getDetailUser($id_anggota)->id_referal;
		}

		$this->load->view($this->template, $this->data);

	}

	public function edit_password()
	{
		$id_anggota = $this->session->userdata('id_anggota_login');
		if ($this->input->post('email')) {
			$this->user->editEmail($id_anggota);
				$this->session->set_flashdata('pesansetting', '
										<div class="alert alert-block alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="icon-remove"></i>
											</button>

											<i class="icon-ok green"></i>
											Email Anda Telah di Update! Terimakasih.
										</div>
									');

			if ($this->input->post('password') == $this->input->post('repassword')) {
				if ($this->input->post('password')) {
					$this->user->editPassword($id_anggota);
					$this->session->set_flashdata('pesansetting', '
											<div class="alert alert-block alert-success">
												<button type="button" class="close" data-dismiss="alert">
													<i class="icon-remove"></i>
												</button>

												<i class="icon-ok green"></i>
												Password Anda Telah di Update! Terimakasih.
											</div>
										');
					redirect(base_url("user/c_dashboard/setting"));

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
				redirect(base_url("user/c_dashboard/setting"));
					
			}
		}

				redirect(base_url("user/c_dashboard/setting"));
	}

	public function MemberPages($permalink)
	{
		if (empty($permalink) OR $this->setting->getPagesByPermalink($permalink) == NULL) {
			$this->data['judul'] = "Page Not Found! ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Halaman";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";
			$id_anggota = $this->session->userdata('id_anggota_login');
				if ($this->user->getDetailUser($id_anggota) != NULL) {
					$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
					$this->data['email'] = $this->user->getDetailUser($id_anggota)->email;
					$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
					
					$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;
					$aktif = $this->user->getDetailUser($id_anggota)->aktif;
					$this->data['status'] = $this->user->getDetailUser($id_anggota)->aktif;
					$this->data['foto'] = $this->user->getDetailUser($id_anggota)->foto;
					$kodesponsor = $this->user->getDetailUser($id_anggota)->id_referal;
				}

		}else{
				$this->data['judul_halaman'] = $this->setting->getPagesByPermalink($permalink)->judul_halaman;
				$this->data['isi'] = $this->setting->getPagesByPermalink($permalink)->isi;

				$this->data['judul'] = $this->data['judul_halaman']."~ PT. Berkat Merdeka Indonesia";
				$this->data['breadcrumb'] = "Halaman";
				$this->data['fungsi'] = $this->data['judul_halaman'];
				$this->data['content'] = "user_view/content/v_pages";
				$id_anggota = $this->session->userdata('id_anggota_login');
				if ($this->user->getDetailUser($id_anggota) != NULL) {
					$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
					$this->data['email'] = $this->user->getDetailUser($id_anggota)->email;
					$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
					
					$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;
					$aktif = $this->user->getDetailUser($id_anggota)->aktif;
					$this->data['status'] = $this->user->getDetailUser($id_anggota)->aktif;
					$this->data['foto'] = $this->user->getDetailUser($id_anggota)->foto;
					$kodesponsor = $this->user->getDetailUser($id_anggota)->id_referal;
				}

				if ($lengkap == 0) {
					redirect('user/c_dashboard/lengkapi');
				}
			}

			$this->load->view($this->template, $this->data);
	}

	public function lengkapi()
	{
		$this->data['judul'] = "Lengkapi Data Member ~ PT. Berkat Merdeka Indonesia";
		$this->data['breadcrumb'] = "Lengkapi Data";
		$this->data['fungsi'] = "Kelengkapan Data dan Validasi";
		$this->data['content'] = "user_view/content/v_lengkapi";
		$id_anggota = $this->session->userdata('id_anggota_login');
		$this->data['nama'] = $this->user->berdasarkankode($id_anggota)->username;
		$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;

		if ($lengkap == 1) {
			redirect('user/c_dashboard/profile');
		}


		$this->data['kota'] = $this->setting->getKota();
		$this->data['provinsi'] = $this->setting->getProvinsi();

		$nama_lengkap = strip_tags($this->input->post('nama_lengkap'));
		$this->data['nama_lengkap_user'] = $nama_lengkap;
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

		$config['upload_path'] = './assets/avatars/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);



		if ($this->input->post('nama_lengkap')) {

			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('pesan', '
													<div class="alert alert-block alert-warning">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>

														<i class="icon-remove-sign red"></i>
														Maaf Foto Anda Tidak Tepat, Mohon Tidak Melebihi 100mb dan maximal lebar 1024 dan tinggi 768
														<br> Mohon Perhatikan Tipe Foto Bertipe PNG/JPG/GIF, Terimakasih.
													</div>
													');
				redirect(base_url()."user/c_dashboard/lengkapi");

			}
			else
			{
				$filename =  $this->upload->data();
			}
						$data = array(
					   'id_anggota' => $id_anggota ,
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
					   'foto' => $filename['file_name']
					);
			
			$this->user->lengkapidata($data);
			$this->user->lengkap($id_anggota);
					//------- Send Confirmation Email------------------//
					
					$email = $this->user->berdasarkankode($id_anggota )->email;
					$this->data['datausername'] = $this->user->berdasarkankode($id_anggota )->username;
					$this->data['dataemail'] = $this->user->berdasarkankode($id_anggota )->email;
					$koderef= $this->user->berdasarkankode($id_anggota )->id_referal;
					$this->data['namasponsor'] = $this->user->getDetailUser($koderef)->nama_lengkap;
					$this->data['email'] = $this->user->getDetailUser($koderef)->email;
					$this->data['nohp'] = $this->user->getDetailUser($koderef)->no_telp;
					
			                $this->load->library('email');
			                $config['protocol'] = 'mail';
			                /*$config['smtp_host'] = 'iix11.sharehostserver.com';
			                $config['smtp_user'] = 'noreply@bmi-eksekutif.com';
			                $config['smtp_pass'] = 'noreply123';*/
			                $config['mailtype'] = 'html';
			                $this->email->initialize($config);
		
			                $this->email->to($email);
			                $this->email->from("noreply@bmi-eksekutif.com");
			                $this->email->subject('Data Pribadi Berhasil Di Lengkapi, Satu Langkah Lagi Menuju Sukses.');
			                $message = '';
			                
			                $message .= $this->load->view('email/v_lengkap_ok', $this->data, TRUE);
		
			                $this->email->message($message);
			                $this->email->send();
					
			                //------- Send Confirmation Email------------------//
			$this->session->set_flashdata('pesan', 'Terimakasih Telah Bergabung di <strong>PT. Berkat Merdeka Indonesia</strong><br>
												Status Anda Saat Ini <span class="red">TIDAK AKTIF</span> Silahkan Hubungi <a href="#">Sponsor</a> Anda
												<br> Dan Dapatkan 6 Website Replika GRATIS! Sekarang Juga.
												');
			redirect(base_url()."user/c_dashboard");
		}

		$this->data['foto'] = "avatar2.png";
		

		$this->load->view($this->template, $this->data);
	}

	public function profile()
	{
		$this->data['judul'] = "Profile Member ~ PT. Berkat Merdeka Indonesia";
		$this->data['breadcrumb'] = "Profile";
		$this->data['fungsi'] = "Profile Anda";
		$this->data['content'] = "user_view/content/v_profile";
		$id_anggota = $this->session->userdata('id_anggota_login');

		$this->data['kotaall'] = $this->setting->getKota();
		$this->data['provinsiall'] = $this->setting->getProvinsi();

		if ($this->user->getDetailUser($id_anggota) != NULL) {
			$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
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


		$this->load->view($this->template, $this->data);
	}

	public function profile_edit()
	{
		$id_anggota = $this->session->userdata('id_anggota_login');

		$config['upload_path'] = './assets/avatars/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);



		if ($this->input->post('nama_lengkap')) {

			if ($this->user->profile_update($id_anggota)) {
				if ($_FILES['userfile']['error'] != 4) {
					if ( ! $this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('pesan', '
															<div class="alert alert-block alert-warning">
																<button type="button" class="close" data-dismiss="alert">
																	<i class="icon-remove"></i>
																</button>

																<i class="icon-remove-sign red"></i>
																Maaf Foto Anda Tidak Tepat, Mohon Tidak Melebihi 100mb dan maximal lebar 1024 dan tinggi 768
																<br> Mohon Perhatikan Tipe Foto Bertipe PNG/JPG/GIF, Terimakasih.
															</div>
															');
						redirect(base_url()."user/c_dashboard/profile");

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
			redirect(base_url()."user/c_dashboard/profile");
		}
	}

	public function additional_edit()
	{
		$id_anggota = $this->session->userdata('id_anggota_login');
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
		redirect(base_url()."user/c_dashboard/profile");	
	}

	public function bank_edit()
	{
		$id_anggota = $this->session->userdata('id_anggota_login');
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
		redirect(base_url()."user/c_dashboard/profile");	
	}

	public function testimoni_edit()
	{
		$id_anggota = $this->session->userdata('id_anggota_login');
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
		redirect(base_url()."user/c_dashboard/profile");	
	}

	public function downline()
	{
		

		$this->data['judul'] = "Downline Anda ~ PT. Berkat Merdeka Indonesia";
		$this->data['breadcrumb'] = "Downline";
		$this->data['fungsi'] = "List Downline/Member Anda";
		$this->data['content'] = "user_view/content/v_downline";
		$id_anggota = $this->session->userdata('id_anggota_login');
		if ($this->user->getDetailUser($id_anggota) != NULL) {
			$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
			$this->data['email'] = $this->user->getDetailUser($id_anggota)->email;
			$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
			
			$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;
			$aktif = $this->user->getDetailUser($id_anggota)->aktif;
			$this->data['status'] = $this->user->getDetailUser($id_anggota)->aktif;
			$this->data['foto'] = $this->user->getDetailUser($id_anggota)->foto;
			$kodesponsor = $this->user->getDetailUser($id_anggota)->id_referal;
		}

			$this->data['member'] = $this->user->getMember($id_anggota);

		if ($lengkap == 0) {
			redirect('user/c_dashboard/lengkapi');
		}

		$this->load->view($this->template, $this->data);

	}
	public function newdownline()
	{
		

		$this->data['judul'] = "Calon Downline Anda ~ PT. Berkat Merdeka Indonesia";
		$this->data['breadcrumb'] = "Calon Downline";
		$this->data['fungsi'] = "List Calon Downline/Member Anda";
		$this->data['content'] = "user_view/content/v_newdownline";
		$id_anggota = $this->session->userdata('id_anggota_login');
		if ($this->user->getDetailUser($id_anggota) != NULL) {
			$this->data['nama'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
			$this->data['email'] = $this->user->getDetailUser($id_anggota)->email;
			$this->data['id_anggota'] = $this->user->getDetailUser($id_anggota)->id_anggota;
			
			$lengkap = $this->user->getDetailUser($id_anggota)->lengkap;
			$aktif = $this->user->getDetailUser($id_anggota)->aktif;
			$this->data['status'] = $this->user->getDetailUser($id_anggota)->aktif;
			$this->data['foto'] = $this->user->getDetailUser($id_anggota)->foto;
			$kodesponsor = $this->user->getDetailUser($id_anggota)->id_referal;
		}

			$this->data['member'] = $this->user->getNewMember($id_anggota);

		if ($lengkap == 0) {
			redirect('user/c_dashboard/lengkapi');
		}

		$this->load->view($this->template, $this->data);

	}

	public function viewuser($id_anggota = NULL)
	{
		if (empty($id_anggota) OR $this->user->getDetailUser($id_anggota) == NULL) {
			$this->data['judul'] = "Profile User ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Detail Profile";
			$this->data['fungsi'] = "Not Found!";
			$this->data['content'] = "error_content";
			$id_anggota_login = $this->session->userdata('id_anggota_login');
			$this->data['nama'] = $this->user->getDetailUser($id_anggota_login)->nama_lengkap;
			$this->data['foto'] = $this->user->getDetailUser($id_anggota_login)->foto;

		}else{
			$this->data['judul'] = "Profile User ~ PT. Berkat Merdeka Indonesia";
			$this->data['breadcrumb'] = "Lihat Profile";
			$this->data['fungsi'] = "Detail Profile";
			$this->data['content'] = "user_view/content/v_viewuser";
			$id_anggota_login = $this->session->userdata('id_anggota_login');
			$this->data['member_aktif'] = $this->user->countMember($id_anggota,'1','1')->jumlah_member;
			$this->data['member_lengkap'] = $this->user->countMember($id_anggota,'0','1')->jumlah_member;
			$this->data['calon_member'] = $this->user->countMember($id_anggota,'0','0')->jumlah_member;

			if ($this->user->getDetailUser($id_anggota) != NULL) {
				$this->data['namauser'] = $this->user->getDetailUser($id_anggota)->nama_lengkap;
				$this->data['nama'] = $this->user->getDetailUser($id_anggota_login)->nama_lengkap;
				$this->data['tanggal'] = $this->user->getDetailUser($id_anggota_login)->tanggal;
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
				$this->data['status'] = $this->user->getDetailUser($id_anggota_login)->aktif;
				$this->data['fotouser'] = $this->user->getDetailUser($id_anggota)->foto;
				$this->data['foto'] = $this->user->getDetailUser($id_anggota_login)->foto;
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

	public function confirm($id_anggota)
	{
		$this->user->konfirmasiuser($id_anggota);
		$this->session->set_flashdata('pesan', 'Calon Member Anda Telah Di Konfirmasi, Mohon Bantu Calon Member Anda Mengaktifasi dan Validasi data..
												');
		redirect(base_url()."user/c_dashboard");
	}

}

/* End of file c_dashboard.php */
/* Location: ./application/controllers/user/c_dashboard.php */