<div class="row-fluid">
	

	<?php echo $this->session->flashdata('pesanbanner'); ?>
	
	<div class="table-header center">
		<a href="<?php echo base_url("administrator/c_home/tambahBanner"); ?>"><button class="pull-left btn btn-small btn-success">
			<i class="icon-desktop"></i>
			TAMBAH BANNER
		</button></a>
		List Gambar Banner Landing Page
	</div>

	<table id="sample-table-2" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</th>
				<th class="hidden"></th>
				<th>GAMBAR</th>
				<th>CAPTION</th>
				<th>LINK</th>
				<th>LOKASI</th>
				
				<th>ACTION</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($banner as $dtbanner) { ?>
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</td>
				<td class="hidden"></td>
				<td>
					<img src="<?php echo base_url("assets/images/banner"); ?>/<?php echo $dtbanner['file']; ?>" width="150px">
				</td>
				<td>
					<?php echo $dtbanner['judul_banner']; ?>
				</td>
				<td>
					<?php echo $dtbanner['link']; ?>
				</td>
				<td>
					<?php echo $dtbanner['lokasi']; ?>
				</td>


				
				<td class="td-actions">
					<a href="<?php echo base_url("assets/images/banner"); ?>/<?php echo $dtbanner['file']; ?>" class="tooltip-success" data-rel="tooltip" title="View">
						<span class="blue">
							<i class="icon-eye-open bigger-110"></i>
						</span>
					</a>

					<a href="<?php echo base_url("administrator/c_home/editBanner"); ?>/<?php echo $dtbanner['id_banner']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit Banner">
						<span class="green">
							<i class="icon-edit bigger-110"></i>
						</span>
					</a> 

					<a href="<?php echo base_url("administrator/c_home/hapusBanner"); ?>/<?php echo $dtbanner['id_banner']; ?>" class="tooltip-error" data-rel="tooltip" title="Hapus">
						<span class="red">
							<i class="icon-trash bigger-110"></i>
						</span>
					</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
