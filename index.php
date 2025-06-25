<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f2f5;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .btn-tambah {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            margin-bottom: 20px;
            transition: background 0.3s;
        }

        .btn-tambah:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .aksi a {
            text-decoration: none;
            padding: 6px 12px;
            margin-right: 5px;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.2s;
        }

        .aksi a.edit {
            background-color: #ffc107;
            color: #212529;
        }

        .aksi a.edit:hover {
            background-color: #e0a800;
        }

        .aksi a.hapus {
            background-color: #dc3545;
            color: white;
        }

        .aksi a.hapus:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                background: #fff;
                box-shadow: 0 2px 5px rgba(0,0,0,0.05);
                border-radius: 5px;
                padding: 10px;
            }

            td {
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td::before {
                position: absolute;
                left: 10px;
                top: 10px;
                white-space: nowrap;
                font-weight: bold;
            }

            td:nth-of-type(1)::before { content: "ID"; }
            td:nth-of-type(2)::before { content: "Nama Supplier"; }
            td:nth-of-type(3)::before { content: "Alamat"; }
            td:nth-of-type(4)::before { content: "No. Telepon"; }
            td:nth-of-type(5)::before { content: "Email"; }
            td:nth-of-type(6)::before { content: "Aksi"; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Supplier</h2>
        <a href="tambah.php" class="btn-tambah">+ Tambah Supplier</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM data_supplier");
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<tr>
                            <td>{$data['id_supplier']}</td>
                            <td>{$data['nama_supplier']}</td>
                            <td>{$data['alamat']}</td>
                            <td>{$data['no_telepon']}</td>
                            <td>{$data['email']}</td>
                            <td class='aksi'>
                                <a href='edit.php?id={$data['id_supplier']}' class='edit'>Edit</a>
                                <a href='hapus.php?id={$data['id_supplier']}' class='hapus' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
