<?php
include '../config/koneksi.php';
if (isset($_GET['ubahm'])) {

    $get = $_GET['ubahm'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    $query = $koneksi->query("UPDATE tbl_masyarakat SET 
                    nik = '$nik',
                    nama = '$nama',
                    username = '$username',
                    password = '$password',
                    telp = '$telp',
                    level = '$level' WHERE nik = '$get'
                    ");
    if ($query) {
        echo "<script>window.alert('Data Berhasil Diubah')</script>";
        echo '<meta http-equiv="refresh" content="0;masyarakat.php">';
    }
}
include '../config/koneksi.php';
if (isset($_GET['ubahp'])) {

    $get = $_GET['ubahp'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    $query = $koneksi->query("UPDATE tbl_petugas SET 
                    nama_petugas = '$nama',
                    username = '$username',
                    password = '$password',
                    telp = '$telp',
                    level = '$level' WHERE id_petugas = '$get'
                    ");
    if ($query) {
        echo "<script>window.alert('Data Berhasil Diubah')</script>";
        echo '<meta http-equiv="refresh" content="0;petugas.php">';
    }
}
if (isset($_GET['hapusm'])) {
    $get = $_GET['hapusm'];
    $query = $koneksi->query("DELETE FROM tbl_masyarakat WHERE nik = '$get'");
    if ($query) {
        echo "<script>window.alert('Data Berhasil Dihapus')</script>";
        echo '<meta http-equiv="refresh" content="0;masyarakat.php">';
    }
}
if (isset($_GET['hapusp'])) {
    $get = $_GET['hapusp'];
    $query = $koneksi->query("DELETE FROM tbl_petugas WHERE id_petugas = '$get'");
    if ($query) {
        echo "<script>window.alert('Data Berhasil Dihapus')</script>";
        echo '<meta http-equiv="refresh" content="0;petugas.php">';
    }
}