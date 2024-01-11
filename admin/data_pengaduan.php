<div class="containner">
	<div class="row">
		<div class="col-md-12 mt-3">
			<div class="card">
				<div class="card-header">
					DATA PENGADUAN
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>NO</th>
								<th>TANGGAL</th>
								<th>NAMA</th>
								<th>JUDUL</th>
								<th>LAPORAN</th>
								<th>FOTO</th>
								<th>STATUS</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include '../config/koneksi.php';
							$no = 1;
							$query = mysqli_query($koneksi, "SELECT a.*,b.* FROM tbl_pengaduan a INNER JOIN tbl_masyarakat b ON a.nik=b.nik ORDER BY id_pengaduan DESC");
							while ($data = mysqli_fetch_array($query)) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?= $data['tgl_pengaduan']; ?></td>
									<td><?= $data['nama']; ?></td>
									<td><?= $data['judul_laporan']; ?> </td>
									<td><?= $data['isi_laporan']; ?></td>
									<td><img src="../assets/img/<?= $data['foto'] ?>" width="100" style="border-radius: 10px;"></td>
									<td>
										<?php
										if ($data['status'] == 'proses') {
											echo '<span class="badge bg-primary">Proses</span>';
										} elseif ($data['status'] == 'selesai') {
											echo '<span class="badge bg-success">Selesai</span>';
										} else {
											echo '<span class="badge bg-danger">Menunggu</span>';
										}
										?>
									</td>
									<td>

									<a style="display: none;" class="btn btn-primary" data-bs-target="#VERIFIKASI<?= $data['id_pengaduan'] ?>">VERIFIKASI</a>
										<div style="display: none;" class="modal fade" id="VERIFIKASI<?= $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">VERIFIKASI : <?= $data['judul_laporan'] ?></h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form method="post">
															<input type="hidden" name="id_pengaduan" class="form-control" value="<?= $data['id_pengaduan'] ?>">
															<div class="row mb-3">
																<label class="col-md-4">Status</label>
																<div class="col-md-8">
																	<select class="form-control" name="status">
																		<option value="proses">Proses</option>
																		<option value="selesai">Selesai</option>
																		<option value="0">Tolak</option>
																	</select>
																</div>
															</div>
													</div>
													<div class="modal-footer">
														<button type="submit" name="kirim" class="btn btn-primary">Save changes</button>
													</div>
													</form>
													<?php
													if (isset($_POST['kirim'])) {
														$id = $_POST['id_pengaduan'];
														$status = $_POST['status'];

														$query = $koneksi->query("UPDATE tbl_pengaduan SET status = '$status' WHERE id_pengaduan = '$id'");
														if ($query) {
															echo "<script>
															alert('Data Berhasil Di Verifikasi');
															window.location='index.php?page=pengaduan';
															</script>
															";
														}
													}
													?>
												</div>
											</div>
										</div>
										
										<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#VERIFIKASI<?= $data['id_pengaduan'] ?>">VERIFIKASI</a>
										<div class="modal fade" id="VERIFIKASI<?= $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Yakin Ingin Dihapu? : <?= $data['judul_laporan'] ?></h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form method="post">
															<input type="hidden" name="id_pengaduan" class="form-control" value="<?= $data['id_pengaduan'] ?>">
															<div class="row mb-3">
																<div class="col-md-8">
																	<input type="submit" name="ya" class="form-control" value="YA">
																	<input type="submit" name="tidak" class="form-control" value="TIDAK">
																</div>
															</div>
													</div>
													<div class="modal-footer">
														<button type="submit" name="ya" class="btn btn-primary">YA</button>
													</div>
													</form>
													<?php
													if (isset($_POST['ya'])) {
														$id = $_POST['id_pengaduan'];

														$query = $koneksi->query("DELETE FROM tbl_pengaduan WHERE id_pengaduan = '$id'");
														if ($query) {
															echo "<script>
															alert('Data Berhasil Di Hapus');
															window.location='index.php?page=pengaduan';
															</script>
															";
														}
													}

													?>
												</div>
											</div>
										</div>

										<a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#HAPUS<?= $data['id_pengaduan'] ?>">HAPUS</a>
										<div class="modal fade" id="HAPUS<?= $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Yakin Ingin Dihapus? : <?= $data['judul_laporan'] ?></h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form method="post">
															<input type="hidden" name="id_pengaduan" class="form-control" value="<?= $data['id_pengaduan'] ?>">
															<div class="row mb-3">
																<div class="col-md-8">
																	<input type="submit" name="ya" class="form-control" value="YA">
																	<input type="submit" name="tidak" class="form-control" value="TIDAK">
																</div>
															</div>
													</div>
													<div class="modal-footer">
														<button type="submit" name="ya" class="btn btn-primary">YA</button>
													</div>
													</form>
													<?php
													if (isset($_POST['ya'])) {
														$id = $_POST['id_pengaduan'];

														$query = $koneksi->query("DELETE FROM tbl_pengaduan WHERE id_pengaduan = '$id'");
														if ($query) {
															echo "<script>
															alert('Data Berhasil Di Hapus');
															window.location='index.php?page=pengaduan';
															</script>
															";
														}
													}

													?>
												</div>
											</div>
										</div>


										
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>