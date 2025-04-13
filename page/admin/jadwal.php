<?php
include "../../config/db.php";


if (isset($_POST['tambah_jadwal'])) {
    $kode = $_POST['kode_matkul'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $ruangan = $_POST['ruangan'];
    $con->query("INSERT INTO jadwal (kode_matkul, hari, jam, ruangan) VALUES ('$kode', '$hari', '$jam', '$ruangan')");
}
if (isset($_POST['edit_jadwal'])) {
    $id = $_POST['id_jadwal'];
    $kode = $_POST['kode_matkul'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $ruangan = $_POST['ruangan'];
    $con->query("UPDATE jadwal SET kode_matkul='$kode', hari='$hari', jam='$jam', ruangan='$ruangan' WHERE id_jadwal=$id");
}


if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $con->query("DELETE FROM jadwal WHERE id_jadwal = $id");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Jadwal</title>
    <link rel="stylesheet" href="../../css/style_nav_admin1.css">
    <link rel="stylesheet" href="../../css/style_footer1.css">
    <link rel="stylesheet" href="../../css/style_index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-4">
    <?php
    include "../../component/nav_admin.php";
    ?>
    <h2 class="mb-4">Halaman Admin - Jadwal</h2>

    <form method="post" class="mb-4">
        <div class="row g-2">
            <div class="col-md-2">
                <select name="kode_matkul" class="form-select" required>
                    <option disabled selected>Pilih Kode Matkul</option>
                    <?php
                    $matkul = $con->query("SELECT kode_matkul, nama_matkul FROM matkul");
                    while ($m = $matkul->fetch_assoc()) {
                        echo "<option value='{$m['kode_matkul']}'>{$m['kode_matkul']} - {$m['nama_matkul']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <select name="hari" class="form-select" required>
                    <option disabled selected>Pilih Hari</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                    <option>Minggu</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="time" name="jam" class="form-control" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="ruangan" class="form-control" placeholder="Ruangan" maxlength="2" required>
            </div>
            <div class="col-md-2">
                <button type="submit" name="tambah_jadwal" class="btn btn-primary w-100">Tambah Jadwal</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Kode Matkul</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = $con->query("SELECT * FROM jadwal");
            while ($row = $data->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['kode_matkul']}</td>
                    <td>{$row['hari']}</td>
                    <td>{$row['jam']}</td>
                    <td>{$row['ruangan']}</td>
                    <td><a href='?hapus={$row['id_jadwal']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a>
                    <a href='#' class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#editModal{$row['id_jadwal']}'>Edit</a></td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $data = $con->query("SELECT * FROM jadwal");
    while ($row = $data->fetch_assoc()) {
        $id = $row['id_jadwal'];
    ?>

        <div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $id ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel<?= $id ?>">Edit Jadwal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_jadwal" value="<?= $id ?>">
                            <div class="mb-3">
                                <label>Kode Matkul</label>
                                <select name="kode_matkul" class="form-select" required>
                                    <?php
                                    $matkul = $con->query("SELECT kode_matkul, nama_matkul FROM matkul");
                                    while ($m = $matkul->fetch_assoc()) {
                                        $selected = $m['kode_matkul'] == $row['kode_matkul'] ? 'selected' : '';
                                        echo "<option value='{$m['kode_matkul']}' $selected>{$m['kode_matkul']} - {$m['nama_matkul']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Hari</label>
                                <select name="hari" class="form-select" required>
                                    <?php
                                    $hariOptions = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                    foreach ($hariOptions as $hari) {
                                        $selected = $hari == $row['hari'] ? 'selected' : '';
                                        echo "<option $selected>$hari</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Jam</label>
                                <input type="time" name="jam" class="form-control" value="<?= $row['jam'] ?>" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="edit_jadwal" class="btn btn-primary">Simpan Perubahan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <script src="../../js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>