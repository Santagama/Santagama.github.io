<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Cek Stunting</title>
    <link rel="stylesheet" href="css/style.css">
</head>

    <header>
        <h1>Hasil Cek Stunting Anak Anda</h1>
    </header>

    <section>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = htmlspecialchars($_POST['nama']);
            $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
            $berat_badan = floatval($_POST['berat_badan']);
            $tinggi_badan = floatval($_POST['tinggi_badan']);

            // Menghitung usia anak dalam bulan
            $tanggal_lahir = new DateTime($tanggal_lahir);
            $sekarang = new DateTime();
            $usia_bulan = $sekarang->diff($tanggal_lahir)->y * 12 + $sekarang->diff($tanggal_lahir)->m;

            // Standar tinggi badan minimal dan maksimal berdasarkan usia (contoh)
            $tinggi_badan_min = 0;
            $tinggi_badan_max = 0;

            // Menentukan standar tinggi badan (contoh sederhana)
            if ($usia_bulan <= 24) {
                $tinggi_badan_min = 65;
                $tinggi_badan_max = 88;
            } elseif ($usia_bulan <= 36) {
                $tinggi_badan_min = 80;
                $tinggi_badan_max = 95;
            } elseif ($usia_bulan <= 48) {
                $tinggi_badan_min = 85;
                $tinggi_badan_max = 100;
            } elseif ($usia_bulan <= 60) {
                $tinggi_badan_min = 90;
                $tinggi_badan_max = 110;
            }

            // Cek apakah anak mengalami stunting
            if ($tinggi_badan < $tinggi_badan_min) {
                $hasil = "$nama <strong>Kemungkinan mengalami stunting</strong>. Tinggi badannya lebih rendah dari standar untuk usianya.";
            } elseif ($tinggi_badan > $tinggi_badan_max) {
                $hasil = "$nama <strong>Tidak mengalami stunting</strong>. Tinggi badannya lebih tinggi dari standar.";
            } else {
                $hasil = "$nama Memiliki tinggi badan yang sesuai dengan usianya.";
            }

            // Tampilkan hasil
            echo "<div style='background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; margin: 20px;'>";
            echo "<h3>Hasil Cek Stunting</h3>";
            echo "<p>$hasil</p>";
            echo "</div>";
        }
        ?>
    </section>

    <footer>
        <p>Dibuat oleh: Kelompok 1</p>
        <p>&copy; 2024 Pencegahan Stunting</p>
    </footer>

</body>
</html>