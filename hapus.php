<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM data_supplier WHERE id_supplier = $id");

if ($query) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data.";
}
?>
