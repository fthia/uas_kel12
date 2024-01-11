<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Login</title>
</head>

<body>

	<div class="form-container">
		<p>LOGIN</p>
		<form class="form" action="config/aksi_login.php" method="post">
		  <div class="form-group">
			<label for="email">Username</label>
			<input required="" name="username" id="email" type="text">
		  </div>
		  <div class="form-group">
			<label for="email">Password</label>
			<input required="" name="password" id="email" type="password">
		  </div>
		  <div class="form-group">
			<label for="email">Masuk Sebagai</label>
			<select name="level">
				<option>Pilih</option>
				<option value="masyarakat">Masyarakat</option>
				<option value="petugas">Petugas</option>
			</select>
		  </div>
		  <button type="submit" class="form-submit-btn" name='kirim'>Kirim</button>
		  <p style='font-size:12px;'>Belum Punya Akun?<a href="registrasi.php" class="m-3" style='color:lightblue;'> Daftar Disini</a></p>
		</form>
	  </div>
</body>

</html>