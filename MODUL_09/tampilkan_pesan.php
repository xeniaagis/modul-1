<?php
include 'latihan_09_config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Daftar Pesan Buku Tamu</h2>
        <?php
        $sql = "SELECT * FROM buku_tamu ORDER BY tanggal DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['nama'] . "</h5>";
                echo "<h6 class='card-subtitle mb-2 text-muted'>" . $row['email'] . "</h6>";
                echo "<p class='card-text'>" . $row['pesan'] . "</p>";
                echo "<p class='card-text'><small class='text-muted'>" . $row['tanggal'] . "</small></p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada pesan di buku tamu.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>