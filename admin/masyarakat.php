<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.5.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="display: flex;flex-direction: column;align-items: center;">
<div class="spasi" style="margin-top: 20px;"></div>
    <h2 style="font-size:20px;color:white;">Data Masyarakat</h2>
    <div class="spasi" style="margin-top: 20px;"></div>
    <div style="width: 80%;">
        <button class="btn btn-accent" onclick="tambah.showModal()">Tambah</button>
        <dialog id="tambah" class="modal">
            <form method="post" class="modal-box">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">NIK</span>
                    </div>
                    <input type="text" name="nik" class="input input-bordered w-full max-w-xl" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </div>
                    <input type="text" name="nama" class="input input-bordered w-full max-w-xl" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Username</span>
                    </div>
                    <input type="text" name="username" class="input input-bordered w-full max-w-xl" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input type="text" name="password" class="input input-bordered w-full max-w-xl" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">No. Telp</span>
                    </div>
                    <input name="telp" type="text" class="input input-bordered w-full max-w-xl" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Level</span>
                    </div>
                    <select name="level" class="input input-bordered w-full max-w-xl">
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                    </select>
                </label>
                <div class="modal-action">
                    <div>
                        <button class="btn" type="submit" name="tambah">Tambah</button>
                        <a class="btn" href="masyarakat.php">Kembali</a>
                    </div>
                </div>
            </form>
            <?php
            include '../config/koneksi.php';
            if (isset($_POST['tambah'])) {
                $nik = $_POST['nik'];
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $telp = $_POST['telp'];
                $level = $_POST['level'];

                $query = $koneksi->query("INSERT INTO tbl_masyarakat SET 
                    nik = '$nik',
                    nama = '$nama',
                    username = '$username',
                    password = '$password',
                    telp = '$telp',
                    level = '$level'
                    ");

                if ($query) {
                    echo "<script>window.alert('Data Berhasil Ditambah')</script>";
                    echo '<meta http-equiv="refresh" content="0;masyarakat.php">';
                }
            }
            ?>

        </dialog>
    </div>
    <div class="spasi" style="margin-top: 20px;"></div>
    <div class="tab" style="width: 83%;">
        <div class="overflow-x-auto bg-base-300" style="width: 100%;border-radius: 10px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>No. Telp</th>
                        <th>Level</th>
                        <th align="center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $koneksi->query("SELECT * FROM tbl_masyarakat");
                    $no = 1;
                    while ($row = mysqli_fetch_array($query)) { ?>

                        <tr class='hover'>
                            <th><?= $no++ ?></th>
                            <td><?= $row['nik'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['telp'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <td align="center">
                                <a href="../config/em.php?ubah=<?= $row['nik'] ?>"><button class="btn btn-primary">Ubah</button></a>
                                <a href="edit.php?hapusm=<?= $row['nik'] ?>"><button class="btn btn-error">Hapus</button></a>
                            </td>

                        </tr>
                    <?php    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
