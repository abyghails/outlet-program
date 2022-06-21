<?php
require_once "../config/koneksi.php";
$idUser = $_SESSION["id_user"];
$dataUser = query("SELECT * FROM users WHERE id = $idUser");
$role = $dataUser[0]["role"];
$nama = $dataUser[0]["nama"];
?>

<div class="col-lg-8 mt-3 mt-md-0">
	<div class="card card-home">
		<div class="card-body">
			<h4 class="text-center my-5">Selamat datang, <?= $nama; ?>. Role kamu adalah <?= $role; ?></h4>
		</div>
	</div>
</div>