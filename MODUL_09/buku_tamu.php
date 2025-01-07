<?php
include 'latihan_09_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    $tanggal = date('Y-m-d H:i:s');

    $sql = "INSERT INTO buku_tamu (nama, email, pesan, tanggal) VALUES ('$nama', '$email', '$pesan', '$tanggal')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='container mt-5'><div class='alert alert-success'>Pesan berhasil dikirim.</div></div>";
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div></div>";
    }

    $conn->close();
}
?>