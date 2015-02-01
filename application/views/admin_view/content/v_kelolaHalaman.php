<div class="row-fluid">
	

	<?php echo $this->session->flashdata('pesanhalaman'); ?>
	
	<div class="table-header center">
		<a href="<?php echo base_url("administrator/c_home/tambahHalaman"); ?>"><button class="pull-left btn btn-small btn-success">
			<i class="icon-desktop"></i>
			TAMBAH HALAMAN
		</button></a>
		List Halaman User & Depan
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
				<th>JUDUL HALAMAN</th>
				<th class="hidden-480">ISI</th>
				<th class="hidden-480">POSISI</th>
				<th class="hidden">
					
				</th>
				<th>ACTION</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($halaman as $dthalaman) { ?>
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</td>

				<td>
					<a href="<?php echo base_url("administrator/c_home/view_halaman")."/".$dthalaman['id_halaman']; ?>"><?php echo $dthalaman['permalink']; ?></a>
				</td>
				<td>
					<?php echo $dthalaman['judul_halaman'];?>
				</td>
				<td><?php $isi = character_limiter($dthalaman['isi'],100); echo strip_tags($isi); ?></td>
				<td>
					<?php echo $dthalaman['posisi'];?>
				</td>
				<td class="hidden">
					
				</td>
				<td class="td-actions">
					<a href="<?php echo base_url("administrator/c_home/editHalaman"); ?>/<?php echo $dthalaman['id_halaman']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit Halaman">
						<span class="green">
							<i class="icon-edit bigger-110"></i>
						</span>
					</a> 
					<a href="<?php echo base_url("administrator/c_home/hapusHalaman"); ?>/<?php echo $dthalaman['id_halaman']; ?>" class="tooltip-error" data-rel="tooltip" title="Hapus Halaman">
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
