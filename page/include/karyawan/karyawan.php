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
			<h5>Data Karyawan</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex justify-content-between mb-5 mt-3">
						<?php if ($role == "admin") { ?>
							<button type="button" data-bs-toggle="modal" data-bs-target="#modalTambahKaryawan" class="btn btn-sm btn-success">+Tambah Data</button>
							<?php include "modal/tambah-data.php"; ?>
						<?php } ?>
						<div class="button-cetak">
							<a href="include/karyawan/cetak/pdf/cetak-pdf.php" target="_blank" class="btn btn-sm btn-primary">Print PDF</a>
							<a href="include/karyawan/cetak/excel/cetak-excel.php" class="btn btn-sm btn-primary">Print Excel</a>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-sm" id="table-karyawan">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Tanggal Lahir</th>
									<th>Alamat</th>
									<th>Jabatan</th>
									<?php if ($role == "admin") { ?>
										<th>Action</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$data = query("SELECT * FROM karyawan");
								foreach ($data as $item) {
								?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $item["nama"]; ?></td>
										<td><?= $item["tgl_lahir"]; ?></td>
										<td><?= $item["alamat"]; ?></td>
										<td><?= $item["jabatan"]; ?></td>
										<?php if ($role == "admin") { ?>
											<td>
												<div class="d-flex justify-content-center gap-2">
													<a data-bs-toggle="modal" data-bs-target="#modalEditKaryawan<?= $item['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
													<a data-bs-toggle="modal" data-bs-target="#modalHapusKaryawan<?= $item['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
												</div>
											</td>
										<?php } ?>
									</tr>
									<!-- modal edit dan hapus-->
									<?php include "include/karyawan/modal/modal-edit.php"; ?>
									<?php include "include/karyawan/modal/modal-hapus.php"; ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#table-karyawan").DataTable();
	});
</script>