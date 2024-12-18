<div id="ngilang">
	<?= $this->session->flashdata('alert') ?>
</div>
<div class="content">
	<div class="page-header">
		<div class="page-title">
			<h4>Data Pengguna</h4>
			<h6>Manage your User</h6>
		</div>
		<div class="card-content">
			<div class="card-body">
				<div class="form-group">
					<!-- Button trigger for login form modal -->
					<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
						data-bs-target="#inlineForm">
						Tambah User
					</button>
				</div>
			</div>
		</div>

		<!--login form Modal -->
		<div class="modal fade text-left" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33"
			style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel33">Tambah User</h4>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<i data-feather="x"></i>
						</button>
					</div>
					<form action="<?= base_url('admin/user/simpan')?>" method="post">
						<div class="modal-body">
							<label>Nama: </label>
							<div class="form-group">
								<input type="text" placeholder="Nama" class="form-control" name="nama">
							</div>
							<label>Username: </label>
							<div class="form-group">
								<input type="text" placeholder="Username" class="form-control" name="username">
							</div>
							<label>Password: </label>
							<div class="form-group">
								<input type="password" placeholder="Password" class="form-control" name="password">
							</div>
						</div>
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
							<span><img src="<?= base_url('template') ?>/assets/img/icons/closes.svg" alt="img"></span>
						</a>
					</div>
					<div class="search-input">
						<a class="btn btn-searchset"><img
								src="<?= base_url('template') ?>/assets/img/icons/search-white.svg" alt="img"></a>
						<div id="DataTables_Table_0_filter" class="dataTables_filter">
							<label><input type="search" class="form-control form-control-sm" id="search-input"
									placeholder="Search..." aria-controls="DataTables_Table_0"></label>
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
								<th style="width: 20%;">Username</th>
								<th style="width: 20%;">Nama</th>
								<th style="width: 15%;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
                                $no = 1;
                                foreach ($user as $aa) { ?>
							<tr class="odd">
								<td class="sorting_1">
									<label class="checkboxs">
										<input type="checkbox">
									</label>
								</td>
								<td><?= $no++; ?></td>
								<td><?= $aa['username']; ?></td>
								<td><?= $aa['nama']; ?></td>
								<td>
									<div class="d-flex align-items-center">
										<a class="me-3"
											href="<?php echo site_url('admin/user/hapus/'.$aa['id_user']);?>">
											<img src="<?= base_url('template') ?>/assets/img/icons/delete.svg"
												alt="img">
										</a>
										<button type="button" class="btn p-0" data-bs-toggle="modal"
											data-bs-target="#editUserModal<?= $aa['id_user']; ?>">
											<img src="<?= base_url('template') ?>/assets/img/icons/edit.svg" alt="img">
										</button>
									</div>
								</td>

							</tr>

							<!-- Modal Edit User -->
							<div class="modal fade" id="editUserModal<?= $aa['id_user']; ?>" tabindex="-1"
								aria-labelledby="editUserModalLabel<?= $aa['id_user']; ?>" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="editUserModalLabel<?= $aa['id_user']; ?>">Edit
												User</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close">
												<i data-feather="x"></i>
											</button>
										</div>
										<form action="<?= base_url('admin/user/update') ?>" method="post">
											<input type="hidden" name="id_user" value="<?= $aa['id_user']?>">
											<div class="modal-body">
												<label>Nama: </label>
												<div class="form-group">
													<input type="text" class="form-control" name="nama"
														value="<?= $aa['nama']; ?>">
												</div>
												<label>Username: </label>
												<div class="form-group">
													<input type="text" class="form-control" name="username"
														value="<?= $aa['username']; ?>" readonly>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-dark"
													data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
