<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h3>Daftar Barang</h3>
    <a href="tambah_barang.php">+ Tambah Barang</a>
    <br>
    <table border = "1">
        <tr>
            <th>Id</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Id Kategori</th>
        </tr>
        <?php
        include("../koneksi.php");
        $no = 1;
        $data = mysqli_query($koneksi, "select * from barang");
        while ($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['kode_barang'];?></td>
                <td><?php echo $d['nama_barang'];?></td>
                <td><?php echo $d['harga'];?></td>
                <td><?php echo $d['qty'];?></td>
                <td><?php echo $d['id_kategori'];?></td>
                <td>
                <a href="edit_user.php?id=<?php echo $d['id_barang']; ?>">EDIT</a>
                <a href="hapus_user.php?id=<?php echo $d['id_barang']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>