<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = "SELECT * FROM produk WHERE ID_Produk = ?";
$params = [$id];
$stmt = sqlsrv_query($conn, $query, $params);
$data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = $_POST["nama"];
    $stok  = $_POST["stok"];
    $harga = $_POST["harga"];

    $query = "UPDATE produk SET Nama_Produk = ?, Stok = ?, Harga = ? WHERE ID_Produk = ?";
    $params = [$nama, $stok, $harga, $id];
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt) {
        echo "<script>alert('Data berhasil diupdate');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Update gagal');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Produk</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data['Nama_Produk'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $data['Stok'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $data['Harga'] ?>" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
