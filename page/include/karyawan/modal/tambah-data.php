<!-- Modal -->
<div class="modal fade" id="modalTambahKaryawan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahKaryawanLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahKaryawanLabel">Tambah Karyawan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="include/karyawan/modal/proses-tambah.php" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="nama" class="form-label">Nama</label>
						<input type="text" class="form-control" name="nama" required>
					</div>
					<div class="mb-3">
						<label for="jabatan" class="form-label">Jabatan</label>
						<select name="jabatan" id="jabatan" class="form-select form-select-sm" required>
							<option value="Staff">Staff</option>
							<option value="Web Developer">Web Developer</option>
							<option value="Android Developer">Android Developer</option>
							<option value="IT Support">IT Support</option>
							<option value="System Analyst">System Analyst</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tgl_lahir" required>
					</div>
					<div class="mb-3">
						<label for="alamat" class="form-label">Alamat</label>
						<textarea name="alamat" id="alamat" rows="2" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>