<?php
session_start();
include 'koneksi.php';
$id = $_GET['id-pengaduan'];
$query = $koneksi->query("SELECT * FROM tbl_pengaduan WHERE id_pengaduan = '$id'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>
    
</body>
</html>
<div class="container">
    <div class="row">
        <div class="col-md-12" mt-3>
            <div class="card">
                <div class="card-header  text-primary">
                    EDIT PENGADUAN
                </div>
                <div class="card-body  text-primary">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Judul Laporan</label>
                            <input type="text" class="form-control" name="judul_laporan" value="<?= $row['judul_laporan']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Laporan</label>
                            <input type="text" class="form-control" name="isi_laporan" value="<?= $row['isi_laporan']?>"></input>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <img src="../assets/img/<?= $row['foto']?>" style="width:150px;border-radius: 10px;">
                            <input type="file" class="form-control" name="foto" value="<?= $row['foto']?>">
                        </div>
                </div>
                <div class="card-footer  text-primary">
                    <button type="submit" name="kirim" class="btn btn-success">EDIT</button>
                    <a href="../masyarakat/index.php" class="btn btn-primary">KEMBALI</a>
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


                    move_uploaded_file($tmp, $lokasi . $foto);
                    // $query = mysqli_query($koneksi, "INSERT INTO tbl_pengaduan Values('$tgl_pengaduan','$nik','$judul_laporan','$isi_laporan','$nama_foto','$status')");
                    $query = $koneksi->query("UPDATE tbl_pengaduan SET 
  tgl_pengaduan = '$tgl_pengaduan',
  nik = '$nik',
  judul_laporan = '$judul_laporan',
  isi_laporan = '$isi_laporan',
  foto = '$foto',
  status = '$status' WHERE id_pengaduan = '$id'");

                    echo " <script>
	alert('Data Berhasil Di Kirim');
	window.location='../masyarakat/index.php';
	</script>
	";
                }

                ?>
            </div>

        </div>
    </div>
</div>