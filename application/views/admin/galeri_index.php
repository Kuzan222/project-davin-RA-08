<div id="ngilang">
	<?= $this->session->flashdata('alert') ?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Gallery</title>

	<link rel="stylesheet" href="<?= base_url('template') ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('template') ?>/assets/plugins/fileupload/fileupload.min.css">
	<link rel="stylesheet" href="<?= base_url('template') ?>/assets/css/style.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card mb-4">
					<div class="card-header">
						<h5 class="card-title">Tambah Galeri</h5>
					</div>
					<div class="card-body">
						<!-- Form untuk submit data -->
						<form action="<?= base_url('admin/galeri/simpan') ?>" method="post"
							enctype="multipart/form-data">
							<!-- Input judul -->
							<div class="mb-3">
								<label for="judul" class="form-label">Judul Gallery</label>
								<input type="text" class="form-control" name="judul_galeri" placeholder="Masukkan Judul"
									required>
							</div>

							<!-- Input file gambar -->
							<div class="custom-file-container" data-upload-id="myFirstImage">
								<label>Upload Foto :
									<a href="javascript:void(0)" class="custom-file-container__image-clear"
										title="Clear Image"></a>
								</label>
								<label class="custom-file-container__custom-file">
									<input type="file" class="custom-file-container__custom-file__custom-file-input"
										accept="image/*" onchange="previewImage(event)" name="foto">
									<input type="hidden" name="MAX_FILE_SIZE" value="10485760">
									<span class="custom-file-container__custom-file__custom-file-control"></span>
								</label>
								<div class="custom-file-container__image-preview">
									<!-- Preview image -->
									<img id="previewImage" src="#" alt="Preview Gambar"
										style="max-width: 100%; height: auto; display: none;">
								</div>
							</div>

							<!-- Tombol submit -->
							<button type="submit" class="btn btn-primary mt-3">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php foreach($galeri as $aa) {?>
	<div class="col-md-12 mb-3 mt-3">
		<div class="card h-100">
			<img class="card-img-top" src="<?= base_url('template/upload/galeri/'.$aa['foto_galeri'])?>">
			<div class="card-body">
				<h5 class="card-title"><?= $aa['judul_galeri']?></h5>
				<a class="me-3" href="<?= site_url('admin/galeri/hapus/' . $aa['foto_galeri']); ?>" title="Delete">
					<i class="bi bi-trash" style="font-size: 20px;"></i> 
				</a>
			</div>
		</div>
	</div>
	<?php } ?>

	<script src="<?= base_url('template') ?>/assets/js/jquery-3.6.0.min.js"></script>
	<script src="<?= base_url('template') ?>/assets/plugins/fileupload/fileupload.min.js"></script>
	<script src="<?= base_url('template') ?>/assets/js/bootstrap.bundle.min.js"></script>

	<script>
		function previewImage(event) {
			const file = event.target.files[0];
			const preview = document.getElementById('previewImage');

			if (file) {
				preview.style.display = "none"; // Hide the image preview initially
				const reader = new FileReader();
				reader.onload = function (e) {
					preview.src = e.target.result;
					preview.style.display = "block"; // Show image preview once loaded
				};
				reader.readAsDataURL(file);
			} else {
				preview.src = "";
				preview.style.display = "none";
			}
		}

	</script>

</body>

</html>
