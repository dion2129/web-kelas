<?php
include "../../config/db.php";

if (isset($_POST['tambah_tugas'])) {
    $kode = $_POST['kode_matkul'];
    $mulai = $_POST['tanggal_mulai'];
    $tenggat = $_POST['tanggal_tenggat'];
    $deskripsi = $_POST['deskripsi'];
    $con->query("INSERT INTO tugas (kode_matkul, deskripsi, tanggal_mulai, tanggal_tenggat) VALUES ('$kode', '$deskripsi', '$mulai', '$tenggat')");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $con->query("DELETE FROM tugas WHERE id_tugas = $id");
}
if (isset($_POST['edit_tugas'])) {
    $id = $_POST['id_tugas'];
    $deskripsi = $_POST['deskripsi_edit'];
    $mulai = $_POST['tanggal_mulai_edit'];
    $tenggat = $_POST['tanggal_tenggat_edit'];

    $con->query("UPDATE tugas SET deskripsi = '$deskripsi', tanggal_mulai = '$mulai', tanggal_tenggat = '$tenggat' WHERE id_tugas = $id");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin - Tugas</title>
    <link rel="stylesheet" href="../../css/style_nav_admin1.css">
    <link rel="stylesheet" href="../../css/style_footer1.css">
    <link rel="stylesheet" href="../../css/style_index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php
    include "../../component/nav_admin.php";
    ?>

    <div class="container py-4">
        <h2 class="mb-4">Halaman Admin - Tugas</h2>


        <!-- Form Tambah Tugas -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Tambah Tugas</div>
            <div class="card-body">
                <form method="post">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Kode Matkul</label>
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
                            <label class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tanggal Tenggat</label>
                            <input type="date" name="tanggal_tenggat" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="tambah_tugas" class="btn btn-success w-100 mt-3">+ Tambah Tugas</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Data Tugas -->
        <div class="card">
            <div class="card-header bg-primary text-white">Daftar Tugas</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 15%;">Kode Matkul</th>
                                <th style="width: 35%;">Deskripsi</th>
                                <th style="width: 20%;">Tanggal Mulai</th>
                                <th style="width: 20%;">Tanggal Tenggat</th>
                                <th style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $con->query("SELECT * FROM tugas");
                            while ($row = $data->fetch_assoc()) {
                                echo "<tr>
                            <td class='text-nowrap text-truncate'>{$row['kode_matkul']}</td>
                            <td class='text-truncate' style='max-width: 300px;'>{$row['deskripsi']}</td>
                            <td class='text-nowrap'>{$row['tanggal_mulai']}</td>
                            <td class='text-nowrap'>{$row['tanggal_tenggat']}</td>
                            <td class='text-nowrap'>
                                <a href='?hapus={$row['id_tugas']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus tugas ini?')\">Hapus</a>
                                <a href='#' class='btn btn-sm btn-success' data-bs-toggle='modal' data-bs-target='#editModal{$row['id_tugas']}'>Edit</a>
                            </td>
                        </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    $data = $con->query("SELECT * FROM tugas");
                    while ($row = $data->fetch_assoc()) {
                        $id = $row['id_tugas'];
                    ?>
                        <div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $id ?>" aria-hidden="true">
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <form method='post'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id="editModalLabel<?= $id ?>">Edit Tugas</h5>
                                            <button type=' button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <input type='hidden' name='id_tugas' value="<?= $id ?>">
                                            <div class='mb-3'>
                                                <label class='form-label'>Deskripsi</label>
                                                <input type='text' name='deskripsi_edit' class='form-control' value="<?= $row['deskripsi'] ?>" required>
                                            </div>
                                            <div class='mb-3'>
                                                <label class='form-label'>Tanggal Mulai</label>
                                                <input type='date' name='tanggal_mulai_edit' class='form-control' value="<?= $row['tanggal_mulai'] ?>" required>
                                            </div>
                                            <div class='mb-3'>
                                                <label class='form-label'>Tanggal Tenggat</label>
                                                <input type='date' name='tanggal_tenggat_edit' class='form-control' value="<?= $row['tanggal_tenggat'] ?>" required>
                                            </div>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='submit' name='edit_tugas' class='btn btn-primary'>Simpan Perubahan</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <script src="../../js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>