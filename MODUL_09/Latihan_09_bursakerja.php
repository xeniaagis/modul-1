
<style>
.table-dark th {
    background-color: #343a40;
    color: white;
}
.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}
</style>

<?php
// Ambil data dari file
$data_bursa_kerja = include 'data_bursa_kerja.php';

// Filter pencarian
$search = isset($_GET['search']) ? strtolower($_GET['search']) : '';
$lokasi = isset($_GET['lokasi']) ? strtolower($_GET['lokasi']) : '';

// Filter data berdasarkan input pencarian
$filtered_data = array_filter($data_bursa_kerja, function ($job) use ($search, $lokasi) {
    return (empty($search) || strpos(strtolower($job['perusahaan']), $search) !== false || strpos(strtolower($job['posisi']), $search) !== false) &&
           (empty($lokasi) || strpos(strtolower($job['lokasi']), $lokasi) !== false);
});
?>

<div class="container">
    <h2 class="mb-4">Bursa Kerja</h2>

    <!-- Form Pencarian -->
    <form method="GET" class="row g-3 mb-4">
        <input type="hidden" name="menu" value="bursakerja">
        <div class="col-md-4">
            <input type="text" class="form-control" name="search" placeholder="Cari perusahaan atau posisi...">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="lokasi" placeholder="Lokasi">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </div>
    </form>

    <!-- Tabel Lowongan -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Perusahaan</th>
                <th>Posisi</th>
                <th>Lokasi</th>
                <th>Gaji</th>
                <th>Kontak</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($filtered_data) > 0): ?>
                <?php foreach ($filtered_data as $index => $job): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($job['perusahaan']); ?></td>
                        <td><?= htmlspecialchars($job['posisi']); ?></td>
                        <td><?= htmlspecialchars($job['lokasi']); ?></td>
                        <td><?= isset($job['gaji']) ? htmlspecialchars($job['gaji']) : 'N/A'; ?></td>
                        <td><a href="mailto:<?= htmlspecialchars($job['kontak']); ?>"><?= htmlspecialchars($job['kontak']); ?></a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada pekerjaan ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Tombol Tambah -->
    <a href="Latihan_09_tambah_bursa.php" class="btn btn-primary mt-3">Tambah Lowongan</a>
</div>