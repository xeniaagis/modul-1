
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $perusahaan = $_POST['perusahaan'];
    $posisi = $_POST['posisi'];
    $lokasi = $_POST['lokasi'];
    $gaji = $_POST['gaji'];
    $kontak = $_POST['kontak'];

    // Ambil data lama
    $data_bursa_kerja = include 'data_bursa_kerja.php';

    // Tambahkan data baru
    $data_bursa_kerja[] = [
        'perusahaan' => $perusahaan,
        'posisi' => $posisi,
        'lokasi' => $lokasi,
        'gaji' => $gaji,
        'kontak' => $kontak,
    ];

    // Tulis ulang data ke file
    file_put_contents('data_bursa_kerja.php', '<?php return ' . var_export($data_bursa_kerja, true) . ';');

    echo "<script>alert('Lowongan berhasil ditambahkan!'); window.location='Latihan_09_index.php?menu=bursakerja';</script>";
}
?>

<div class="container">
    <h2 class="mb-4">Tambah Lowongan Pekerjaan</h2>
    <form method="POST">
        <div class="form-group mb-3">
            <label for="perusahaan">Perusahaan:</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
        </div>
        <div class="form-group mb-3">
            <label for="posisi">Posisi:</label>
            <input type="text" class="form-control" id="posisi" name="posisi" required>
        </div>
        <div class="form-group mb-3">
            <label for="lokasi">Lokasi:</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <div class="form-group mb-3">
            <label for="gaji">Gaji:</label>
            <input type="text" class="form-control" id="gaji" name="gaji" required>
        </div>
        <div class="form-group mb-3">
            <label for="kontak">Kontak:</label>
            <input type="email" class="form-control" id="kontak" name="kontak" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
