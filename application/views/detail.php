<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title><?=$judul; ?></title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="<?= base_url('fruit/')?>assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?= base_url('fruit/')?>assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url('fruit/')?>assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?= base_url('fruit/')?>assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?= base_url('fruit/')?>assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?= base_url('fruit/')?>assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?= base_url('fruit/')?>assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="<?= base_url('fruit/')?>assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="<?= base_url('fruit/')?>assets/css/responsive.css">

</head>

<body>
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="<?= base_url(); ?>">
								<img src="<?= base_url('fruit/') ?>assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<!-- Home menu -->
								<li class="<?= ($this->uri->segment(1) == '') ? 'current-list-item active' : '' ?>">
									<a href="<?= base_url('') ?>">Home</a>
								</li>
								<!-- Dynamic Categories -->
								<?php foreach ($kategori as $kate) { 
            $active = ($this->uri->segment(2) == 'kategori' && $this->uri->segment(3) == $kate['id_kategori']) ? 'active' : ''; 
        ?>
								<li class="<?= $active ?>">
									<a href="<?= base_url('home/kategori/'.$kate['id_kategori']) ?>">
										<?= $kate['nama_kategori'] ?>
									</a>
								</li>
								<?php } ?>
								<!-- Gallery -->
								<li class="<?= ($this->uri->segment(1) == 'gallery') ? 'active' : '' ?>">
									<a href="<?= base_url('home/galeri') ?>">Gallery</a>
								</li>
								<li></li>
							</ul>
						</nav>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Read the Details</p>
						<h1>Details Konten</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single article section -->
	<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-article-section">
						<div class="single-article-text">
							<div class="article-img-container">
								<img src="<?= base_url('template/upload/konten/' . $konten->foto) ?>"
									class="img-fluid rounded" alt="<?= $konten->judul ?>" />
							</div>
							<p class="blog-meta" style="margin-top: 20px;">
								<span class="author"><i class="fas fa-user"></i><?= $konten->nama; ?></span>
								<span class="date"><i class="fas fa-calendar"></i><?= $konten->nama_kategori; ?></span>
							</p>
							<h2><?= $konten->judul; ?></h2>
							<?php
                            // Memecah keterangan berdasarkan baris baru
                            $paragraf = explode("\n", $konten->keterangan);
                            foreach ($paragraf as $p) {
                                echo '<p>' . nl2br(trim($p)) . '</p>';
                            }
                        ?>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-section">
						<div class="archive-posts">
							<h4>Category</h4>
							<ul>
								<?php foreach ($kategori as $kate) { ?>
								<li><a href="<?= base_url('home/kategori/'.$kate['id_kategori'])?>">
										<?= $kate['nama_kategori']?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- Back Button -->
			<div class="row mt-3">
				<div class="col-12">
					<button onclick="window.history.back();" class="btn btn-secondary">
						<i class="fas fa-arrow-left"></i> Back
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end single article section -->


	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title"><?= $konfig->judul_website?></h2>
						<p><?= $konfig->profil_website?></p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d877.7349853242688!2d110.9505816896883!3d-7.590431020366527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e654b99ab219bfd%3A0x4e63f4d5cebe448a!2sSMKN%202%20Karanganyar!5e0!3m2!1sen!2sid!4v1734483285702!5m2!1sen!2sid"
								height="200px" width="100% style=" border:0;" allowfullscreen="" loading="lazy"
								referrerpolicy="no-referrer-when-downgrade" "></iframe>
							<li><?= $konfig->email?></li>
							<li>+<?= $konfig->no_wa?></li>
						</ul>
					</div>
				</div>
				<div class=" col-lg-3 col-md-6">
								<div class="footer-box pages">
									<h2 class="widget-title">Pages</h2>
									<ul>
										<li><a href="<?= base_url('');?>">Home</a></li>
										<?php foreach ($kategori as $kate) { ?>
										<li><a
												href="<?= base_url('home/kategori/'.$kate['id_kategori'])?>"><?= $kate['nama_kategori']?></a>
										</li>
										<?php } ?>
										<li><a href="<?= base_url('home/galeri') ?>">Gallery</a></li>
									</ul>
								</div>
					</div>
					<!-- Suggestion Section -->
					<div class="col-lg-3 col-md-6">
						<div class="footer-box">
							<h2 class="widget-title" style="color: white;">Masukkan Saran</h2>
							<form action="<?= base_url('saran') ?>" method="post"
								style="padding: 10px; border: 1px solid orange; border-radius: 8px;">
								<!-- Saran -->
								<div class="form-group">
									<label for="saran" style="color: white;">Saran</label>
									<textarea name="saran" id="saran" rows="3" class="form-control"
										placeholder="Masukkan Saran"
										style="border: 1px solid orange; border-radius: 4px; color: black;"></textarea>
								</div>

								<!-- Tanggal -->
								<div class="form-group">
									<label for="tanggal" style="color: white;">Tanggal</label>
									<input type="date" name="tanggal" id="tanggal" class="form-control"
										style="border: 1px solid orange; border-radius: 4px; color: black;">
								</div>

								<!-- Nama -->
								<div class="form-group">
									<label for="nama" style="color: white;">Nama</label>
									<input type="text" name="nama" id="nama" class="form-control"
										placeholder="Masukkan Nama"
										style="border: 1px solid orange; border-radius: 4px; color: black;">
								</div>

								<!-- Email -->
								<div class="form-group">
									<label for="email" style="color: white;">Email</label>
									<input type="email" name="email" id="email" class="form-control"
										placeholder="Masukkan Email"
										style="border: 1px solid orange; border-radius: 4px; color: black;">
								</div>

								<!-- Submit Button -->
								<button type="submit" class="btn"
									style="background-color: orange; color: white; border: none; width: 100%; border-radius: 4px;">
									Kirim
								</button>
							</form>
						</div>
					</div>
					<style>
						.btn:hover {
							background-color: black;
							color: white;
						}

					</style>

				</div>
			</div>
		</div>
		<!-- end footer -->
		<!-- copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<p>Copyrights &copy; 2024 - <a href="https://imransdesign.com/">Davin Arman</a>, All Rights
							Reserved.</p>
					</div>
					<div class="col-lg-6 text-right col-md-12">
						<div class="social-icons">
							<ul>
								<li><a href="<?= $konfig->facebook?>" target="_blank"><i
											class="fab fa-facebook-f"></i></a>
								</li>
								<li><a href="<?= $konfig->instagram?>" target="_blank"><i
											class="fab fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end copyright -->


		<!-- jquery -->
		<script src="<?= base_url('fruit/')?>assets/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap -->
		<script src="<?= base_url('fruit/')?>assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- count down -->
		<script src="<?= base_url('fruit/')?>assets/js/jquery.countdown.js"></script>
		<!-- isotope -->
		<script src="<?= base_url('fruit/')?>assets/js/jquery.isotope-3.0.6.min.js"></script>
		<!-- waypoints -->
		<script src="<?= base_url('fruit/')?>assets/js/waypoints.js"></script>
		<!-- owl carousel -->
		<script src="<?= base_url('fruit/')?>assets/js/owl.carousel.min.js"></script>
		<!-- magnific popup -->
		<script src="<?= base_url('fruit/')?>assets/js/jquery.magnific-popup.min.js"></script>
		<!-- mean menu -->
		<script src="<?= base_url('fruit/')?>assets/js/jquery.meanmenu.min.js"></script>
		<!-- sticker js -->
		<script src="<?= base_url('fruit/')?>assets/js/sticker.js"></script>
		<!-- main js -->
		<script src="<?= base_url('fruit/')?>assets/js/main.js"></script>

</body>

</html>
