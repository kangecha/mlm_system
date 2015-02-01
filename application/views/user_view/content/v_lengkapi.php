<?php echo $this->session->flashdata('pesan');?>

<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("user/c_dashboard/lengkapi");?>" method="POST"/>
	<fieldset>
		<div class="control-group">
			<label class="control-label" for="form-field-1">Nama Lengkap :</label>

			<div class="controls">
				<input type="text" id="form-field-1" name="nama_lengkap" class="input-xxlarge" placeholder="Masukan Nama Lengkap Anda" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form-field-1">Tempat Lahir :</label>

			<div class="controls">
				<input type="text" id="form-field-1" name="tempat_lahir" class="input-xxlarge" placeholder="Masukan Tempat Lahir Anda" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form-field-1">Tanggal Lahir :</label>
			<div class="controls">
				<div class="input-append">
					<input class="date-picker" name="tanggal_lahir" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
					<span class="add-on">
						<i class="icon-calendar"></i>
					</span>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form-field-1">No. Identitas :</label>

			<div class="controls">
				<input type="text" id="form-field-1" name="no_identitas" class="input-xxlarge" placeholder="Masukan No. Identitas Anda" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="form-field-1">Jenis Kelamin :</label>

			<div class="controls">
				<label class="inline">
					<input name="jenis_kelamin" value="lk" type="radio" />
					<span class="lbl"> Laki - Laki</span>
				</label>

				&nbsp; &nbsp; &nbsp;
				<label class="inline">
					<input name="jenis_kelamin" value="pr" type="radio" />
					<span class="lbl"> Perempuan</span>
				</label>

			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form-field-1">Agama :</label>

			<div class="controls">
				<input type="text" id="form-field-1" name="agama" class="input-xxlarge" placeholder="Agama" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form-field-1">Alamat :</label>

			<div class="controls">
				<textarea name="alamat" class="input-xxlarge"></textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form-field-1">Kota :</label>

			<div class="controls">
				<select name="id_kota" class="chzn-select" id="form-field-select-3" data-placeholder="Pilih/Cari Kota...">
					<option value="" />
				<?php foreach ($kota as $datakota) { ?>
					<option value="<?php echo $datakota['id_kota']?>"><?php echo $datakota['nama_kota']?></option>
				<?php } ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="form-field-1">Provinsi :</label>

			<div class="controls">
				<select name="id_provinsi" class="chzn-select" id="form-field-select-3" data-placeholder="Pilih/Cari Provinsi...">
					<option value="" />
				<?php foreach ($provinsi as $dataprovinsi) { ?>
					<option value="<?php echo $dataprovinsi['id_provinsi']?>"><?php echo $dataprovinsi['nama_provinsi']?></option>
				<?php } ?>
				</select>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form-field-1">Kode Pos :</label>

			<div class="controls">
				<input type="text" id="form-field-1" name="kode_pos" class="input-xxlarge" placeholder="Kode Pos" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form-field-1">No. Telp/Hp :</label>

			<div class="controls">
				<input type="text" id="form-field-1" name="no_telp" class="input-xxlarge" placeholder="No. Telp/Hp Yang Aktif" />
			</div>
		</div>


		<div class="control-group">
			<label class="control-label" for="form-field-1">Foto :</label>

			<div class="controls span3">
				<input multiple="" type="file" name="userfile" id="id-input-file-3" />
			</div>
		</div>
		<div class="clearfix">
			<button type="reset" class="width-30 pull-left btn btn-small">
				<i class="icon-refresh"></i>
				Reset
			</button>

			<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
				<i class="icon-user"></i>
				Simpan Data
			</button>		
		</div>
	</fieldset>
</form>