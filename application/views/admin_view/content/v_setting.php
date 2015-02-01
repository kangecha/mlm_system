<?php echo $this->session->flashdata('pesansetting'); ?><br>
<div id="user-profile-3" class="user-profile row-fluid">
	<div class="offset1 span10">
		<div class="space"></div>
			<div class="tabbable">
				<ul class="nav nav-tabs padding-16">
					<li class="active">
						<a data-toggle="tab" href="#edit-basic">
							<i class="green icon-edit bigger-125"></i>
							Info Leader
						</a>
					</li>

					<li>
						<a data-toggle="tab" href="#edit-settings">
							<i class="purple icon-key bigger-125"></i>
							Password
						</a>
					</li>
				</ul>
				<div class="tab-content profile-edit-tab-content">
					<div id="edit-basic" class="tab-pane in active">
						<form enctype="multipart/form-data" action="<?php echo base_url("administrator/c_home/edit_leader");?>" method="POST"/>
						<h4 class="header blue bolder smaller">Leader Info</h4>

						<div class="row-fluid">
							<div class="span4">
								<input multiple="" type="file" name="userfile" id="id-input-file-3" />
							</div>

							<div class="vspace"></div>

							<div class="span8">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Nama Lengkap :</label>

									<div class="controls">
										<input type="text" id="form-field-1" name="nama_lengkap" class="input-xxlarge" value="<?php echo $nama_leader;?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">No Telp. :</label>

									<div class="controls">
										<input type="text" id="form-field-1" name="no_telp" class="input-xxlarge" value="<?php echo $telp_leader;?>" />
									</div>
								</div>
							</div>
						</div>

						<hr />

						<div class="control-group">
									<label class="control-label" for="form-field-1">Pin BBM :</label>

									<div class="controls">
										<input type="text" id="form-field-1" name="pin_bbm" class="input-xxlarge" value="<?php echo $bbm_leader;?>" />
									</div>
						</div>
						

						<div class="control-group">
							<label class="control-label" for="form-field-1">Link Profile :</label>

							<div class="controls">
								<input type="text" id="form-field-1" name="link_profile" class="input-xxlarge" value="<?php echo $link_profile;?>" />
							</div>
						</div>

						<div class="space"></div>
						<h4 class="header blue bolder smaller">Contact</h4>

						<div class="control-group">
							<label class="control-label" for="form-field-1">Alamat :</label>

							<div class="controls">
								<textarea name="alamat" class="input-xxlarge"><?php echo $alamat_leader;?></textarea>
							</div>
						</div>

						<div class="form-actions">
							<button type="reset" class="width-30 pull-left btn btn-small">
								<i class="icon-refresh"></i>
								Reset
							</button>

							<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
								<i class="icon-user"></i>
								Simpan Data
							</button>
						</div>
						</form>
					</div> <!-- END OF BASIC INFO -->

					<div id="edit-settings" class="tab-pane">
						<div class="space-10"></div>
						<form action="<?php echo base_url("administrator/c_home/password_edit");?>" method="POST">

						<div class="control-group">
							<label class="control-label" for="form-field-1">Password Baru :</label>

							<div class="controls">
								<input type="password" id="form-field-1" name="password" class="input-xxlarge" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="form-field-1">Ulangin Password :</label>

							<div class="controls">
								<input type="password" id="form-field-1" name="repassword" class="input-xxlarge"/>
							</div>
						</div>
						
						<div class="form-actions">
							<button type="reset" class="width-30 pull-left btn btn-small">
								<i class="icon-refresh"></i>
								Reset
							</button>

							<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
								<i class="icon-user"></i>
								Simpan Data
							</button>
						</div>
						</form>
					</div> <!-- END OF ADDITIONAL INFO -->
			</div>
		</div>
	</div>
</div><!--/user-profile-->
