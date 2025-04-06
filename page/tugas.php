<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Tugas</title>
    <link rel="stylesheet" href="../css/style_nav.css">
    <link rel="stylesheet" href="../css/style_footer1.css">
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <?php
    include "../component/nav.php";
    ?>
    <div class="container py-5">
        <h2 class="text-center mb-4 fw-bold">📝 Daftar Tugas Perkuliahan</h2>

        <!-- Tabel Tugas -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Tugas Mahasiswa</div>
            <div class="card-body p-0">
                <table class="table table-bordered text-center align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Deskripsi</th>
                            <th>Deadline</th>
                        </tr>
                    </thead>
                    <tbody id="tugasBody">
                        <tr>
                            <td>Struktur Data</td>
                            <td>Membuat linked list dengan operasi insert dan delete</td>
                            <td>10 Juni 2025</td>
                        </tr>
                        <tr>
                            <td>Basis Data</td>
                            <td>Desain ERD untuk sistem perpustakaan</td>
                            <td>12 Juni 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include "../component/footer.php";
    ?>
    <script src="../js/nav.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>