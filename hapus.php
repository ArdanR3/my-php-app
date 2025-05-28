<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_produk'];
    $query = "DELETE FROM produk WHERE ID_Produk = ?";
    $params = [$id];
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt) {
        echo "<script>alert('Data berhasil dihapus');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}
?>
