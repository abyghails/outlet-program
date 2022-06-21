<?php
// ini belum selesai harus membuat comid + outid
session_start();
require_once "../../../../config/koneksi.php";

$comid = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["comid"]));
$nama_outlet = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["nama_outlet"]));
$alamat = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["alamat"]));


$insert = mysqli_query(
	$koneksi,
	"INSERT INTO tb_outlet VALUES ('', '$comid', '$nama_outlet', '$alamat')"
);

if ($insert) {
	echo "<script>
					alert('Sukses Tambah data!!');
					document.location.href='../../../index.php?page=outlet';
				</script>";
	exit;
} else {
	echo "<script>
					alert('Gagal Tambah data!!');
					document.location.href='../../../index.php?page=outlet';
				</script>";
}
