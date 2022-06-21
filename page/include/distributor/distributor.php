<?php
// jangan lupa koneksi
require_once "../config/koneksi.php";

// cuma untuk role admin yang bisa crud
// ambil dari session yang sudah di buat saat proses login
$idUser = $_SESSION["id_user"];
$dataUser = query("SELECT * FROM users WHERE id = $idUser");
$role = $dataUser[0]["role"];
?>
<div class="col-lg-8 mt-3 mt-md-0">
	<div class="card card-data">
		<div class="card-header bg-info">
			<h5>Data Distributor</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex justify-content-between mb-5 mt-3">
						<?php if ($role == "admin") { ?>
							<button type="button" data-bs-toggle="modal" data-bs-target="#modalTambahDistributor" class="btn btn-sm btn-success">+Tambah Data</button>
						<?php } ?>
					</div>

					<div class="table-responsive">
						<table class="table table-sm" id="table-distributor">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Distributor</th>
									<th>Nama Distributor</th>
									<th>Kota</th>
									<th>Kode Outlet</th>
									<th>Nama Outlet</th>
									<th>Alamat</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$dis = query("SELECT * FROM tb_distributor");
								foreach ($dis as $row) {
								?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $row["kode_distributor"]; ?></td>
										<td><?= $row["nama_distributor"]; ?></td>
										<td><?= $row["kota"]; ?></td>
										<td><?= $row["kode_outlet"]; ?></td>
										<td><?= $row["nama_outlet"]; ?></td>
										<td><?= $row["alamat"]; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalTambahDistributor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahDistributorLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahDistributorLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="include/distributor/proses/proses-tambah.php" method="POST">
				<div class="modal-body">
					<div class="mb-3">
						<label for="kode_distributor" class="form-label">Kode Distributor</label>
						<input type="text" class="form-control" name="kode_distributor" required>
					</div>
					<div class="mb-3">
						<label for="nama_distributor" class="form-label">Nama Distributor</label>
						<input type="text" class="form-control" name="nama_distributor" required>
					</div>
					<div class="mb-3">
						<label for="kota" class="form-label">Kota</label>
						<input type="text" class="form-control" name="kota" required>
					</div>
					<div class="mb-3">
						<label for="kode_outlet" class="form-label">Kode Outlet</label>
						<input type="text" class="form-control" name="kode_outlet" required>
					</div>
					<div class="mb-3">
						<label for="nama_outlet" class="form-label">Nama Outlet</label>
						<input type="text" class="form-control" name="nama_outlet" required>
					</div>

					<div class="mb-3">
						<label for="alamat" class="form-label">Alamat</label>
						<textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required></textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#table-distributor").DataTable();
	});
</script>