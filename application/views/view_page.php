<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $judul_berita; ?> ~ BMI Tiger - Member of PT. Berkat Merdeka Indonesia :.</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/main-style.css")?>">
	<!-- Slider -->
        <link href="<?php echo base_url() ?>assets/css/quake.slider.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/quake.skin.css" rel="stylesheet" type="text/css" /> 
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/quake.slider-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/slider.js" type="text/javascript"></script> 
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="pembatas">
		<div class="header">
			<img src="<?php echo base_url();?>/assets/images/header.png">
		</div>
		<div class="slider">
			<!-- Quake Image Slider -->
	    	<div class="quake-slider">
	    		  	<div class="quake-slider-images">
	    		  		<?php foreach ($slider as $slide) {?>
	                		<a target="_blank" href="javascript:">
	                   			<img src="<?php echo base_url();?>assets/images/slider/<?php echo $slide['file'] ?>" alt="" />
	                		</a>
			      		<?php } ?>
	      			</div>

	      			<div class="quake-slider-captions">
	    		  		<?php foreach ($slider as $caption) {?>
	         			<div class="quake-slider-caption">
	                  			<?php echo $caption['judul_slider']; ?>
	             		</div>
	              		<?php } ?>
	          		</div>
	    	</div>
			<!-- /Quake Image Slider -->
		</div>
		<div class="tengah">
				<div class="sidebar">
					<a href="<?php echo base_url("user/c_login");?>"><img src="<?php echo base_url();?>/assets/images/login1.jpg"></a>
					<p>
						Hubungi Sponsor Anda:<br>
						<strong><?php echo $namasponsor;?></strong><br>
						Hp/Telp. <?php echo $telp;?><br>
					</p>
					<hr>
					<a href="<?php echo base_url("c_page/index/cara-bergabung");?>"><img src="<?php echo base_url();?>/assets/images/cara-bergabung.jpg"></a>
					<center>Mau jadi Distributor/Member? <br>Klik Disini Untuk Cara JOIN!</center>
					<hr>
					<center><strong>HALAMAN</strong></center><hr>
						<img src="<?php echo base_url("assets/img/orange_bullet.png");?>"> <a href="<?php echo base_url(); ?>">Halaman Utama</a><br>
						<?php foreach ($sidebar as $dtsidebar) { ?>
							<img src="<?php echo base_url("assets/img/orange_bullet.png");?>"> <a href="<?php echo base_url("c_page/index"); ?>/<?php echo $dtsidebar['permalink']."/".$username; ?>"><?php echo $dtsidebar['judul_halaman']; ?></a><br>
						<?php } ?>
					<hr>
					<center><strong>BERITA TERKINI</strong></center><hr>
					<?php foreach ($berita as $dtberita) { ?>
						<img src="<?php echo base_url("assets/img/orange_bullet.png");?>"> <a href="<?php echo base_url("c_page/viewberita"); ?>/<?php echo $dtberita['permalink']."/".$username; ?>"><?php echo $dtberita['judul_berita']; ?></a><br>
					<?php } ?>
					<hr>
					<?php foreach ($banner as $dtbanner) { ?>
						<a href="<?php echo $dtbanner['link']; ?>"><img src="<?php echo base_url("assets/images/banner"); ?>/<?php echo $dtbanner['file']; ?>" width="200px"></a>
					<?php } ?>
				</div>
				<div class="konten">
					<h2><?php echo $judul_berita; ?></h2>
					<p><?php echo $isi_berita; ?></p>
					<hr>
					<center>
						<a href="<?php echo base_url("c_page/index/cara-bergabung")."/".$username;?>"><img src="<?php echo base_url();?>/assets/images/cara-bergabung.gif"></a><br>
						<a href="<?php echo base_url("c_page/index/cara-bergabung")."/".$username;?>">Mau jadi Distributor/Member? Klik Disini Untuk Cara JOIN!</a><br>
						Butuh Bantuan?<br>
						Hubungi Saya Sebagai Tim Bisnis Anda<br>
						<?php echo $namasponsor;?><br>
						<?php echo $kota;?><br>
						Hp/Telp. <?php echo $telp;?><br>
						
						Web Bisnis : <a href="http://bmi-eksekutif.com/site/<?php echo $username;?>" target="_blank">www.bmi-eksekutif.com/site/<?php echo $username;?></a><br>
						Toko Online : <a href="http://produkbmi.com/site/<?php echo $username;?>" target="_blank">www.produkbmi.com/site/<?php echo $username;?></a><br>
					</center>
				</div>
		</div>
		<div class="footer">
			<img src="<?php echo base_url();?>/assets/images/footer.png">
			<center>Website ini bukan milik perusahaan BMI, melainkan milik member BMI <br>sebagai web support 
			untuk tim yang bergabung di grup BMI TIGER<br>
			Website ini SUDAH DI VERIFIKASI (no register : <?php echo $this->session->userdata('id_referal');?>) <br>oleh PT BMI sebagai web support resmi</center>
		</div>
	</div>
</body>
</html>