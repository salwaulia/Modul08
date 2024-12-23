<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'] ?? '';
        $tahun = $_POST['tahun'] ?? 0;
        $tahunSekarang = date("Y");
        $lamaKelulusan = $tahunSekarang - $tahun;

        $alumniData = isset($_POST['alumniData']) ? json_decode($_POST['alumniData'], true) : [];
        $alumniData[] = [
            'nama' => $nama,
            'tahun' => $tahun,
            'lamaKelulusan' => $lamaKelulusan
        ];

        $alumniDataJson = json_encode($alumniData);
    } else {
        $alumniDataJson = json_encode([]);
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Tracer Alumni</h1>
    <form method="POST">
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="tahun">Tahun Kelulusan:</label><br>
        <input type="number" id="tahun" name="tahun" required><br><br>

        <input type="hidden" name="alumniData" value='<?php echo $alumniDataJson; ?>'>

        <button type="submit">Tambah Alumni</button>
    </form>

    <h2>Daftar Alumni</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Tahun Kelulusan</th>
                <th>Lama Kelulusan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($alumniData)) {
                    foreach ($alumniData as $index => $alumni) {
                        echo "<tr>";
                        echo "<td>" . ($index + 1) . "</td>";
                        echo "<td>" . htmlspecialchars($alumni['nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumni['tahun']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumni['lamaKelulusan']) . " tahun</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>
