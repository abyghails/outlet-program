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
								<h4 class="fw-bold text-center mb-4 mt-3">Login</h4>

								<!-- message error -->
								<?php
								if (isset($_GET["message"])) {
									if ($_GET["message"] == "unregis") {
										echo "<h5 class='fw-bold text-center text-danger'>Maaf anda belum terdaftar!</h5>";
									} else if ($_GET["message"] == "fail") {
										echo "<h5 class='fw-bold text-center text-danger'>Username atau Password anda salah!</h5>";
									} else if ($_GET["message"] == "denied") {
										echo "<h5 class='fw-bold text-center text-danger'>Anda harus login dulu!</h5>";
									}
								}

								?>
								<!-- end -->

								<form action="cek_login.php" method="post">
									<div class="mb-3">
										<input type="text" class="form-control" name="username" placeholder="Masukkan Username" autocomplete="off">
									</div>
									<input type="password" class="form-control" name="password" placeholder="Masukkan Password" autocomplete="off">
									<div class="d-flex button-login justify-content-center">
										<button type="submit" name="submit" class="btn btn-primary mt-3 ">Login</button>
									</div>
								</form>
								<span class="text-muted d-block text-center mt-4">Belum punya akun? <a href="register.php">Register</a></span>
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