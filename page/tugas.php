<?php
include "../config/db.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Tugas</title>
    <link rel="stylesheet" href="../css/style_nav1.css">
    <link rel="stylesheet" href="../css/style_footer1.css">
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <?php include "../component/nav.php"; ?>

    <div class="container py-5">
        <h2 class="text-center mb-4 fw-bold">📝 Daftar Tugas Perkuliahan</h2>

        <!-- Tabel Tugas -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Tugas Mahasiswa</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th style="width: 20%;">Mata Kuliah</th>
                                <th style="width: 40%;">Deskripsi</th>
                                <th style="width: 20%;">Tanggal Mulai</th>
                                <th style="width: 20%;">Tanggal Tenggat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT t.deskripsi, t.tanggal_mulai, t.tanggal_tenggat, m.nama_matkul 
                                      FROM tugas t 
                                      JOIN matkul m ON t.kode_matkul = m.kode_matkul 
                                      ORDER BY t.tanggal_tenggat ASC";
                            $result = $con->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td class='text-center' style='word-wrap: break-word; word-break: break-word;'>{$row['nama_matkul']}</td>
                                            <td class='text-center' style='word-wrap: break-word; word-break: break-word;'>{$row['deskripsi']}</td>
                                            <td class='text-center'>" . date('d M Y', strtotime($row['tanggal_mulai'])) . "</td>
                                            <td class='text-center'>" . date('d M Y', strtotime($row['tanggal_tenggat'])) . "</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>Tidak ada data tugas ditemukan.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include "../component/footer.php"; ?>

    <script src="../js/nav.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>