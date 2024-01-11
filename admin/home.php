<?php 
	include '../config/koneksi.php';
	$no = 1;
	$qm = $koneksi->query("SELECT * FROM tbl_masyarakat");
?>
<div class="container">
	<h3 class="mt-3">DASHBOARD</h3>
	<div class="row">
		<div class="col-md-3 mt-3">
			<div class="card">
				<div class="card-header">Masyarakat</div>
				<div class="card-body">10 Aduan</div>
			</div>
		</div>
		<div class="col-md-3 mt-3">
			<div class="card">
				<div class="card-header">Pengaduan</div>
				<div class="card-body">10 Aduan</div>
			</div>
		</div>
		<div class="col-md-3 mt-3">
			<div class="card">
				<div class="card-header">Petugas</div>
				<div class="card-body">10 Pengguna</div>
			</div>
		</div>		
	</div>	
</div>