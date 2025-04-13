<?php
include "../../config/db.php";


if (isset($_POST['tambah_matkul'])) {
    $kode = $_POST['kode_matkul'];
    $nama = $_POST['nama_matkul'];
    $penanggung = $con->real_escape_string($_POST['dosen_penanggung_jawab']);
    $pendamping1 = $con->real_escape_string($_POST['dosen_pendamping1']);
    $pendamping2 = $con->real_escape_string($_POST['dosen_pendamping2']);

    $con->query("INSERT INTO matkul (kode_matkul, nama_matkul, dosen_penanggung_jawab, dosen_pendamping1, dosen_pendamping2)
                    VALUES ('$kode', '$nama', '$penanggung', '$pendamping1', '$pendamping2')");
}

if (isset($_GET['hapus'])) {
    $kode = $_GET['hapus'];
    $con->query("DELETE FROM matkul WHERE kode_matkul = '$kode'");
}
if (isset($_POST['edit_matkul'])) {
    $kode = $_POST['kode_matkul'];
    $nama = $_POST['nama_matkul'];
    $penanggung = $_POST['dosen_penanggung_jawab'];
    $pendamping1 = $_POST['dosen_pendamping1'];
    $pendamping2 = $_POST['dosen_pendamping2'];

    $con->query("UPDATE matkul SET 
                        nama_matkul = '$nama', 
                        dosen_penanggung_jawab = '$penanggung', 
                        dosen_pendamping1 = '$pendamping1',
                        dosen_pendamping2 = '$pendamping2'
                    WHERE kode_matkul = '$kode'");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Mata Kuliah</title>
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
    <h2 class="mb-4">Halaman Admin - Mata Kuliah</h2>

    <form method="post" class="mb-4">
        <div class="row g-2">
            <div class="col-md-2">
                <input type="text" name="kode_matkul" class="form-control" placeholder="Kode Matkul" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="nama_matkul" class="form-control" placeholder="Nama Matkul" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="dosen_penanggung_jawab" class="form-control" placeholder="Dosen Penanggung Jawab">
            </div>
            <div class="col-md-2">
                <input type="text" name="dosen_pendamping1" class="form-control" placeholder="Dosen Pendamping 1">
            </div>
            <div class="col-md-2">
                <input type="text" name="dosen_pendamping2" class="form-control" placeholder="Dosen Pendamping 2">
            </div>
            <div class="col-md-2">
                <button type="submit" name="tambah_matkul" class="btn btn-success">Tambah Mata Kuliah</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped text-center">
        <thead class="table-primary ">
            <tr>
                <th class="text-center">Kode Matkul</th>
                <th class="align-content-center">Nama Matkul</th>
                <th class="align-content-center">Dosen Penanggung Jawab</th>
                <th class="align-content-center">Dosen Pendamping 1</th>
                <th class="align-content-center">Dosen Pendamping 2</th>
                <th class="align-content-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = $con->query("SELECT * FROM matkul");

            while ($row = $data->fetch_assoc()) {

                $kode = $row['kode_matkul'];
                echo "<tr>
                        <td>{$row['kode_matkul']}</td>
                        <td>{$row['nama_matkul']}</td>
                        <td>{$row['dosen_penanggung_jawab']}</td>
                        <td>{$row['dosen_pendamping1']}</td>
                        <td>{$row['dosen_pendamping2']}</td>
                        <td>
                            <a href='?hapus={$row['kode_matkul']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a>
                            <a href='#' class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#editModal{$row['kode_matkul']}'>Edit</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $data = $con->query("SELECT * FROM matkul");
    while ($row = $data->fetch_assoc()) {
        $id = $row['kode_matkul'];
    ?>

        <div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $id ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel<?= $id ?>">Edit Mata Kuliah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="kode_lama" value="<?= $id ?>">
                            <div class="mb-3">
                                <label>Kode Matkul</label>
                                <input type="text" name="kode_matkul" class="form-control" value="<?= $row['kode_matkul'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>Nama Matkul</label>
                                <input type="text" name="nama_matkul" class="form-control" value="<?= $row['nama_matkul'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Dosen Penanggung Jawab</label>
                                <input type="text" name="dosen_penanggung_jawab" class="form-control" value="<?= $row['dosen_penanggung_jawab'] ?>">
                            </div>
                            <div class="mb-3">
                                <label>Dosen Pendamping 1</label>
                                <input type="text" name="dosen_pendamping1" class="form-control" value="<?= $row['dosen_pendamping1'] ?>">
                            </div>
                            <div class="mb-3">
                                <label>Dosen Pendamping 2</label>
                                <input type="text" name="dosen_pendamping2" class="form-control" value="<?= $row['dosen_pendamping2'] ?>">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="edit_matkul" class="btn btn-primary">Simpan Perubahan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php } ?>

    <script src="../../js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>