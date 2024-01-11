<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>APLIKASI PENGADUAN MASYARAKAT</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-dark text-danger">
  <div class="container">
    <a class="navbar-brand text-danger" href="index.php">Aplikasi Pengaduan Masyarakat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
       
        <li class="nav-item">
          <a class="nav-link text-danger" href="registrasi.php">Daftar Akun</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php 
if(isset($_GET['page'])){
	$page= $_GET['page'];

// 	switch ($page){
// 		case 'login':
// 			include 'login.php';
// 			break;
// 			case 'registrasi':
// 			include 'registrasi.php';
// 			break;

// 			default:
// 			echo "Halaman Tidak Tersedia";
// 			break;
// 	}
	if($page == 'login'){
		include 'login.php';
	}
	elseif($page == 'register'){
		include 'registrasi.php';
	}
	else{
		
	}

}else{
	include 'home.php';
}
?>

<footer class="footer py-2 bg-light fixed-bottom bg-dark text-danger">
	<div class="container">
		<p class="text-center text-danger">&copy; Hakcipta Kelompok 12</p>
	</div>
	
</footer>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>