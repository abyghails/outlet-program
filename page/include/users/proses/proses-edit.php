<?php
require_once "../../../../config/koneksi.php";
$nama = htmlspecialchars($_POST["nama"]);
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$role = htmlspecialchars($_POST["role"]);
$id = $_POST["id"];

$result = query("SELECT * FROM users WHERE id = $id")[0];

if ($password == "" || $password == null) {
	$update = mysqli_query($koneksi, "UPDATE users SET nama = '$nama', username = '$username', role = '$role' WHERE id = $id");
} else {
	if (password_verify($password, $result["password"])) {
		$update = mysqli_query($koneksi, "UPDATE users SET nama = '$nama', username = '$username', role = '$role' WHERE id = $id");
	} else {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$update = mysqli_query($koneksi, "UPDATE users SET nama = '$nama', username = '$username', password = '$password', role = '$role' WHERE id = $id");
	}
}

if ($update) {
	echo "<script>
					alert('Sukses mengubah data!!');
					document.location.href='../../../index.php?page=users';
				</script>";
	exit;
} else {
	echo "<script>
					alert('Gagal mengubah data!!');
					document.location.href='../../../index.php?page=users';
				</script>";
	exit;
}
