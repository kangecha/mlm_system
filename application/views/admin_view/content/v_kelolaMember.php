<div class="row-fluid">
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
		<i class="icon-ok bigger-110 green"></i> Klik Pada ID Anggota Untuk Melihat Info Detail Member,<br>
	</div>

	<?php echo $this->session->flashdata('pesanconfirm'); ?>

	<div class="table-header center">
		List Member BMI Tiger Group Yang Sudah di Approve/Aktif
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
				<th>ID ANGGOTA</th>
				<th>MASTER ID</th>
				<th class="hidden-480">NAMA LENGKAP</th>
				<th class="hidden-480">NO TELP/HP</th>
				<th class="hidden-phone">
					<i class="icon-time bigger-110 hidden-phone"></i>
					TANGGAL GABUNG
				</th>
				<th>ACTION</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($member as $dtmember) { ?>
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</td>

				<td>
					<a href="<?php if($dtmember['lengkap'] == "1"){ echo base_url("administrator/c_home/viewuser")."/".$dtmember['id_anggota']; }else{ echo "#";} ?>"><?php echo $dtmember['id_anggota']; ?></a>
				</td>
				<td>
					<?php echo $dtmember['MasterID'];?>
				</td>
				<td><?php echo $dtmember['nama_lengkap']; ?></td>
				<td class="td-actions">
					<?php echo $dtmember['no_telp']; ?>
				</td>
				<td class="hidden-phone"><?php echo $dtmember['tanggal']; ?></td>
				<td class="hidden-480">
					<a href="<?php echo base_url("administrator/c_home/viewuser"); ?>/<?php echo $dtmember['id_anggota']; ?>" class="tooltip-success" data-rel="tooltip" title="View">
						<span class="blue">
							<i class="icon-eye-open bigger-110"></i>
						</span>
					</a>

					<a href="<?php echo base_url("administrator/c_home/editprofile"); ?>/<?php echo $dtmember['id_anggota']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit Profile">
						<span class="green">
							<i class="icon-edit bigger-110"></i>
						</span>
					</a> 

					<a href="<?php echo base_url("administrator/c_home/delete"); ?>/<?php echo $dtmember['id_anggota']; ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
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
