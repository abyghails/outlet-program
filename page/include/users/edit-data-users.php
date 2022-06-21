<?php
// jangan lupa koneksi
require_once "../config/koneksi.php";

// ambil id dari GET
$id = $_GET["id"];

// ambil data users
$data = query("SELECT * FROM users WHERE id = $id");
?>
<div class="col-md-8 mt-3 mt-md-0">
	<div class="card card-data">
		<div class="card-header bg-info">
			<h5>Edit Data Users</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex justify-content-between mb-5 mt-3">
						<a href="?page=users" class="btn btn-sm btn-secondary">Back</a>
					</div>

					<form action="include/users/proses/proses-edit.php" method="POST">
						<input type="hidden" name="id" value="<?= $data[0]['id']; ?>">
						<div class="mb-3 row">
							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" name="nama" value="<?= $data[0]['nama'] ?>" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="username" class="col-sm-2 col-form-label">Username</label>
							<div class="col-sm-10">
								<input type="text" name="username" value="<?= $data[0]['username'] ?>" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="password" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control" autocomplete="off">
								<div class="form-text">Kosongkan jika tidak mau di ubah</div>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="role" class="col-sm-2 col-form-label">Role</label>
							<div class="col-sm-10">
								<select name="role" id="role" class="form-select">
									<option value="admin" <?= $data[0]['role'] == 'admin' ? 'selected' : '' ?>>admin</option>
									<option value="user" <?= $data[0]['role'] == 'user' ? 'selected' : '' ?>>user</option>
								</select>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-sm btn-primary">Edit</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>