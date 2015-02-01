<?php echo $this->session->flashdata('pesanupdate'); ?><br>
<div id="user-profile-3" class="user-profile row-fluid">
									<div class="offset1 span10">
										<div class="space"></div>

											<div class="tabbable">
												<ul class="nav nav-tabs padding-16">
													<li class="active">
														<a data-toggle="tab" href="#edit-basic">
															<i class="green icon-edit bigger-125"></i>
															Basic Info
														</a>
													</li>

													<li>
														<a data-toggle="tab" href="#edit-settings">
															<i class="purple icon-cog bigger-125"></i>
															Additional Info
														</a>
													</li>

													<li>
														<a data-toggle="tab" href="#edit-password">
															<i class="blue icon-key bigger-125"></i>
															Bank Info
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#testimoni">
															<i class="green icon-comments bigger-125"></i>
															Testimoni
														</a>
													</li>

													<li>
														<a data-toggle="tab" href="#masterID">
															<i class="green icon-cogs bigger-125"></i>
															Master ID
														</a>
													</li>
													<li>
														<a data-toggle="tab" href="#password">
															<i class="green icon-cogs bigger-125"></i>
															Password
														</a>
													</li>
												</ul>

												<div class="tab-content profile-edit-tab-content">
													<div id="edit-basic" class="tab-pane in active">
														<form enctype="multipart/form-data" action="<?php echo base_url("administrator/c_home/profile_edit");?>" method="POST"/>
														<h4 class="header blue bolder smaller">General</h4>

														<div class="row-fluid">
															<div class="span4">
																<input multiple="" type="file" name="userfile" id="id-input-file-3" />
															</div>

															<div class="vspace"></div>

															<div class="span8">
																<input type="hidden" id="form-field-1" name="id_anggota" class="input-xxlarge" value="<?php echo $id_anggota;?>" />
																
																<div class="control-group">
																	<label class="control-label" for="form-field-1">Nama Lengkap :</label>

																	<div class="controls">
																		<input type="text" id="form-field-1" name="nama_lengkap" class="input-xxlarge" value="<?php echo $nama;?>" />
																	</div>
																</div>
																<div class="control-group">
																	<label class="control-label" for="form-field-1">No. Identitas :</label>

																	<div class="controls">
																		<input type="text" id="form-field-1" name="no_identitas" class="input-xxlarge" value="<?php echo $no_identitas;?>" />
																	</div>
																</div>
																
															</div>
														</div>

														<hr />
														<div class="control-group">
														<label class="control-label" for="form-field-1">Tanggal Lahir :</label>
														<div class="controls">
																<div class="input-append">
																	<input value="<?php echo $tanggal_lahir;?>" class="date-picker" name="tanggal_lahir" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
																	<span class="add-on">
																		<i class="icon-calendar"></i>
																	</span>
																</div>
															</div>
														</div>

														<div class="control-group">
																	<label class="control-label" for="form-field-1">Tempat Lahir :</label>

																	<div class="controls">
																		<input type="text" id="form-field-1" name="tempat_lahir" class="input-xxlarge" value="<?php echo $tempat_lahir;?>" />
																	</div>
														</div>
														<div class="control-group">
															<label class="control-label" for="form-field-1">Jenis Kelamin :</label>

															<div class="controls">
																<?php if($jenis_kelamin == "lk"){?>
																<label class="inline">
																	<input checked="checked" name="jenis_kelamin" value="lk" type="radio" />
																	<span class="lbl"> Laki - Laki</span>
																</label>
																&nbsp; &nbsp; &nbsp;
																<label class="inline">
																	<input name="jenis_kelamin" value="pr" type="radio" />
																	<span class="lbl"> Perempuan</span>
																</label>
																<?php }elseif($jenis_kelamin == "pr"){?>
																<label class="inline">
																	<input name="jenis_kelamin" value="lk" type="radio" />
																	<span class="lbl"> Laki - Laki</span>
																</label>
																&nbsp; &nbsp; &nbsp;
																<label class="inline">
																	<input checked="checked" name="jenis_kelamin" value="pr" type="radio" />
																	<span class="lbl"> Perempuan</span>
																</label>
																<?php }?>

															</div>
														</div>

														<div class="control-group">
															<label class="control-label" for="form-field-1">Agama :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="agama" class="input-xxlarge" value="<?php echo $agama;?>" />
															</div>
														</div>

														<div class="space"></div>
														<h4 class="header blue bolder smaller">Contact</h4>

														<div class="control-group">
															<label class="control-label" for="form-field-1">Alamat :</label>

															<div class="controls">
																<textarea name="alamat" class="input-xxlarge"><?php echo $alamat;?></textarea>
															</div>
														</div>

														<div class="control-group">
															<label class="control-label" for="form-field-1">Kota :</label>

															<div class="controls">
																<select name="id_kota" class="chzn-select" id="form-field-select-3" data-placeholder="Pilih/Cari Kota...">
																	<option value="<?php echo $id_kota;?>" ><?php echo $kota;?></option>
																<?php foreach ($kotaall as $datakota) { ?>
																	<option value="<?php echo $datakota['id_kota']?>"><?php echo $datakota['nama_kota']?></option>
																<?php } ?>
																</select>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" for="form-field-1">Provinsi :</label>

															<div class="controls">
																<select name="id_provinsi" class="chzn-select" id="form-field-select-3" data-placeholder="Pilih/Cari Provinsi...">
																	<option value="<?php echo $id_provinsi;?>"><?php echo $provinsi;?></option>
																<?php foreach ($provinsiall as $dataprovinsi) { ?>
																	<option value="<?php echo $dataprovinsi['id_provinsi']?>"><?php echo $dataprovinsi['nama_provinsi']?></option>
																<?php } ?>
																</select>
															</div>
														</div>

														<div class="control-group">
															<label class="control-label" for="form-field-1">Kode Pos :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="kode_pos" class="input-xxlarge" value="<?php echo $kode_pos;?>" />
															</div>
														</div>

														<div class="control-group">
															<label class="control-label" for="form-field-1">No. Telp/Hp :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="no_telp" class="input-xxlarge" value="<?php echo $no_telp;?>" />
															</div>
														</div>

														<div class="form-actions">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
																<i class="icon-user"></i>
																Simpan Data
															</button>
														</div>
														</form>
													</div> <!-- END OF BASIC INFO -->

													<div id="edit-settings" class="tab-pane">
														<div class="space-10"></div>
														<form action="<?php echo base_url("administrator/c_home/additional_edit");?>" method="POST">
														
														<input type="hidden" id="form-field-1" name="id_anggota" class="input-xxlarge" value="<?php echo $id_anggota;?>" />

														<div class="control-group">
															<label class="control-label" for="form-field-1">Nama Ibu Kandung :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="nama_ibu_kandung" class="input-xxlarge" value="<?php echo $nama_ibu_kandung;?>" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" for="form-field-1">Nama Ahli Waris :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="nama_ahli_waris" class="input-xxlarge" value="<?php echo $nama_ahli_waris;?>" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" for="form-field-1">Hubungan Dengan Ahli Waris :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="hubungan" class="input-xxlarge" value="<?php echo $hubungan;?>" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" for="form-field-1">NPWP :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="npwp" class="input-xxlarge" value="<?php echo $npwp;?>" />
															</div>
														</div>
														<div class="form-actions">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
																<i class="icon-user"></i>
																Simpan Data
															</button>
														</div>
														</form>
													</div> <!-- END OF ADDITIONAL INFO -->

													<div id="edit-password" class="tab-pane">
														<div class="space-10"></div>
														<form action="<?php echo base_url("administrator/c_home/bank_edit");?>" method="POST">
														<input type="hidden" id="form-field-1" name="id_anggota" class="input-xxlarge" value="<?php echo $id_anggota;?>" />
														
														<div class="control-group">
															<label class="control-label" for="form-field-1">Nama Bank :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="nama_bank" class="input-xxlarge" value="<?php echo $nama_bank;?>" />
															</div>
														</div>

														<div class="control-group">
															<label class="control-label" for="form-field-1">Cabang :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="cabang" class="input-xxlarge" value="<?php echo $cabang;?>" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" for="form-field-1">Nama Pemilik :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="nama_pemilik" class="input-xxlarge" value="<?php echo $nama_pemilik;?>" />
															</div>
														</div>
														<div class="control-group">
															<label class="control-label" for="form-field-1">No. Rekening :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="no_rek" class="input-xxlarge" value="<?php echo $no_rek;?>" />
															</div>
														</div>
														<div class="form-actions">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
																<i class="icon-user"></i>
																Simpan Data
															</button>
														</div>
														</form>
													</div> <!-- END OF BANK INFO -->

													<div id="testimoni" class="tab-pane">
														<div class="space-10"></div>
														<form action="<?php echo base_url("administrator/c_home/testimoni_edit");?>" method="POST">
														
														<input type="hidden" id="form-field-1" name="id_anggota" class="input-xxlarge" value="<?php echo $id_anggota;?>" />
														
														<div class="control-group">
															<label class="control-label" for="form-field-1">Judul Testimoni :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="judul_testi" class="input-xxlarge" value="<?php echo $judul_testi; ?>" />
															</div>
														</div>

														<div class="control-group">
															<label class="control-label" for="form-field-1">Isi Testimoni :</label>

															<div class="controls">
																<textarea name="isi" class="input-xxlarge"><?php echo $isi; ?></textarea>
															</div>
														</div>
														<div class="form-actions">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
																<i class="icon-user"></i>
																Simpan Data
															</button>
														</div>
														</form>
													</div> <!-- END OF TESTIMONI INFO -->

													<div id="masterID" class="tab-pane">
														<div class="space-10"></div>
														<form action="<?php echo base_url("administrator/c_home/updateMasterID");?>" method="POST">
														
														<input type="hidden" id="form-field-1" name="id_anggota" class="input-xxlarge" value="<?php echo $id_anggota;?>" />
														
														<div class="control-group">
															<label class="control-label" for="form-field-1">Master ID (BMI Pusat) :</label>

															<div class="controls">
																<input type="text" id="form-field-1" name="MasterID" class="input-xxlarge" value="<?php echo $MasterID; ?>" />
															</div>
														</div>

														
														<div class="form-actions">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
																<i class="icon-user"></i>
																Simpan Data
															</button>
														</div>
														</form>
													</div> <!-- END OF BANK INFO -->
													<div id="password" class="tab-pane">
														<div class="space-10"></div>
														<form action="<?php echo base_url("administrator/c_home/updatePassword");?>" method="POST">
														
														<input type="hidden" id="form-field-1" name="id_anggota" class="input-xxlarge" value="<?php echo $id_anggota;?>" />
														
														<div class="control-group">
															<label class="control-label" for="form-field-1">Ganti Password :</label>

															<div class="controls">
																<input type="password" id="form-field-1" name="password" class="input-xxlarge" />
															</div>
														</div>

														
														<div class="form-actions">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
																<i class="icon-user"></i>
																Simpan Data
															</button>
														</div>
														</form>
													</div> <!-- END OF BANK INFO -->

												</div>
											</div>
									</div><!--/span-->
								</div><!--/user-profile-->