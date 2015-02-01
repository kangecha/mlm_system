<div id="user-profile-3" class="user-profile row-fluid">
	<div class="offset1 span10">
		<div class="space"></div>

			<div class="tabbable">
				<ul class="nav nav-tabs padding-16">
					<li class="active">
						<a data-toggle="tab" href="#edit-basic">
							<i class="green icon-plus bigger-125"></i>
							TAMBAH GAMBAR SLIDE
						</a>
					</li>
				</ul>

				<div class="tab-content profile-edit-tab-content">
					<div id="edit-basic" class="tab-pane in active">
						<form enctype="multipart/form-data" action="<?php echo base_url("administrator/c_home/tambahSlider");?>" method="POST">
						<div class="control-group">
							<label class="control-label" for="form-field-1">CAPTION :</label>

							<div class="controls">
								<input type="text" id="form-field-1" name="judul_slider" class="input-xxlarge"  />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="form-field-1">GAMBAR :</label>

							<div class="controls">
								<input multiple="" type="file" name="userfile" id="id-input-file-3" />
							</div>
						</div>
						
						<div class="form-actions">
							<button type="reset" class="btn btn-small">
								<i class="icon-refresh"></i>
								Reset
							</button>
							&nbsp; &nbsp;
							&nbsp;
							<button id="regist"  class="btn btn-small btn-success">
								<i class="icon-user"></i>
								Simpan Data
							</button>
						</div>
						</form>
					</div> <!-- END OF BASIC INFO -->
				</div>
			</div>
	</div><!--/span-->
</div><!--/user-profile-->
