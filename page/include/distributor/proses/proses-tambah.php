<?php
session_start();
require_once "../../../../config/koneksi.php";

$id_user = $_SESSION["id_user"];
$kode_distributor = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["kode_distributor"]));
$nama_distributor = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["nama_distributor"]));
$kota = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["kota"]));
$kode_outlet = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["kode_outlet"]));
$nama_outlet = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["nama_outlet"]));
$alamat = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["alamat"]));


$insert = mysqli_query(
	$koneksi,
	"INSERT INTO tb_distributor VALUES ('', '$kode_distributor', '$nama_distributor', '$kota', '$kode_outlet', '$nama_outlet', '$alamat')"
);

if ($insert) {
	echo "<script>
					alert('Sukses Tambah data!!');
					document.location.href='../../../index.php?page=distributor';
				</script>";
	exit;
} else {
	echo "<script>
					alert('Gagal Tambah data!!');
					document.location.href='../../../index.php?page=distributor';
				</script>";
}
