<div class="container">
	<div class="row">
		<div class="col-md-12" mt-3>
		<br>
			<p>SELAMAT DATANG MASYARAKAT <?php echo $_SESSION['nama'] ?></p>
			<div class="card">
	<div class="card-header  text-primary">
		FORM PENGADUAN
	</div>
	<div class="card-body  text-primary">
		<form action="" method="POST" enctype="multipart/form-data" >	
  			<div class="mb-3">
    			<label class="form-label">Judul Laporan</label>
    			<input type="text" class="form-control" name="judul_laporan" placeholder="masukan Judul Laporan" required>
  			</div>
  			<div class="mb-3">
    			<label class="form-label">Isi Laporan</label>
    			<textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan" required></textarea>
  			</div>
  			<div class="mb-3">
    			<label class="form-label">Foto</label>
    			<input type="file" class="form-control" name="foto" required>
  			</div>
	</div>
	<div class="card-footer  text-primary">	
		<button type="submit" name="kirim" class="btn btn-primary">KIRIM</button>
	</div>
	</form>

	<?php
	include '../config/koneksi.php';
	$tgl_pengaduan = date("y-m-d");
	if (isset($_POST['kirim'])) {
		$nik = $_SESSION['nik'];
		$judul_laporan = $_POST['judul_laporan'];
		$isi_laporan = $_POST['isi_laporan'];
		$status = 0;
		$foto = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];
		$lokasi = '../assets/img/';

	
	move_uploaded_file($tmp, $lokasi.$foto);
	// $query = mysqli_query($koneksi, "INSERT INTO tbl_pengaduan Values('$tgl_pengaduan','$nik','$judul_laporan','$isi_laporan','$nama_foto','$status')");
	$query = $koneksi->query("INSERT INTO tbl_pengaduan SET 
  tgl_pengaduan = '$tgl_pengaduan',
  nik = '$nik',
  judul_laporan = '$judul_laporan',
  isi_laporan = '$isi_laporan',
  foto = '$foto',
  status = '$status'
  ");

	echo " <script>
	alert('Data Berhasil Di Kirim');
	window.location='index.php';
	</script>
	";	
	}

	 ?>
	</div>

		</div>
	</div>
	<div class="row ">
		<div class="col-md-12 mt-3">
			<div class="card">
	<div class="card-header">
		FORM PENGADUAN
	</div>
	<div class="card-body">
		<table class="table table-striped ">
			<thead>
				<tr>
					<th>NO</th>
					<th>JUDUL</th>
					<th>ISI</th>
					<th>FOTO</th>
					<th>STATUS</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
					$nik = $_SESSION['nik'];
					$query = $koneksi->query("SELECT * FROM tbl_pengaduan WHERE $nik = '$nik' ORDER BY id_pengaduan DESC");
					$no = 1;
					while($row = mysqli_fetch_array($query)){ ?>
				<tr>
				<td><?= $no++?></td>
				<td><?= $row['judul_laporan'];?></td>
				<td><?= $row['isi_laporan'];?></td>
				<td><img src="../assets/img/<?= $row['foto'];?>" width="100" style="border-radius: 10px;"></td>
				<td>
					<?php 
						if($row['status'] == 'proses'){
							echo '<span class="badge bg-primary">Proses</span>';
						}
						elseif($row['status'] == 'selesai'){
							echo '<span class="badge bg-success">Selesai</span>';
						}
						else{
							echo '<span class="badge bg-warning">Menunggu</span>';
						}
					?>
				</td>
				<td>
					<a href="../config/edit.php?id-pengaduan=<?= $row['id_pengaduan']?>" class="btn btn-primary">EDIT</a>
					<a href="../config/hapus.php?id-pengaduan=<?= $row['id_pengaduan']?>" class="btn btn-danger">Hapus</a>
				</td>
				
				</tr>
				<?php }?>
			</tbody>
		</table>

	</div>
 </div>	
</div>
</div>
</div>
<br><br><br>