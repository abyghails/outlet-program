<?php
// ini belum selesai harus membuat comid + outid
session_start();
require_once "../../../../config/koneksi.php";

$maxComid = query("SELECT MAX(comid) AS com FROM provinsi");
$maxOutid = query("SELECT MAX(id) AS outid FROM tb_outlet");
$angkaComid = $maxComid[0]["com"];
$angkaOutid = $maxOutid[0]["outid"];
$conver1 = (int) substr($angkaComid, 0);
$conver1++;

$conver2 = (int) substr($angkaOutid, 0);
$conver2++;

$outid = $conver1 + $conver2;


$comid = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["comid"]));
$nama_outlet = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["nama_outlet"]));
$alamat = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["alamat"]));


$insert = mysqli_query(
	$koneksi,
	"INSERT INTO tb_outlet VALUES ('$outid', '$comid', '$nama_outlet', '$alamat')"
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
