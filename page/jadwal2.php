<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Perkuliahan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #007bff;
            color: white;
        }

        th,
        td {
            text-align: center;
            padding: 12px;
            border: 1px solid #ccc;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
      <?php 
            include "../component/nav.php" ;
            ?>
    <div class="container">
        <h2>Jadwal Perkuliahan</h2>

        <input type="text" id="searchInput" placeholder="Cari mata kuliah...">

        <table>
            <thead>
                <tr>
                    <th>Mata Kuliah</th>
                    <th>Nama Dosen</th>
                    <th>Waktu</th>
                    <th>Ruangan</th>
                </tr>
            </thead>
            <tbody id="jadwalBody">
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
                    <td>Struktur Data</td>
                    <td>Bapak Agus Pratama</td>
                    <td>Rabu, 13.00 - 15.00</td>
                    <td>Ruang C3</td>
                </tr>
                <tr>
                    <td>Jaringan Komputer</td>
                    <td>Ibu Lestari</td>
                    <td>Kamis, 09.00 - 11.00</td>
                    <td>Ruang D4</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        const searchInput = document.getElementById("searchInput");
        const tableRows = document.querySelectorAll("#jadwalBody tr");

        searchInput.addEventListener("keyup", function() {
            const filter = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const mataKuliah = row.cells[0].textContent.toLowerCase();
                if (mataKuliah.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>