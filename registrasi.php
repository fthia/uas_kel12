<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

	<div class="form-container">
		<p>Registrasi</p>
		<form class="form" method="post">
			<div class="form-group">
				<label for="email">NIK</label>
				<input required="" name="nik" id="email" type="text">
			</div>
			<div class="form-group">
				<label for="email">Nama Lengkap</label>
				<input required="" name="nama" id="email" type="text">
			</div>
			<div class="form-group">
				<label for="email">Username</label>
				<input required="" name="username" id="email" type="text">
			</div>
			<div class="form-group">
				<label for="email">Password</label>
				<input required="" name="password" id="password" type="text">
			</div>
			<div class="form-group">
				<label for="email">No. Telp</label>
				<input required="" name="telp" id="email" type="text">
			</div>
			<button type="submit" class="form-submit-btn" name='kirim'>Kirim</button>
		</form>
	</div>
<?php 
include 'config/koneksi.php';
if (isset($_POST['kirim'])) {
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $telp = $_POST['telp'];
  $level = 'masyarakat';
  
  $query = $koneksi->query("INSERT INTO tbl_masyarakat SET 
  nik = '$nik',
  nama = '$nama',
  username = '$username',
  password = '$password',
  telp = '$telp',
  level = '$level'
  ");
// $query = mysqli_query($koneksi, "INSERT INTO tbl_masyarakat VALUES('$nik','$nama','$username','$password','$telp','$level')");

  if ($query){
	echo "<script>window.alert('$nama, Berhasil Daftar')</script>";
    echo "<meta http-equiv='refresh'content='0;login.php'>";
  }
}
?>
</body>

</html>