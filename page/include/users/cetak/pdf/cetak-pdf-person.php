<?php
require_once __DIR__ . '/../../../../../assets/vendor/autoload.php';
require_once '../../../../../config/koneksi.php';

$mpdf = new \Mpdf\Mpdf();



$html = '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="cetak.css">
	<title>Data Users Per-data</title>
</head>
	<body>
		<div class="title">
			<h4>Data Users</h4>
		</div>

		<table border="1" cellspacing="0" cellpadding="10" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>';
$i = 1;
$id = $_GET["id"];
$data = query("SELECT * FROM users WHERE id = $id");
foreach ($data as $row) {
	$html .= '
				<tr>
					<td>' . $i++ . '</td>
					<td>' . $row["nama"] . '</td>
					<td>' . $row["username"] . '</td>
					<td>' . $row["role"] . '</td>
				</tr>
';
}
$html .= '
			</tbody>
		</table>
	</body>
</html>
';


$mpdf->WriteHTML($html);

$mpdf->Output("data-user-satu-data.pdf", "I");
