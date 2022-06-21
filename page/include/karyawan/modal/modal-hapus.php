<!-- Modal -->
<div class="modal fade" id="modalHapusKaryawan<?= $item["id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusKaryawanLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalHapusKaryawanLabel">Edit Karyawan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="include/karyawan/modal/proses-hapus.php" method="post">
				<div class="modal-body">
					<!-- data edit per id -->
					<?php
					$id_karyawan = $item["id"];
					$datas = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id = '$id_karyawan'");
					$result = mysqli_fetch_assoc($datas);
					?>
					<input type="hidden" name="id" value="<?= $result["id"]; ?>">
					<h5>Apakah anda ingin menghapus data <span class="text-danger"><?= $result["nama"]; ?></span></h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>