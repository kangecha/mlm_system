<div class="row-fluid">
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
		<i class="icon-ok bigger-110 green"></i> Klik Pada ID Anggota Untuk Melihat Info Detail Member,<br>
		<i class="icon-ok bigger-110 green"></i> Atau Klik Pada ID Upline Untuk Melihat Informasi Data Upline Anggota Tersebut
	</div>

	<?php echo $this->session->flashdata('pesanconfirm'); ?>

	<div class="table-header center">
		List Member BMI Tiger Group Yang Belum di Approve
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
				<th>ID UPLINE</th>
				<th class="hidden-480">USERNAME</th>

				<th class="hidden-phone">
					<i class="icon-time bigger-110 hidden-phone"></i>
					TANGGAL GABUNG
				</th>
				<th class="hidden-480">KELENGKAPAN DATA</th>

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
					<a href="<?php if($dtmember['lengkap'] == "1"){ echo base_url("administrator/c_home/viewuser")."/".$dtmember['id_member']; }else{ echo "#";} ?>"><?php echo $dtmember['id_member']; ?></a>
				</td>
				<td>
					<a href="<?php echo base_url("administrator/c_home/viewuser/"); ?>/<?php echo $dtmember['id_referal']; ?>"><?php echo $dtmember['id_referal']; ?></a>
				</td>
				<td><?php echo $dtmember['username']; ?></td>
				<td class="hidden-phone"><?php echo $dtmember['tanggal']; ?></td>

				

				<td class="td-actions">
					<?php if($dtmember['lengkap'] != "1"){ ?>
						<span class="label label-warning">Belum Lengkap</span>
					<?php }else{ ?>
						<span class="label label-success">Lengkap</span>
					<?php } ?>
				</td>
				<td class="hidden-480">
					<?php if ($dtmember['confirm'] == '1') { ?>
					<span class="label label-warning">Pending</span>
					<?php }elseif($dtmember['confirm'] == '2'){?>
						<span class="label label-important">Rejected</span>
					<?php }else{ ?>
						<span class="label label-important">Not Confirm</span>
					<?php } ?>
					<div class="inline position-relative">
							<button class="btn btn-minier bigger btn-yellow dropdown-toggle" data-toggle="dropdown">
								<i class="icon-angle-down icon-only bigger-120"></i>
							</button>

							<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo base_url("administrator/c_home/approve"); ?>/<?php echo $dtmember['id_member']; ?>" class="tooltip-success" data-rel="tooltip" title="Approve">
										<span class="green">
											<i class="icon-ok bigger-110"></i>
										</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url("administrator/c_home/confirm"); ?>/<?php echo $dtmember['id_member']; ?>" class="tooltip-warning" data-rel="tooltip" title="Confirm">
										<span class="orange">
											<i class="icon-check bigger-110"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="<?php echo base_url("administrator/c_home/reject"); ?>/<?php echo $dtmember['id_member']; ?>" class="tooltip-warning" data-rel="tooltip" title="Reject">
										<span class="orange">
											<i class="icon-remove bigger-110"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="<?php echo base_url("administrator/c_home/delete"); ?>/<?php echo $dtmember['id_member']; ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
										<span class="red">
											<i class="icon-trash bigger-110"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
