<?php
session_start();
require_once "../../../../config/koneksi.php";

$id_user = $_SESSION["id_user"];
$nama_provinsi = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["nama_provinsi"]));
$comid = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["comid"]));


$insert = mysqli_query(
	$koneksi,
	"INSERT INTO provinsi VALUES ('', '$nama_provinsi', '$comid', '$id_user')"
);

if ($insert) {
	echo "<script>
					alert('Sukses Tambah data!!');
					document.location.href='../../../index.php?page=provinsi';
				</script>";
	exit;
} else {
	echo "<script>
					alert('Gagal Tambah data!!');
					document.location.href='../../../index.php?page=provinsi';
				</script>";
}
