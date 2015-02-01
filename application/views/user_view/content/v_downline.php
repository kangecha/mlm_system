<div class="row-fluid">
	<div class="table-header">
		List Member/Downline Anda
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
				<th>USERNAME</th>
				<th class="hidden-480">EMAIL</th>

				<th class="hidden-phone">
					<i class="icon-time bigger-110 hidden-phone"></i>
					TANGGAL GABUNG
				</th>
				<th class="hidden-480">MID</th>

				<th>STATUS</th>
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
					<a href="<?php echo base_url("user/c_dashboard/viewuser/"); ?>/<?php echo $dtmember['id_anggota']; ?>"><?php echo $dtmember['id_anggota']; ?></a>
				</td>
				<td><?php echo $dtmember['username']; ?></td>
				<td class="hidden-480"><?php echo $dtmember['email']; ?></td>
				<td class="hidden-phone"><?php echo $dtmember['tanggal']; ?></td>

				

				<td class="td-actions">
					<?php echo $dtmember['MasterID']; ?>
				</td>
				<td class="hidden-480">
					<?php if ($dtmember['aktif'] == '1') { ?>
					<span class="label label-success">Approve</span>
					<?php }?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
