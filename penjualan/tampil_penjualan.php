<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Penjualan</title>
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
    <h3>Daftar User</h3>
    <a href="tambah_penjualan.php">+ Tambah Penjualan</a>
    <br>
    <table border = "1">
        <tr>
            <th>Id</th>
            <th>Tanggal Penjualan</th>
            <th>Nama Member</th>
            <th>Total Bayar</th>
        </tr>
        <?php
        include("../koneksi.php");
        $no = 1;
        $data = mysqli_query($koneksi, "select * from penjualan");
        while ($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['tanggal_penjualan'];?></td>
                <td><?php echo $d['nama_member'];?></td>
                <td><?php echo $d['total_bayar'];?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $d['id_penjualan']; ?>">EDIT</a>
                    <a href="hapus_user.php?id=<?php echo $d['id_penjualan']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>