<?php
session_start();
require_once "../../../../config/koneksi.php";
$id = $_GET["id"];

if ($_SESSION["id_user"] == $id) {
	$delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = $id");
	echo "<script>
					alert('Sukses menghapus data!!');
					document.location.href='../../../../index.php';
				</script>";
	exit;
} else {
	$delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = $id");
	echo "<script>
					alert('Sukses menghapus data!!');
					document.location.href='../../../index.php?page=users';
				</script>";
	exit;
}
