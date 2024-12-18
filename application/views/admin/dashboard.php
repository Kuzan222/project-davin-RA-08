<style>
	.table-responsive {
		width: 100%;
		overflow-x: auto; /* Tabel dapat digulir jika melebihi layar */
	}

	.table {
		width: 100%; /* Lebarkan tabel agar memenuhi lebar kontainer */
		table-layout: fixed; /* Mengontrol lebar kolom secara proporsional */
	}

	.table th,
	.table td {
		word-wrap: break-word; /* Pecah teks panjang jika melebihi kolom */
		text-align: left; /* Rata kiri konten */
		padding: 12px; /* Jarak antar konten */
	}

	.card {
		width: 100%; /* Lebar penuh untuk card */
	}

	.card-body {
		padding: 15px; /* Memberikan ruang internal */
	}
</style>

<div class="content">
	<div class="page-header">
		<div class="page-title">
			<h4>Saran Pengguna</h4>
		</div>
	</div> <!-- Tutup elemen header -->

	<div class="card">
		<div class="card-body">
			<div class="table-top">
				<div class="search-set">
					<div class="search-path">
						<a class="btn btn-filter" id="filter_search">
							<img src="<?= base_url('template') ?>/assets/img/icons/filter.svg" alt="Filter Icon">
							<span>
								<img src="<?= base_url('template') ?>/assets/img/icons/closes.svg" alt="Close Icon">
							</span>
						</a>
					</div>
					<div class="search-input">
						<a class="btn btn-searchset">
							<img src="<?= base_url('template') ?>/assets/img/icons/search-white.svg" alt="Search Icon">
						</a>
					</div>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table datanew dataTable no-footer" id="DataTables_Table_0" style="width: 100%;" role="grid" aria-describedby="DataTables_Table_0_info">
					<thead>
						<tr role="row">
							<th style="width: 5%;">
								<label class="checkboxs">
									<input type="checkbox">
								</label>
							</th>
							<th style="width: 5%;">No</th>
							<th style="width: 30%;">Saran</th>
							<th style="width: 20%;">Nama</th>
							<th style="width: 20%;">Tanggal</th>
							<th style="width: 20%;">Email</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($saran as $sa): ?>
						<tr>
							<td>
								<label class="checkboxs">
									<input type="checkbox">
								</label>
							</td>
							<td><?= $no++; ?></td>
							<td><?= htmlspecialchars($sa['saran']); ?></td>
							<td><?= htmlspecialchars($sa['nama']); ?></td>
							<td><?= htmlspecialchars($sa['tanggal']); ?></td>
							<td><?= htmlspecialchars($sa['email']); ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	// Fungsi pencarian tabel
	document.getElementById('searchBox').addEventListener('input', function () {
		let filter = this.value.toLowerCase(); // Ambil teks dari kotak pencarian dan ubah menjadi huruf kecil
		let rows = document.querySelectorAll('#DataTables_Table_0 tbody tr'); // Semua baris di tabel

		// Loop setiap baris
		rows.forEach(row => {
			let cells = row.querySelectorAll('td'); // Semua sel dalam baris
			let found = false;

			// Periksa setiap sel dalam baris
			cells.forEach(cell => {
				if (cell.textContent.toLowerCase().includes(filter)) {
					found = true; // Jika ada teks yang cocok
				}
			});

			// Tampilkan baris jika ditemukan, sembunyikan jika tidak
			row.style.display = found ? '' : 'none';
		});
	});
</script>