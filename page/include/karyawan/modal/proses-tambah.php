<?php
require_once "../../../../config/koneksi.php";
$nama = htmlspecialchars($_POST["nama"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$tgl_lahir = htmlspecialchars($_POST["tgl_lahir"]);
$jabatan = htmlspecialchars($_POST["jabatan"]);

$insert = mysqli_query($koneksi, "INSERT INTO karyawan VALUES ('', '$nama', '$alamat', '$tgl_lahir', '$jabatan')");

if ($insert) {
	echo "<script>
					alert('Sukses menambah data!!');
					document.location.href='../../../index.php?page=karyawan';
				</script>";
	exit;
} else {
	echo "<script>
					alert('Gagal menambah data!!');
					document.location.href='../../../index.php?page=karyawan';
				</script>";
	exit;
}
