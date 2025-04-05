<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Perkuliahan</title>
    <link rel="stylesheet" href="../css/style_nav.css">
    <link rel="stylesheet" href="../css/style_footer1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php
    include "../component/nav.php";
    ?>

    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">📅 Jadwal Perkuliahan</h2>
        </div>

        <!-- Jadwal Table -->
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle" id="jadwalTable">
                <thead class="table-primary">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Nama Dosen</th>
                        <th>Waktu</th>
                        <th>Ruangan</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <td>Pemrograman Java</td>
                        <td>Dr. Andi Wijaya</td>
                        <td>Senin, 08.00 - 10.00</td>
                        <td>Ruang A1</td>
                    </tr>
                    <tr>
                        <td>Basis Data</td>
                        <td>Ibu Rina Sari</td>
                        <td>Selasa, 10.00 - 12.00</td>
                        <td>Ruang B2</td>
                    </tr>
                    <tr>
                        <td>Basis Data</td>
                        <td>Ibu Rina Sari</td>
                        <td>Selasa, 10.00 - 12.00</td>
                        <td>Ruang B2</td>
                    </tr>
                    <tr>
                        <td>Basis Data</td>
                        <td>Ibu Rina Sari</td>
                        <td>Selasa, 10.00 - 12.00</td>
                        <td>Ruang B2</td>
                    </tr>
                    <tr>
                        <td>Basis Data</td>
                        <td>Ibu Rina Sari</td>
                        <td>Selasa, 10.00 - 12.00</td>
                        <td>Ruang B2</td>
                    </tr>
                    <tr>
                        <td>Basis Data</td>
                        <td>Ibu Rina Sari</td>
                        <td>Selasa, 10.00 - 12.00</td>
                        <td>Ruang B2</td>
                    </tr>
                </tbody>
            </table>
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