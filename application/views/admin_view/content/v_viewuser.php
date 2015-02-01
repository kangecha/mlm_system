<div id="user-profile-2" class="user-profile row-fluid">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18">
			<li class="active">
				<a data-toggle="tab" href="#home">
					<i class="green icon-user bigger-120"></i>
					Profile
				</a>
			</li>

			<li>
				<a data-toggle="tab" href="#friends">
					<i class="blue icon-group bigger-120"></i>
					Downline/Member
				</a>
			</li>

			<li>
				<a href="<?php echo base_url("administrator/c_home/editprofile")."/".$id_anggota; ?>">
					<i class="red icon-edit bigger-120"></i>
					Edit Profile
				</a>
			</li>
		</ul>

		<div class="tab-content no-border padding-24">
			<div id="home" class="tab-pane in active">
				<div class="row-fluid">
					<div class="span3 center">
						<span class="profile-picture">
							<img class="editable" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url(); ?>assets/avatars/<?php echo $fotouser; ?>" width="300px" />
						</span>

						<div class="space space-4"></div>

						<a href="#" class="btn btn-small btn-block btn-success">
							<i class="icon-plus-sign bigger-110"></i>
							<?php echo $no_telp ?>
						</a>

						<a href="#" class="btn btn-small btn-block btn-primary">
							<i class="icon-envelope-alt"></i>
							<?php echo $email ?>
						</a>
					</div><!--/span-->

					<div class="span9">
						<h4 class="blue">
							<span class="middle"><?php echo $namauser; ?></span>
							<?php if($statususer == "1"){ ?>
								<span class="label label-success arrowed-in-right">
									<i class="icon-circle smaller-80"></i>
									Approve
								</span>
							<?php }else{ ?>
								<span class="label label-warning arrowed-in-right">
									<i class="icon-circle smaller-80"></i>
									Pending
								</span>
							<?php } ?>
						</h4>

						<div class="profile-user-info">
							<div class="profile-info-row">
								<div class="profile-info-name"> No Identitas </div>

								<div class="profile-info-value">
									<span><?php echo $no_identitas; ?></span>
								</div>
							</div>


							<div class="profile-info-row">
								<div class="profile-info-name"> Tempat Lahir </div>

								<div class="profile-info-value">
									<span><?php echo $tempat_lahir;?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Tanggal Lahir </div>

								<div class="profile-info-value">
									<span><?php echo $tanggal_lahir;?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Jenis Kelamin </div>

								<div class="profile-info-value">
									<span><?php echo $jenis_kelamin;?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Agama </div>

								<div class="profile-info-value">
									<span><?php echo $agama;?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Alamat </div>

								<div class="profile-info-value">
									<i class="icon-map-marker light-orange bigger-110"></i>
									<span><?php echo $alamat ?> (<?php echo $kode_pos ?>) </span>
									<span><?php echo $kota; ?> - <?php echo $provinsi; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Tanggal Bergabung </div>

								<div class="profile-info-value">
									<span><?php echo $tanggal ?></span>
								</div>
							</div>
						</div>

						<div class="hr hr-8 dotted"></div>
					</div><!--/span-->
				</div><!--/row-fluid-->

				<div class="space-20"></div>

				<div class="row-fluid">
					<div class="span6">
						<div class="widget-box transparent">
							<div class="widget-header widget-header-small">
								<h4 class="smaller">
									<i class="icon-check bigger-110"></i>
									Testimonial
								</h4>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<strong><?php echo $judul_testi ?></strong><br>
									<p><?php echo $isi ?></p>
								</div>
							</div>
						</div>
					</div>

					<div class="span6">
						<div class="widget-box transparent">
							<div class="widget-header widget-header-small header-color-blue2">
								<h4 class="smaller">
									<i class="icon-lightbulb bigger-120"></i>
									Downline/Member Info
								</h4>
							</div>

							<div class="widget-body">
								<div class="widget-main padding-16">
									<div class="row-fluid">
										<div class="grid3 center">
											<div class="easy-pie-chart percentage" data-percent="45" data-color="#CA5952">
												<span class="percent"><?php echo $member_aktif; ?></span>
											</div>

											<div class="space-2"></div>
											Member Aktif
										</div>

										<div class="grid3 center">
											<div class="center easy-pie-chart percentage" data-percent="90" data-color="#59A84B">
												<span class="percent"><?php echo $member_lengkap; ?></span>
											</div>

											<div class="space-2"></div>
											Member Terverifikasi
										</div>

										<div class="grid3 center">
											<div class="center easy-pie-chart percentage" data-percent="80" data-color="#9585BF">
												<span class="percent"><?php echo $calon_member; ?></span>
											</div>

											<div class="space-2"></div>
											Calon Member
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--#home-->

			<div id="friends" class="tab-pane">
				<div class="profile-users clearfix">
					<?php foreach ($member as $dtmember) { ?>
					<div class="itemdiv memberdiv">
						<div class="inline position-relative">
							<div class="user">
								<a href="#">
									<img src="<?php echo base_url(); ?>assets/avatars/<?php echo $dtmember['foto']; ?>" alt="Bob Doe's avatar" />
								</a>
							</div>

							<div class="body">
								<div class="name">
									<a href="<?php echo base_url("administrator/c_home/viewuser/"); ?>/<?php echo $dtmember['id_anggota']; ?>">
										<span class="user-status status-online"></span>
										<?php echo $dtmember['nama_lengkap']; ?>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>

				<div class="hr hr10 hr-double"></div>

				<ul class="pager pull-right">
					<li class="previous disabled">
						<a href="#">&larr; Prev</a>
					</li>

					<li class="next">
						<a href="#">Next &rarr;</a>
					</li>
				</ul>
			</div><!--/#friends-->
		</div>
	</div>
</div>
