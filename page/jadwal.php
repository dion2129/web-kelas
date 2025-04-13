<?php
include "../config/db.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Perkuliahan</title>
    <link rel="stylesheet" href="../css/style_nav1.css">
    <link rel="stylesheet" href="../css/style_footer1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <?php include "../component/nav.php"; ?>

    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Jadwal Perkuliahan</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Nama Dosen</th>
                        <th>Waktu</th>
                        <th>Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT j.kode_matkul, m.nama_matkul, m.dosen_penanggung_jawab, j.hari, j.jam, j.ruangan 
                              FROM jadwal j
                              JOIN matkul m ON j.kode_matkul = m.kode_matkul";
                    $result = $con->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['nama_matkul']}</td>
                                    <td>{$row['dosen_penanggung_jawab']}</td>
                                    <td>{$row['hari']}, {$row['jam']}</td>
                                    <td>FF{$row['ruangan']}</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data jadwal tersedia.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "../component/footer.php"; ?>

    <script src="../js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>