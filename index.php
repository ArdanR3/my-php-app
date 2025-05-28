<?php
include 'koneksi.php';
$query = "SELECT * FROM produk";
$result = sqlsrv_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Dengan PHP & SQL Server</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        h1 { color: #0d6efd; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center fw-bold mb-4">CRUD Dengan PHP & SQL Server</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Produk</h4>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Produk</a>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="laporan.php" class="btn btn-primary">Cetak laporan</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Stok Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) : ?>
                <tr>
                    <td><?= $row['ID_Produk'] ?></td>
                    <td><?= htmlspecialchars($row['Nama_Produk']) ?></td>
                    <td><?= $row['Stok'] ?></td>
                    <td><?= number_format($row['Harga'], 0, ',', '.') ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['ID_Produk'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['ID_Produk'] ?>">Hapus</button>
                        <div class="modal fade" id="deleteModal<?= $row['ID_Produk'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $row['ID_Produk'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="hapus.php" method="POST">
                                    <input type="hidden" name="id_produk" value="<?= $row['ID_Produk'] ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus produk "<strong><?= htmlspecialchars($row['Nama_Produk']) ?></strong>"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
