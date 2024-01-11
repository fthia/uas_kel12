<link href="https://cdn.jsdelivr.net/npm/daisyui@4.5.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
<?php
    include 'koneksi.php';
    $get = $_GET['ubah'];
    $query = $koneksi->query("SELECT * FROM tbl_masyarakat WHERE nik = '$get'");
    $row = mysqli_fetch_array($query);
?>
<body style="width:100%;height:100vh;display: flex;flex-direction: column;align-items: center;justify-content:center;">

<form method="post" action="../admin/edit.php?ubahm=<?= $row['nik'] ?>" class="modal-box">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">NIK</span>
                    </div>
                    <input type="text" name="nik" class="input input-bordered w-full max-w-xl" value="<?= $row['nik'] ?>" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </div>
                    <input type="text" name="nama" class="input input-bordered w-full max-w-xl" value="<?= $row['nama'] ?>" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Username</span>
                    </div>
                    <input type="text" name="username" class="input input-bordered w-full max-w-xl" value="<?= $row['username'] ?>" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Password</span>
                    </div>
                    <input type="text" name="password" class="input input-bordered w-full max-w-xl" value="<?= $row['password'] ?>" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">No. Telp</span>
                    </div>
                    <input name="telp" type="text" class="input input-bordered w-full max-w-xl" value="<?= $row['telp'] ?>" />
                </label>
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Level</span>
                    </div>
                    <select name="level" class="input input-bordered w-full max-w-xl">
                        <option value="<?= $row['level'] ?>"><?= $row['level'] ?></option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                    </select>
                </label>
                <div class="modal-action">
                    <div>
                        <button class="btn" type="submit" name="ubah">Ubah</button>
                        <a class="btn" href="../admin/masyarakat.php">Kembali</a>
                    </div>
                </div>
            </form>
                
</body>