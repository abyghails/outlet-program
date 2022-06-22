<?php
session_start();
require_once "../../../../config/koneksi.php";

$comid = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["comid"]));
$nama_outlet = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["nama_outlet"]));
$alamat = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["alamat"]));
$id_user = $_SESSION["id_user"];

$cari_max = query("SELECT MAX(outid) AS a FROM tb_outlet WHERE comid = '$comid'");
$jmlOutId = $cari_max[0]['a'];
if ($jmlOutId > 0) {
	$outid = $jmlOutId + 1;
} else {
	$outid = 1;
}

$insert = mysqli_query(
	$koneksi,
	"INSERT INTO tb_outlet VALUES ('', '$outid', '$comid', '$nama_outlet', '$alamat', '$id_user')"
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
