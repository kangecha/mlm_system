	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>

		<i class="icon-ok green"></i>

		<?php echo $this->session->flashdata('pesan');?>
	</div>

	<div class="space-6"></div>

	
	<div class="row-fluid">
		<div class="span8">
			<div class="widget-box transparent">
				<div class="widget-header widget-header-flat">
					<h4 class="lighter">
						<i class="icon-star orange"></i>
						Informasi Penting!
					</h4>

					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="icon-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						<!-- INFORMASI WEBITE DI SINI -->
						<?php echo $page_dashboard; ?>
					</div><!--/widget-main-->
				</div><!--/widget-body-->
			</div><!--/widget-box-->
		</div>
		<div class="span3">
			<div class="widget-box transparent">
				<div class="widget-header widget-header-flat">
					<h4 class="lighter">
						<i class="icon-info-sign blue"></i>
						Anda Login Sebagai
					</h4>

					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="icon-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="widget-body">
					Username : <?php echo $this->session->userdata('username_login');?><br>
					Email : <?php echo $email;?><br>
					User ID : <?php echo $id_anggota;?><br>
					Master ID : <?php echo $masterID;?><br>
					<h6>*) Gunakan MID (Master ID) Anda Untuk Login Ke <a href="http://bmi-network.co.id" target="_blank">Website BMI Pusat</a></h6>
					<hr>
					<strong>Informasi Sponsor Anda:<br></strong>
					Nama  : <?php echo $namasponsor;?><br>
					Email : <?php echo $emailsponsor;?><br>
					No. Telp : <?php echo $nohpsponsor;?><br>
				</div>
			</div>
		</div>
		
	</div>

	<div class="hr hr32 hr-dotted"></div>

	<div class="row-fluid">
		<div class="span3">
			<div class="widget-box ">
				<div class="widget-header">
					<h4 class="lighter smaller">
						<i class="icon-comment blue"></i>
						Fanpage FB
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						INI TESTING
					</div><!--/widget-main-->
				</div><!--/widget-body-->
			</div><!--/widget-box-->
		</div><!--/span-->

		<div class="span3">
			<div class="widget-box ">
				<div class="widget-header">
					<h4 class="lighter smaller">
						<i class="icon-comment blue"></i>
						Twitter Feeds
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						INI TESTING
					</div><!--/widget-main-->
				</div><!--/widget-body-->
			</div><!--/widget-box-->
		</div><!--/span-->

		<div class="span3">
			<div class="widget-box ">
				<div class="widget-header">
					<h4 class="lighter smaller">
						<i class="icon-comment blue"></i>
						Info Sponsor
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<center><img src="<?php echo base_url("assets/avatars") ?>/<?php echo $fotosponsor ?>" width="100px"></center>
						<strong>Nama</strong>  : <?php echo $namasponsor;?><br>
						<strong>Kota</strong>  : <?php echo $kotasponsor;?><br>
						<strong>Provinsi</strong>  : <?php echo $provinsisponsor;?><br>
						<strong>Email</strong> : <?php echo $emailsponsor;?><br>
						<strong>No. Telp</strong> : <?php echo $nohpsponsor;?><br></td>
					</div><!--/widget-main-->
				</div><!--/widget-body-->
			</div><!--/widget-box-->
		</div><!--/span-->

		<div class="span3">
			<div class="widget-box ">
				<div class="widget-header">
					<h4 class="lighter smaller">
						<i class="icon-comment blue"></i>
						Info Leader
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<center><img src="<?php echo base_url("assets/avatars"); ?>/<?php echo $foto_leader; ?>" width="100px"></center>
						<strong>Nama: </strong><?php echo $nama_leader ?><br>
						<strong>No Telp.: </strong><?php echo $telp_leader ?><br>
						<strong>Pin BBM: </strong><?php echo $bbm_leader ?><br>
						<strong>Alamat: </strong><?php echo $alamat_leader ?><br>
						<center><a href="<?php echo $link_profile ?>">Link Profile Lengkap</a></center>
					</div><!--/widget-main-->
				</div><!--/widget-body-->
			</div><!--/widget-box-->
		</div><!--/span-->
	</div><!--/row-->