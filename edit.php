<?php include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM data_supplier WHERE id_supplier = $id");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Supplier</title></head>
<body>
    <h2>Edit Data Supplier</h2>
    <form action="" method="post">
        <label>Nama Supplier:</label><br>
        <input type="text" name="nama_supplier" value="<?= $data['nama_supplier'] ?>" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea><br><br>

        <label>No. Telepon:</label><br>
        <input type="text" name="no_telepon" value="<?= $data['no_telepon'] ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $data['email'] ?>"><br><br>

        <input type="submit" name="update" value="Update">
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['no_telepon'];
        $email = $_POST['email'];

        $sql = "UPDATE supplier SET
                    nama_supplier = '$nama',
                    alamat = '$alamat',
                    no_telepon = '$telepon',
                    email = '$email'
                WHERE id_supplier = $id";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Data berhasil diupdate. <a href='index.php'>Kembali</a></p>";
        } else {
            echo "Gagal update data: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
