<?php echo $this->session->flashdata('pesansetting'); ?><br>
<div id="user-profile-3" class="user-profile row-fluid">
	<div class="offset1 span10">
		<div class="space"></div>
			<div class="tabbable">
				<ul class="nav nav-tabs padding-16">
					<li class="active">
						<a data-toggle="tab" href="#edit-basic">
							<i class="green icon-edit bigger-125"></i>
							Password
						</a>
					</li>
				</ul>
				<div class="tab-content profile-edit-tab-content">
					<div id="edit-basic" class="tab-pane in active">
						<form action="<?php echo base_url("user/c_dashboard/edit_password");?>" method="POST">
						<div class="control-group">
							<label class="control-label" for="form-field-1">Email :</label>

							<div class="controls">
								<input type="text" value="<?php echo $email ?>" id="form-field-1" name="email" class="input-xxlarge" />
							</div>
						</div>
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
					</div> <!-- END OF BASIC INFO -->
			</div>
		</div>
	</div>
</div><!--/user-profile-->
