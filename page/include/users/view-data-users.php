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
			<h5>Data Users before</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<?php if ($role == "admin") { ?>
						
					<?php } ?>
					<div class="table-responsive">
						<table class="table table-sm" id="table-users">
							<thead>
								<tr>
									<th>No</th>
									<th>id_before</th>
									<th>users_before</th>
									<th>Username</th>
									<th>Role</th>
									<th>id</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$data = query("SELECT * FROM users_before");
								foreach ($data as $item) {
								?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $item["id_before"]; ?></td>
										<td><?= $item["users_before"]; ?></td>
										<td><?= $item["users_now"]; ?></td>
										<td><?= $item["role"]; ?></td>
										<td><?= $item["id"]; ?></td>

									</tr>
									<!-- modal edit dan hapus-->

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