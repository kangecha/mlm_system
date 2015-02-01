<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>- Halaman Resgistrasi BMI -</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" /> -->
				
		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									

									<div id="signup-box" class="signup-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="icon-group blue"></i>
													Masukan Kode Konfirmasi
												</h4>

												<div class="space-6"></div>
												

												<form action="<?php echo base_url("user/c_konfirmasi/kode");?>" method="POST">
													<fieldset>
														<label>
															<center>PENDAFTARAN ANDA BERHASIL<br>
															SILAHKAN CEK EMAIL ANDA/SPAM<br>
															DAN MASUKAN KODE KONFIRMASI ANDA
															</center>
														</label>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" name="inputkode" class="span12" placeholder="Masukan Kode Konfirmasi Di Sini" />
																<i class="icon-barcode"></i>
															</span>
														</label>

														<div class="space-24"></div>

														<div class="clearfix">
															<button type="reset" class="width-30 pull-left btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button id="regist"  class="width-65 pull-right btn btn-small btn-success">
																<i class="icon-barcode"></i>
																Konfirmasi Akun
															</button>
																
																
														</div>
													</fieldset>
												</form>
											</div>

											<div class="toolbar center">
												<a href="<?php echo base_url("user/c_login"); ?>" class="back-to-login-link">
													<i class="icon-arrow-left"></i>
													Back to login
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/signup-box-->

								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url(); ?>/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="<?php echo base_url(); ?>/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>

	</body>
</html>
