<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title><?=$title;?></title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="<?= base_url('fruit/') ?>assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?= base_url('fruit/') ?>assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url('fruit/') ?>assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?= base_url('fruit/') ?>assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?= base_url('fruit/') ?>assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?= base_url('fruit/') ?>assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?= base_url('fruit/') ?>assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="<?= base_url('fruit/') ?>assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="<?= base_url('fruit/') ?>assets/css/responsive.css">

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
						<p>Eksplor & Enjoy</p>
						<h1>Halaman Gallery</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end breadcrumb section -->
	<section class="gallery-block gallery-front" style="margin-top: 100px;">
		<div class="text-center text-blue mb-50" style="margin-top: 150px; margin-bottom: 50px;">
			<h1 style="font-family:Poppins;">Gallery Tawangmangu</h1>
		</div>
		<div class="container">
			<div class="row g-3">
				<!-- Mengurangi g-spacing dari g-4 ke g-3 -->
				<?php foreach ($galeri as $aa) { ?>
				<div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:30px;">
					<!-- Mengurangi margin bawah -->
					<div class="gallery-item text-center">
						<!-- Trigger modal -->
						<a href="#" class="open-modal"
							data-img="<?= base_url('template/upload/galeri/' . $aa['foto_galeri']) ?>"
							data-title="<?= $aa['judul_galeri'] ?>">
							<img src="<?= base_url('template/upload/galeri/' . $aa['foto_galeri']) ?>"
								alt="Gambar Galeri" class="gallery-img img-thumbnail"
								style="width: 100%; height: auto; max-width: 400px; max-height: 250px; object-fit: cover;">
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="imageModalLabel"></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-center">
					<img src="" alt="Gambar Galeri" class="img-fluid" id="modalImage">
				</div>
			</div>
		</div>
	</div>


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
							<li><?= $konfig->alamat?></li>
							<li><?= $konfig->email?></li>
							<li>+<?= $konfig->no_wa?></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="<?= base_url('');?>">Home</a></li>
							<?php foreach ($kategori as $kate) { ?>
							<li><a
									href="<?= base_url('home/kategori/'.$kate['id_kategori'])?>"><?= $kate['nama_kategori']?></a>
							</li>
							<?php } ?>
							<li><a href="services.html">Gallery</a></li>
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
							<li><a href="<?= $konfig->facebook?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li><a href="<?= $konfig->instagram?>" target="_blank"><i class="fab fa-instagram"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="<?= base_url('fruit/') ?>assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="<?= base_url('fruit/') ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="<?= base_url('fruit/') ?>assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="<?= base_url('fruit/') ?>assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="<?= base_url('fruit/') ?>assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="<?= base_url('fruit/') ?>assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="<?= base_url('fruit/') ?>assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="<?= base_url('fruit/') ?>assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="<?= base_url('fruit/') ?>assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="<?= base_url('fruit/') ?>assets/js/main.js"></script>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const modal = document.getElementById('imageModal');
			const modalImage = document.getElementById('modalImage');
			const modalTitle = document.getElementById('imageModalLabel');

			document.querySelectorAll('.open-modal').forEach(function (element) {
				element.addEventListener('click', function (e) {
					e.preventDefault();
					const imgSrc = this.getAttribute('data-img');
					const title = this.getAttribute('data-title');
					modalImage.src = imgSrc;
					modalTitle.textContent = title;
					new bootstrap.Modal(modal).show();
				});
			});
		});

	</script>

	<style>
		#modalImage {
			max-width: 100%;
			max-height: 80vh;
			object-fit: contain;
		}

	</style>


	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
