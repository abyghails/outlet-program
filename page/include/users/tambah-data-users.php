<?php
// jangan lupa koneksi
//require_once "../config/koneksi.php";

// cuma untuk role admin yang bisa crud
// ambil dari session yang sudah di buat saat proses login
require_once "../config/koneksi.php";

$role = $_SESSION["role"];
$idUser = $_SESSION["id_user"];
$departid = 0;

?>

<div class="col-md-8 mt-3 mt-md-0">
	<div class="card card-data">
		<div class="card-header bg-info">
			<h5>Tambah Data Users</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex justify-content-between mb-5 mt-3">
						<a href="?page=users" class="btn btn-sm btn-secondary">Back</a>
					</div>

					<form action="include/users/proses/proses-tambah.php" method="POST">
						<div class="mb-3 row">
							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" name="nama" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="username" class="col-sm-2 col-form-label">Username</label>
							<div class="col-sm-10">
								<input type="text" name="username" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="password" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="role" class="col-sm-2 col-form-label">Role</label>
							<div class="col-sm-10">

								<select name="role" id="role" class="form-select" required>
									<option value="admin">Admin</option>
									<option value="user">User</option>
								</select>
							</div>
						</div>

						<div class="col-sm-11">
							<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
						</div>

				</div>
			</div>
			</form>

		</div>
	</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <script type="text/javascript">
	$(document).ready(function() {

		$("#sel_depart").change(function() {
			var deptid = $(this).val();

			$.ajax({
				url: 'getUsers.php',
				type: 'post',
				data: {
					depart: deptid
				},
				dataType: 'json',
				success: function(response) {

					var len = response.length;

					$("#sel_user").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['depart_name'];

						$("#sel_user").append("<option value='" + id + "'>" + name + "</option>");

					}
				}
			});
		});

	});
</script> -->