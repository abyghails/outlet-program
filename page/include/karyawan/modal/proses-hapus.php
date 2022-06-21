<?php
require_once "../../../../config/koneksi.php";
$id = $_POST["id"];

$hapus = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id = '$id'");

if ($hapus) {
	echo "<script>
					alert('Sukses menghapus data!!');
					document.location.href='../../../index.php?page=karyawan';
				</script>";
	exit;
} else {
	echo "<script>
					alert('Gagal menghapus data!!');
					document.location.href='../../../index.php?page=karyawan';
				</script>";
	exit;
}
