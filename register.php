<?php
require_once "config/koneksi.php";
if (isset($_POST["register"])) {
	// ambil data dari form
	$nama = htmlspecialchars($_POST["nama"]);
	$username = htmlspecialchars($_POST["username"]);
	$password = mysqli_real_escape_string($koneksi, $_POST["password"]);
	$role = htmlspecialchars($_POST["role"]);

	// proses insert ke database
	// ubah password menjadi encrypt
	$password = password_hash($password, PASSWORD_DEFAULT);
	$insert = mysqli_query($koneksi, "INSERT INTO users VALUES('', '$nama', '$username', '$password', '$role')");

	// redirect halaman
	if ($insert) {
		header("location:index.php");
	} else {
		// jika gagal regis balik lagi ke halaman register
		header("location:register.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- style bootstrap 5 -->
	<link rel="stylesheet" href="assets/libraries/bootstrap/css/bootstrap.min.css" />

	<!-- datatable library -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />


	<!-- style fontawesome -->
	<link rel="stylesheet" href="assets/libraries/fontawesome/css/all.min.css" />

	<!-- style custom saya -->
	<link rel="stylesheet" href="assets/styles/main.css" />

	<title>Contoh CMS</title>
</head>

<body>


	<!-- main content -->
	<main>
		<div class="section-login mt-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-4">
						<div class="card card-login">
							<div class="card-body">
								<h4 class="fw-bold text-center mb-4 mt-3">Register</h4>
								<form action="" method="post">
									<div class="mb-3">
										<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" autocomplete="off" required>
									</div>
									<div class="mb-3">
										<input type="text" class="form-control" name="username" placeholder="Masukkan Username" autocomplete="off" required>
									</div>
									<div class="mb-3">
										<input type="password" class="form-control" name="password" placeholder="Masukkan Password" autocomplete="off" required>
									</div>
									<div class="mb-3">
										<select name="role" id="role" class="form-control" required>
											<option value="null">- Pilih Role -</option>
											<option value="admin">Admin</option>
											<option value="user">User</option>
										</select>
									</div>
									<div class="d-flex button-login justify-content-center">
										<button type="submit" name="register" class="btn btn-primary mt-3 ">Regis</button>
									</div>
								</form>
								<span class="text-muted d-block text-center mt-4">Sudah punya akun? <a href="index.php">Login</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- end main content -->



	<!-- jquery -->
	<script src="assets/libraries/jquery/jquery-3.6.0.min.js"></script>

	<!-- bootstrap 5 js -->
	<script src="assets/libraries/bootstrap/js/bootstrap.min.js"></script>

	<!-- datatable library -->
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

	<!-- fontawesome js -->
	<script src="assets/libraries/fontawesome/js/all.min.js"></script>

	<!-- js custom saya -->
	<script src="assets/script/main.js"></script>


</body>

</html>