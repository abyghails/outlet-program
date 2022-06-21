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
			<h5>Data Provinsi</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex justify-content-between mb-5 mt-3">
						<?php if ($role == "admin") { ?>
							<button type="button" data-bs-toggle="modal" data-bs-target="#modalTambahProvinsi" class="btn btn-sm btn-success">+Tambah Data</button>
						<?php } ?>
					</div>

					<div class="table-responsive">
						<table class="table table-sm" id="table-provinsi">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Provinsi</th>
									<th>comid</th>
									<!-- <?php if ($role == "admin") { ?>
										<th>Action</th>
									<?php } ?> -->
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$provinsi = query("SELECT * FROM provinsi ORDER BY nama_provinsi ASC");
								foreach ($provinsi as $data) {
								?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $data["nama_provinsi"]; ?></td>
										<td><?= $data["comid"]; ?></td>
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

<!-- Modal -->
<div class="modal fade" id="modalTambahProvinsi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahProvinsiLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahProvinsiLabel">Tambah Provinsi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="include/provinsi/proses/tambah-provinsi.php" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="nama_provinsi" class="form-label">Nama Provinsi</label>
						<input type="text" class="form-control" name="nama_provinsi" required>
					</div>
					<div class="mb-3">
						<label for="comid" class="form-label">comid</label>
						<input type="text" class="form-control" name="comid" required>
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
		$("#table-provinsi").DataTable();
	});
</script>