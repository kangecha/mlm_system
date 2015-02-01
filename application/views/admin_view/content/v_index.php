	<div class="space-6"></div>
	<div class="row-fluid">
		<div class="span5">
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
						<p>Selamat Datang Di Halaman Administrator,<br>
						Halaman Ini Bersifat Sensitif, <strong>WASPADAI</strong> Penyalahgunaan Halaman Ini, Halaman Ini berfungsi untuk
						pengelolaan dan aktifasi member di BMI dan informasi lengkap, jika terjadi error/bugs segera
						hubungi programmer. mohon menjaga kerahasiaan akun dan halaman ini dari ancaman aktifitas tidak legal,
						mohon mengubah password secara berkala dan tidak menunjukan ataupun memberikan dan menyimpan password
						tersebut kesembarang orang. jika di butuhkan akun tambahan segera hubungi programmer dengan lampiran
						penyerahan atau pertambahan akun yang bersangkutan. Terimakasih.
						<br>
						<br>
						Regards,<br>
						Divisi Programmer<br>
						BMI Tiger Group.
						</p>
					</div><!--/widget-main-->
				</div><!--/widget-body-->
			</div><!--/widget-box-->
			<div class="widget-box transparent">
				<div class="widget-header widget-header-flat">
					<h4 class="lighter">
						<i class="icon-cogs red"></i>
						Informasi Server
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
						<strong>BROWSER ANDA</strong> : <br><?php echo $_SERVER['HTTP_USER_AGENT']; ?><br>
						<strong>IP ANDA</strong> : <br><?php echo $_SERVER['REMOTE_ADDR']; ?><br>

						<h6>*) Semua Aktifitas dan IP Anda Telah Kami Log, Untuk Keamanan. Jika Di Temukan Aktifitas Mencurigakan dan Merugikan Pihak BMI Kami Akan Memberikan Sanksi Tegas Secara Hukum.</h6>
					</div><!--/widget-main-->
				</div><!--/widget-body-->
			</div><!--/widget-box-->
		</div>

		<div class="span6">
			<div class="widget-box transparent">
				<div class="widget-header widget-header-flat">
					<h4 class="lighter">
						<i class="icon-star orange"></i>
						INFORMASI MEMBER
					</h4>

					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="icon-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<!-- INFORMASI WEBITE DI SINI -->
						<div class="widget-box transparent">
							<div class="widget-header">
								<h4 class="lighter smaller">
									<i class="icon-user blue"></i>
									INFORMASI REGISTER 5 MEMBER TERBARU
								</h4>
							</div>

							<div class="widget-body">
								<div class="widget-main no-padding">
									<table id="sample-table" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="hidden">
													<label>
														<input type="checkbox" />
														<span class="lbl"></span>
													</label>
												</th>
												<th class="hidden"></th>
												<th class="hidden"></th>
												<th>ID ANGGOTA</th>
												<th>USERNAME</th>
												<th>TANGGAL GABUNG</th>
												<th>ID SPONSOR</th>
											</tr>
										</thead>

										<tbody>
											<?php foreach ($newmember as $dttop) { ?>
											<tr>
												<td class="hidden">
													<label>
														<input type="checkbox" />
														<span class="lbl"></span>
													</label>
												</td>
												<td class="hidden"></td>
												<td class="hidden"></td>
												<td class="hidden"></td>
												<td>
													<a href="<?php if($dttop['lengkap'] == "1"){ echo base_url("administrator/c_home/viewuser")."/".$dttop['id_anggota']; }else{ echo "#";} ?>"><?php echo $dttop['id_anggota']; ?></a>
												</td>
												<td>
													<?php echo $dttop['username']; ?>
												</td>
												<td>
													<?php echo $dttop['tanggal']; ?>
												</td>
												<td>
													<a href="<?php echo base_url("administrator/c_home/viewuser") ?>/<?php echo $dttop['id_referal']; ?>"><?php echo $dttop['id_referal']; ?></a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div><!--/widget-main-->
							</div><!--/widget-body-->
						</div><!--/widget-box HERE-->
						<div class="widget-box transparent">
							<div class="widget-header">
								<h4 class="lighter smaller">
									<i class="icon-group green"></i>
									INFORMASI 5 MEMBER AKTIF TERBARU
								</h4>
							</div>

							<div class="widget-body">
								<div class="widget-main no-padding">
									<table id="sample-table" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="hidden">
													<label>
														<input type="checkbox" />
														<span class="lbl"></span>
													</label>
												</th>
												<th class="hidden"></th>
												<th class="hidden"></th>
												<th>ID ANGGOTA</th>
												<th>USERNAME</th>
												<th>TANGGAL GABUNG</th>
												<th>ID SPONSOR</th>
											</tr>
										</thead>

										<tbody>
											<?php foreach ($memberaktif as $dttop) { ?>
											<tr>
												<td class="hidden">
													<label>
														<input type="checkbox" />
														<span class="lbl"></span>
													</label>
												</td>
												<td class="hidden"></td>
												<td class="hidden"></td>
												<td class="hidden"></td>
												<td>
													<a href="<?php echo base_url("administrator/c_home/viewuser") ?>/<?php echo $dttop['id_anggota']; ?>"><?php echo $dttop['id_anggota']; ?></a>
												</td>
												<td>
													<?php echo $dttop['username']; ?>
												</td>
												<td>
													<?php echo $dttop['tanggal']; ?>
												</td>
												<td>
													<a href="<?php echo base_url("administrator/c_home/viewuser") ?>/<?php echo $dttop['id_referal']; ?>"><?php echo $dttop['id_referal']; ?></a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div><!--/widget-main-->
							</div><!--/widget-body-->
						</div><!--/widget-box HERE-->
						<div class="widget-box transparent">
							<div class="widget-header">
								<h4 class="lighter smaller">
									<i class="icon-star orange"></i>
									INFORMASI TOP 5 SPONSOR / 7 HARI
								</h4>
							</div>

							<div class="widget-body">
								<div class="widget-main no-padding">
									<table id="sample-table" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="hidden">
													<label>
														<input type="checkbox" />
														<span class="lbl"></span>
													</label>
												</th>
												<th class="hidden"></th>
												<th class="hidden"></th>
												<th class="hidden"></th>
												<th>ID ANGGOTA</th>
												<th>USERNAME</th>
												<th>JUMLAH MEMBER</th>
											</tr>
										</thead>

										<tbody>
											<?php foreach ($topsponsor as $dttop) { ?>
											<tr>
												<td class="hidden">
													<label>
														<input type="checkbox" />
														<span class="lbl"></span>
													</label>
												</td>
												<td class="hidden"></td>
												<td class="hidden"></td>
												<td class="hidden"></td>
												<td>
													<a href="<?php echo base_url("administrator/c_home/viewuser") ?>/<?php echo $dttop['id_anggota']; ?>"><?php echo $dttop['id_anggota']; ?></a>
												</td>
												<td>
													<?php echo $dttop['username']; ?>
												</td>
												<td>
													<?php echo $dttop['jumlah_member']; ?> Member Aktif
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div><!--/widget-main-->
							</div><!--/widget-body-->
						</div><!--/widget-box-->
					</div><!--/widget-main-->
				</div><!--/widget-body-->
			</div><!--/widget-box-->
		</div>
	</div>