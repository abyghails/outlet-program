<?php
require_once "../../../../config/koneksi.php";
$nama = htmlspecialchars($_POST["nama"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$tgl_lahir = htmlspecialchars($_POST["tgl_lahir"]);
$jabatan = htmlspecialchars($_POST["jabatan"]);
$id_karyawan = $_POST['id'];
$update = mysqli_query($koneksi, "UPDATE karyawan SET nama = '$nama', alamat = '$alamat', tgl_lahir = '$tgl_lahir', jabatan = '$jabatan' WHERE id = '$id_karyawan'");

if ($update) {
	echo "<script>
					alert('Sukses UPDATE data!!');
					document.location.href='../../../index.php?page=karyawan';
				</script>";
	exit;
} else {
	echo "<script>
					alert('Gagal UPDATE data!!');
					document.location.href='../../../index.php?page=karyawan';
				</script>";
	exit;
}
