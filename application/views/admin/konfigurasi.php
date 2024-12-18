<div id="ngilang">
	<?= $this->session->flashdata('alert') ?>
</div>
<form action="<?= base_url('admin/konfigurasi/update') ?>" method="post">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalCenterTitle">Konfigurasi</h5>
		</div>
		<div class="modal-body">
			<!-- Input Judul -->
			<div class="form-group">
				<label for="judul">Judul Website :</label>
				<div class="form-group">
					<input type="text" name="judul" class="form-control"
						value="<?= $konfig->judul_website; ?>">
				</div>
			</div>

			<label for="kategori">Profile :</label>
			<div class="form-group">
				<textarea name="profil_website" class="form-control"><?= $konfig->profil_website; ?></textarea>
			</div>
			<div class="form-group">
				<label for="judul">Facebook :</label>
				<div class="form-group">
					<input type="text" name="facebook" class="form-control" value="<?= $konfig->facebook; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="judul">Instagram :</label>
				<div class="form-group">
					<input type="text" name="instagram" class="form-control"
						value="<?= $konfig->instagram; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="judul">Email :</label>
				<div class="form-group">
					<input type="email" name="email" class="form-control" value="<?= $konfig->email; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="judul">Alamat :</label>
				<div class="form-group">
					<input type="text" name="alamat" class="form-control" value="<?= $konfig->alamat; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="judul">Whatsapp :</label>
				<div class="form-group">
					<input type="text" name="no_wa" class="form-control" value="<?= $konfig->no_wa; ?>">
				</div>
			</div>
		</div>

		<!-- Tombol Aksi -->
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary ml-1">
				<i class="bx bx-check d-block d-sm-none"></i>
				<span class="d-none d-sm-block">Simpan</span>
			</button>
		</div>
	</div>
</form>
