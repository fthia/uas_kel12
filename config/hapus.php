<?php
session_start();
include 'koneksi.php';
echo '<script>window.alert("Apa anda yakin ingin menghapusnya?")</script>';

$id = $_GET['id-pengaduan'];
$query = $koneksi->query("DELETE FROM tbl_pengaduan WHERE id_pengaduan = '$id'");
$del = $koneksi->query("SELECT * FROM tbl_pengaduan WHERE id_pengaduan = '$id'");
$row = mysqli_fetch_array($del);
if(is_file("../assets/img/".$row['foto'])){
    unlink("../assets/img/".$row['foto']);
}
if($query){
    echo '<meta http-equiv="refresh" content="0;../masyarakat/index.php">';
}
?>
