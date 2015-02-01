<div class="row-fluid">
	

	<?php echo $this->session->flashdata('pesanslider'); ?>
	
	<div class="table-header center">
		<a href="<?php echo base_url("administrator/c_home/tambahWebsite"); ?>"><button class="pull-left btn btn-small btn-success">
			<i class="icon-desktop"></i>
			TAMBAH WEBSITE
		</button></a>
		List Website Replika
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
				<th>NAMA WEBSITE</th>
				<th>LINK</th>
				<th>DESKRIPSI</th>
				
				<th>ACTION</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($website as $dtweb) { ?>
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</td>
				<td class="hidden"></td>
				<td class="hidden"></td>
				<td><?php echo $dtweb['nama_website']; ?></td>
				<td>
					<?php echo $dtweb['link']; ?>
				</td>
				<td>
					<?php echo $dtweb['deskripsi']; ?>
				</td>
				
				<td class="td-actions">
					<a href="<?php echo $dtweb['link']; ?>" class="tooltip-success" data-rel="tooltip" title="View">
						<span class="blue">
							<i class="icon-eye-open bigger-110"></i>
						</span>
					</a>

					<a href="<?php echo base_url("administrator/c_home/editWebsite"); ?>/<?php echo $dtweb['id_website']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit Website">
						<span class="green">
							<i class="icon-edit bigger-110"></i>
						</span>
					</a> 

					<a href="<?php echo base_url("administrator/c_home/hapusWebsite"); ?>/<?php echo $dtweb['id_website']; ?>" class="tooltip-error" data-rel="tooltip" title="Hapus">
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
