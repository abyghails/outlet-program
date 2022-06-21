<?php
session_start();
// cek sudah login atau belum 
if ($_SESSION["login"] !== "login") {
	header("location: ../index.php?message=denied");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php include "layouts/style.php"; ?>

	<title>Contoh CMS</title>
</head>

<body>


	<!-- main content -->
	<main>
		<div class="container mt-5">
			<div class="row justify-content-center mb-3">
				<div class="col-lg-4">
					<div class="card card-menu" style="width: 18rem;">
						<div class="card-header bg-info">
							<span class="fw-bold">Menu</span>
						</div>
						<ul class="list-group list-group-flush">
							<a href="index.php?page=home">
								<li class="list-group-item">Home</li>
							</a>
							<a href="?page=karyawan">
								<li class="list-group-item">Data Struktur</li>
							</a>
							<a href="?page=provinsi">
								<li class="list-group-item">Provinsi</li>
							</a>
							<a href="?page=distributor">
								<li class="list-group-item">Distributor</li>
							</a>
							<a href="?page=outlet">
								<li class="list-group-item">Outlet</li>
							</a>
							<a href="?page=users">
								<li class="list-group-item">Data Users</li>
							</a>
							<a href="logout.php">
								<li class="list-group-item">Logout</li>
							</a>
						</ul>
					</div>
				</div>

				<!-- halaman -->
				<?php
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
					switch ($page) {
						case 'home':
							include "include/home/home.php";
							break;

						case 'karyawan':
							include "include/karyawan/karyawan.php";
							break;

						case 'users':
							include "include/users/users.php";
							break;

						case 'tambah-data-users':
							include "include/users/tambah-data-users.php";
							break;

						case 'view-data-users':
							include "include/users/view-data-users.php";
							break;

						case 'edit-data-users':
							include "include/users/edit-data-users.php";
							break;

						case 'provinsi':
							include "include/provinsi/provinsi.php";
							break;

						case 'distributor':
							include "include/distributor/distributor.php";
							break;

						case 'outlet':
							include "include/outlet/outlet.php";
							break;


						default:
							echo '
								<div class="col-md-8 mt-3 mt-md-0">
									<div class="card card-home">
										<div class="card-body">
											<h4 class="text-center text-danger my-5">Halaman tidak di temukan</h4>
										</div>
									</div>
								</div>
							';
							break;
					}
				} else {
					include "include/home/home.php";
				}
				?>
			</div>
		</div>
	</main>




	<?php include "layouts/script.php"; ?>

</body>

</html>