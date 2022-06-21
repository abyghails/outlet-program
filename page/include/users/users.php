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
			<h5>Data Users</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<?php if ($role == "admin") { ?>
						<div class="d-flex justify-content-between mb-5 mt-3">
							<a href="?page=tambah-data-users" class="btn btn-sm btn-success">+Tambah Data</a>
							<a href="?page=view-data-users" class="btn btn-sm btn-success">+View Data Before</a>
						</div>
					<?php } ?>
					<div class="table-responsive">
						<table class="table table-sm" id="table-users">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Role</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								if ($role == 'admin') {
									$data = query("SELECT * FROM users ");
								} else if ($role == "user") {
									$data = query("SELECT * FROM users WHERE role ='user' ");
								} else if ($role == "user1") {
									$data = query("SELECT * FROM users WHERE role ='user1' ");
								} else {
									$data = query("SELECT * FROM users WHERE WHERE id = $idUser ");
								}
								foreach ($data as $item) {
								?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $item["nama"]; ?></td>
										<td><?= $item["username"]; ?></td>
										<td><?= $item["role"]; ?></td>
										<td>
											<div class="d-flex justify-content-center gap-2">
												<?php if ($role == "admin") { ?>
													<a href="?page=edit-data-users&id=<?= $item['id']; ?>" class="btn btn-sm btn-warning">
														<i class="fa fa-pen"></i>
													</a>
													<a href="include/users/proses/hapus-users.php?id=<?= $item['id']; ?>" onclick="return confirm('Yakin mau di hapus?');" class="btn btn-sm btn-danger">
														<i class="fa fa-trash"></i>
													</a>
												<?php } ?>

												<a href="include/users/cetak/pdf/cetak-pdf-person.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-info text-white">
													PDF
												</a>
												<a href="include/users/cetak/excel/cetak-excel-person.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-info text-white">
													Excel
												</a>
											</div>
										</td>
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

<!-- untuk memanggil datatable -->
<script>
	$(document).ready(function() {
		$("#table-users").DataTable();
	});
</script>