<div id="ngilang">
	<?= $this->session->flashdata('alert') ?>
</div>

<div class="content">
	<div class="page-header">
		<div class="page-title">
			<h4>Daftar Konten</h4>
			<h6>Manage your Konten</h6>
		</div>

		<div class="card-content">
			<div class="card-body">
				<div class="form-group">
					<!-- Button trigger for login form modal -->
					<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
						data-bs-target="#inlineForm">
						Tambah Konten
					</button>
				</div>
			</div>
		</div>

		<!-- Login Form Modal -->
		<div class="modal fade text-left modal-dialog-scrollable" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33"
			style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel33">Tambah Konten</h4>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<i data-feather="x"></i>
						</button>
					</div>
					<form action="<?= base_url('admin/konten/simpan') ?>" method="post" enctype='multipart/form-data'>
						<div class="modal-body">
							<!-- Input Judul -->
							<label for="judul">Judul :</label>
							<div class="form-group">
								<input type="text" id="judul" name="judul" class="form-control"
									placeholder="Masukkan Judul" required>
							</div>

							<!-- Input Kategori -->
							<label for="kategori">Kategori :</label>
							<div class="form-group">
								<select name="id_kategori" id="kategori" class="form-control">
									<option value="" disabled selected>Pilih Kategori</option>
									<?php foreach ($kategori as $aa) { ?>
									<option value="<?= $aa['id_kategori'] ?>">
										<?= $aa['nama_kategori'] ?>
									</option>
									<?php } ?>
								</select>
							</div>

							<!-- Input Keterangan -->
							<label for="keterangan">Keterangan :</label>
							<div class="form-group">
								<textarea id="keterangan" name="keterangan" class="form-control" rows="4"
									placeholder="Tambahkan Keterangan" required></textarea>
							</div>

							<!-- Input Foto -->
							<label for="foto">Foto :</label>
							<div class="form-group">
								<input type="file" id="foto" name="foto" class="form-control"
									accept="image/png, image/jpeg" onchange="previewImage(event)">
								<img id="previewImage" src="" alt="Pratinjau Foto"
									style="margin-top: 10px; max-width: 100%; height: auto; display: none;">
							</div>
						</div>

						<!-- Tombol Aksi -->
						<div class="modal-footer">
							<button type="button" class="btn btn-dark" data-bs-dismiss="modal">
								<i class="bx bx-x d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Close</span>
							</button>
							<button type="submit" class="btn btn-primary ml-1">
								<i class="bx bx-check d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Simpan</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

	<div class="card">
		<div class="card-body">
			<div class="table-top">
				<div class="search-set">
					<div class="search-path">
						<a class="btn btn-filter" id="filter_search">
							<img src="<?= base_url('template') ?>/assets/img/icons/filter.svg" alt="img">
							<span>
								<img src="<?= base_url('template') ?>/assets/img/icons/closes.svg" alt="img">
							</span>
						</a>
					</div>
					<div class="search-input">
						<a class="btn btn-searchset">
							<img src="<?= base_url('template') ?>/assets/img/icons/search-white.svg" alt="img">
						</a>
						<div id="DataTables_Table_0_filter" class="dataTables_filter">
							<label>
								<input type="search" class="form-control form-control-sm" placeholder="Search..."
									aria-controls="DataTables_Table_0">
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="table-responsive">
				<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
						aria-describedby="DataTables_Table_0_info">
						<thead>
							<tr role="row">
								<th style="width: 5%;">
									<label class="checkboxs">
										<input type="checkbox">
									</label>
								</th>
								<th style="width: 5%;">No</th>
								<th style="width: 20%;">Judul</th>
								<th style="width: 20%;">Kategori Konten</th>
								<th style="width: 20%;">Tanggal</th>
								<th style="width: 20%;">Creator</th>
								<th style="width: 20%;">Foto</th>
								<th style="width: 15%;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($konten as $aa): ?>
							<tr>
								<td>
									<label class="checkboxs">
										<input type="checkbox">
									</label>
								</td>
								<td><?= $no++; ?></td>
								<td><?= $aa['judul']; ?></td>
								<td><?= $aa['nama_kategori']; ?></td>
								<td><?= $aa['tanggal']; ?></td>
								<td><?= $aa['nama']; ?></td>
								<td>
									<!-- Button to trigger modal -->
									<a href="#" data-bs-toggle="modal"
										data-bs-target="#photoModal<?= $aa['id_konten']; ?>" style="color: blue;">
										<i class="bi bi-search"></i> See Photo
									</a>

									<!-- Modal -->
									<div class="modal fade" id="photoModal<?= $aa['id_konten']; ?>" tabindex="-1"
										aria-labelledby="photoModalLabel<?= $aa['id_konten']; ?>" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<!-- Modal Header -->
												<div class="modal-header">
													<h5 class="modal-title"
														id="photoModalLabel<?= $aa['id_konten']; ?>">Photo</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<!-- Modal Body -->
												<div class="modal-body text-center">
													<img src="<?= base_url('template/upload/konten/' . $aa['foto']); ?>"
														alt="Photo" class="img-fluid">
												</div>
												<!-- Modal Footer -->
												<div class="modal-footer">
													<button type="button" class="btn btn-primary"
														data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									<div class="d-flex align-items-center">
										<!-- Delete Icon (using Bootstrap Icons) -->
										<a class="me-3" href="<?= site_url('admin/konten/hapus/' . $aa['foto']); ?>"
											title="Delete">
											<i class="bi bi-trash" style="font-size: 20px;"></i> <!-- Delete Icon -->
										</a>

										<!-- Edit Icon (using Bootstrap Icons) with Black and White Filter -->
										<button type="button" class="btn btn-warning" data-bs-toggle="modal"
											data-bs-target="#konten<?= $no; ?>" title="Edit">
											<i class="bi bi-pencil"
												style="font-size: 20px; filter: grayscale(100%);"></i>
											<!-- Black and White Edit Icon -->
										</button>
									</div>
								</td>
							</tr>


							<!-- Modal Edit (Same as previous, unchanged) -->
							<div class="modal fade" id="konten<?= $no; ?>" tabindex="-1"
								aria-labelledby="editUserModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="editUserModalLabel"><?= $aa['judul']; ?></h4>
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>

										<!-- Modal Edit -->
										<form action="<?= base_url('admin/konten/update/' . $aa['id_kategori']) ?>"
											method="post" enctype="multipart/form-data">
											<input type="hidden" name="nama_foto" value="<?= $aa['foto']; ?>">
											<div class="modal-body">
												<!-- Input Judul -->
												<div class="mb-3">
													<label for="judul<?= $aa['id_kategori']; ?>"
														class="form-label">Judul :</label>
													<input type="text" class="form-control" name="judul"
														id="judul<?= $aa['id_kategori']; ?>"
														value="<?= $aa['judul']; ?>" required>
												</div>
												<!-- Input Kategori -->
												<div class="mb-3">
													<label for="kategori<?= $aa['id_kategori']; ?>"
														class="form-label">Kategori :</label>
													<select name="id_kategori" id="kategori<?= $aa['id_kategori']; ?>"
														class="form-control" required>
														<?php foreach ($kategori as $uu): ?>
														<option value="<?= $uu['id_kategori']; ?>"
															<?= $uu['id_kategori'] == $aa['id_kategori'] ? 'selected' : ''; ?>>
															<?= $uu['nama_kategori']; ?>
														</option>
														<?php endforeach; ?>
													</select>
												</div>
												<!-- Input Keterangan -->
												<div class="mb-3">
													<label for="keterangan<?= $aa['id_kategori']; ?>"
														class="form-label">Keterangan :</label>
													<textarea id="keterangan<?= $aa['id_kategori']; ?>"
														name="keterangan" class="form-control" rows="4"
														required><?= $aa['keterangan']; ?></textarea>
												</div>
												<!-- Input Foto -->
												<div class="mb-3">
													<label for="foto<?= $aa['id_kategori']; ?>" class="form-label">Foto
														:</label>
													<input type="file" id="foto<?= $aa['id_kategori']; ?>" name="foto"
														class="form-control" accept="image/png, image/jpeg">
													<small class="form-text text-muted">Foto sebelumnya:
														<?= $aa['foto']; ?></small>
												</div>
											</div>

											<!-- Footer dengan Tombol Aksi -->
											<div class="modal-footer">
												<button type="button" class="btn btn-dark"
													data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>

									</div>
								</div>
							</div>

							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
