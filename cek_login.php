<?php
// mulai session 
session_start();
// ambil koneksi database
require_once "config/koneksi.php";

$username = htmlspecialchars($_POST["username"]);
$password = mysqli_real_escape_string($koneksi, $_POST["password"]);

// cek username dan password
$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
$row = mysqli_num_rows($cek);
// jika datanya ada
if ($row > 0) {
	$result = mysqli_fetch_assoc($cek); //data dijadikan array

	// cek password yang sudah di hash dengan password yang di input  di form
	if (password_verify($password, $result["password"])) {
		// jika rolenya
		if ($result["role"] == "admin") {
			// data untuk session
			$id_user = $result["id"];
			$nama = $result["nama"];
			$username = $result["username"];
			$role = $result["role"]; //ini untuk acuan hak akses apakah dia bisa crud atau tidak

			$_SESSION["id_user"] = $id_user;
			$_SESSION["nama"] = $nama;
			$_SESSION["username"] = $username;
			$_SESSION["role"] = $role;
			$_SESSION["login"] = "login"; //ini untuk cek nanti dia login atau tidak

			header("location:page/index.php");
			exit;
		} else {
			// ini jika rolenya adalah user
			// data untuk session
			$id_user = $result["id"];
			$nama = $result["nama"];
			$username = $result["username"];
			$role = $result["role"]; //ini untuk acuan hak akses apakah dia bisa crud atau tidak

			$_SESSION["id_user"] = $id_user;
			$_SESSION["nama"] = $nama;
			$_SESSION["username"] = $username;
			$_SESSION["role"] = $role;
			$_SESSION["login"] = "login"; //ini untuk cek nanti dia login atau tidak

			header("location:page/index.php");
			exit;
		}
	} else {
		// jika pass salah 
		header("location:index.php?message=fail");
		exit;
	}
} else {
	// jika belum terdaftar
	header("location:index.php?message=unregis");
	exit;
}
