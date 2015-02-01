<div class="row-fluid">
	

	<?php echo $this->session->flashdata('pesanberita'); ?>
	
	<div class="table-header center">
		<a href="<?php echo base_url("administrator/c_home/tambahBerita"); ?>"><button class="pull-left btn btn-small btn-success">
			<i class="icon-desktop"></i>
			TAMBAH BERITA
		</button></a>
		List Berita Terbaru
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
				<th>PERMALINK</th>
				<th>JUDUL BERITA</th>
				<th class="hidden-480">ISI</th>
				<th class="hidden-480">TANGGAL</th>
				<th class="hidden">
					
				</th>
				<th>ACTION</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($berita as $dtberita) { ?>
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</td>

				<td>
					<a href="<?php echo base_url("administrator/c_home/view_berita")."/".$dtberita['id_berita']; ?>"><?php echo $dtberita['permalink']; ?></a>
				</td>
				<td>
					<?php echo $dtberita['judul_berita'];?>
				</td>
				<td><?php $isi = character_limiter($dtberita['isi_berita'],100); echo strip_tags($isi); ?></td>
				<td>
					<?php echo $dtberita['tanggal'];?>
				</td>
				<td class="hidden">
					
				</td>
				<td class="td-actions">
					<a href="<?php echo base_url("administrator/c_home/editBerita"); ?>/<?php echo $dtberita['id_berita']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit berita">
						<span class="green">
							<i class="icon-edit bigger-110"></i>
						</span>
					</a> 
					<a href="<?php echo base_url("administrator/c_home/hapusBerita"); ?>/<?php echo $dtberita['id_berita']; ?>" class="tooltip-error" data-rel="tooltip" title="Hapus Berita">
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
