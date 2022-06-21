<?php

// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "contoh_cms");

// cek apakah koneksi berhasil atau tidak 
if (!$koneksi) {
	echo "Koneksi Gagal" . mysqli_connect_error();
}


// function untuk memanggil data (optional)
function query($data)
{
	global $koneksi;
	$result = mysqli_query($koneksi, $data);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
