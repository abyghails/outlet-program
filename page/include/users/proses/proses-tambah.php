<?php
require_once "../../../../config/koneksi.php";
$nama = htmlspecialchars($_POST["nama"]);
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
$role = htmlspecialchars($_POST["role"]);


// merubah pass menjadi encrypt
$password = password_hash($password, PASSWORD_DEFAULT);

$insert = mysqli_query($koneksi, "INSERT INTO users VALUES ('', '$nama', '$username', '$password', '$role')");

if ($insert) {
	echo "<script>
					alert('Sukses menambah data!!');
					document.location.href='../../../index.php?page=users';
				</script>";
	exit;
} else {
	echo "<script>
					alert('Gagal menambah data!!');
					document.location.href='../../../index.php?page=users';
				</script>";
	exit;
}
