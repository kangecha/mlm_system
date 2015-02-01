<div class="row-fluid">
	

	<?php echo $this->session->flashdata('pesanslider'); ?>
	
	<div class="table-header center">
		<a href="<?php echo base_url("administrator/c_home/tambahSlider"); ?>"><button class="pull-left btn btn-small btn-success">
			<i class="icon-desktop"></i>
			TAMBAH SLIDE
		</button></a>
		List Gambar Slide Landing Page
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
				<th class="hidden"></th>
				<th class="hidden"></th>
				<th>GAMBAR</th>
				<th>CAPTION</th>
				
				<th>ACTION</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($slide as $dtslide) { ?>
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</td>
				<td class="hidden"></td>
				<td class="hidden"></td>
				<td class="hidden"></td>
				<td>
					<img src="<?php echo base_url("assets/images/slider"); ?>/<?php echo $dtslide['file']; ?>" width="350px">
				</td>
				<td>
					<?php echo $dtslide['judul_slider']; ?>
				</td>
				
				<td class="td-actions">
					<a href="<?php echo base_url("assets/images/slider"); ?>/<?php echo $dtslide['file']; ?>" class="tooltip-success" data-rel="tooltip" title="View">
						<span class="blue">
							<i class="icon-eye-open bigger-110"></i>
						</span>
					</a>

					<a href="<?php echo base_url("administrator/c_home/editSlider"); ?>/<?php echo $dtslide['id_slider']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit Slide">
						<span class="green">
							<i class="icon-edit bigger-110"></i>
						</span>
					</a> 

					<a href="<?php echo base_url("administrator/c_home/hapusSlider"); ?>/<?php echo $dtslide['id_slider']; ?>" class="tooltip-error" data-rel="tooltip" title="Hapus">
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
