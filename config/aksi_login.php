<?php 
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

if ($level == 'masyarakat') {
	$login = mysqli_query($koneksi, "SELECT * FROM tbl_masyarakat WHERE username='$username' AND password = '$password'");
} else{
	$login = mysqli_query($koneksi, "SELECT * FROM tbl_petugas WHERE username='$username' AND password = '$password'");
}

$cek = mysqli_num_rows($login);

if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);

	// if ($data['level'] == 'admin') {
	// 	$_SESSION['id_petugas'] = $data['id_petugas'];
	// 	$_SESSION['nm_petugas'] = $data['nm_petugas'];
	// 	$_SESSION['login'] = "admin";
	// 	header('location:../admin/');

	if ($data['level'] == 'petugas') {
		$_SESSION['id_petugas'] = $data['id_petugas'];
		$_SESSION['nm_petugas'] = $data['nm_petugas'];
		$_SESSION['login'] = "petugas";
		header('location:../admin/');

	}elseif ($data['level'] == 'masyarakat') {
		$_SESSION['nik'] = $data['nik'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['login'] = "masyarakat";
		header('location:../masyarakat/');
	}
	else{
		echo "<script>
	alert('username atau password salah');
	window.location='../login.php'
	</script>";
	}
}
  else{
	echo "<script>
	alert('username atau password tidak terdaftar');
	window.location='../login.php'
	</script>";
}
 ?>