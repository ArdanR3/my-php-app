/// jakii
<?php
include 'koneksi.php';
$showModal = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $stok  = $_POST['stok'];
    $harga = $_POST['harga'];
    $query = "INSERT INTO produk (Nama_Produk, Harga, Stok) VALUES (?, ?, ?)";
    $params = [$nama, $harga, $stok];
    $stmt = sqlsrv_query($conn, $query, $params);
    if ($stmt
        $showModal = true;
    } else {
        $error = "Gagal menambahkan produk.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <?php if (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Tambah Produk Baru</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama produk" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Masukkan harga produk" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel">Berhasil!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Produk berhasil ditambahkan. Apa yang ingin Anda lakukan selanjutnya?
      </div>
      <div class="modal-footer">
        <a href="tambah.php" class="btn btn-outline-success">Tambah Lagi</a>
        <a href="index.php" class="btn btn-success">OK</a>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php if ($showModal): ?>
<script>
    var modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
</script>
<?php endif; ?>
</body>
</html>
