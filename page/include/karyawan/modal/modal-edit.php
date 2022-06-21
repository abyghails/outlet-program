<!-- Modal -->
<div class="modal fade" id="modalEditKaryawan<?= $item["id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditKaryawanLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEditKaryawanLabel">Edit Karyawan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="include/karyawan/modal/proses-edit.php" method="post">
				<div class="modal-body">
					<!-- data edit per id -->
					<?php
					$id_karyawan = $item["id"];
					$datas = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id = '$id_karyawan'");
					$result = mysqli_fetch_assoc($datas);
					?>
					<input type="hidden" name="id" value="<?= $result['id']; ?>">
					<div class="mb-3">
						<label for="nama" class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama" value="<?= $result['nama']; ?>" required>
					</div>
					<div class="mb-3">
						<label for="jabatan" class="form-label">Jabatan</label>
						<select name="jabatan" id="jabatan" class="form-select form-select-sm" required>
							<option value="Staff" <?= $result['jabatan'] == 'Staff' ? 'selected' : '' ?>>Staff</option>
							<option value="Web Developer" <?= $result['jabatan'] == 'Web Developer' ? 'selected' : '' ?>>Web Developer</option>
							<option value="Android Developer" <?= $result['jabatan'] == 'Android Developer' ? 'selected' : '' ?>>Android Developer</option>
							<option value="IT Support" <?= $result['jabatan'] == 'IT Support' ? 'selected' : '' ?>>IT Support</option>
							<option value="System Analyst" <?= $result['jabatan'] == 'System Analyst' ? 'selected' : '' ?>>System Analyst</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tgl_lahir" value="<?= $result['tgl_lahir'] ?>" required>
					</div>
					<div class="mb-3">
						<label for="alamat" class="form-label">Alamat</label>
						<textarea name="alamat" id="alamat" rows="2" class="form-control"><?= $result["alamat"]; ?></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-warning">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>