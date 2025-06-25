<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Supplier</title></head>
<body>
    <h2>Tambah Data Supplier</h2>
    <form action="" method="post">
        <label>Nama Supplier:</label><br>
        <input type="text" name="nama_supplier" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>No. Telepon:</label><br>
        <input type="text" name="no_telepon"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br><br>

        <input type="submit" name="simpan" value="Simpan">
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['no_telepon'];
        $email = $_POST['email'];

        $sql = "INSERT INTO data_supplier (nama_supplier, alamat, no_telepon, email)
                VALUES ('$nama', '$alamat', '$telepon', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Data berhasil disimpan. <a href='index.php'>Kembali</a></p>";
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
