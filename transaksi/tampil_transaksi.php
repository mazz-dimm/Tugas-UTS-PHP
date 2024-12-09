<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Transaksi</title>
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
    <h3>Daftar Transaksi</h3>
    <a href="tambah_transaksi.php">+ Tambah Transaksi</a>
    <br>
    <table border = "1">
        <tr>
            <th>Id</th>
            <th>Tanggal Transaksi</th>
            <th>Kode Barang</th>
            <th>Id Penjualan</th>
            <th>Jumlah</th>
            <th>Id Member</th>
            <th>Total Transaksi</th>
        </tr>
        <?php
        include("../koneksi.php");
        $no = 1;
        $data = mysqli_query($koneksi, "select * from transaksi");
        while ($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['tanggal_transaksi'];?></td>
                <td><?php echo $d['kode_barang'];?></td>
                <td><?php echo $d['id_penjualan'];?></td>
                <td><?php echo $d['qty'];?></td>
                <td><?php echo $d['id_member'];?></td>
                <td><?php echo $d['total_transaksi'];?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $d['id_transaksi']; ?>">EDIT</a>
                    <a href="hapus_user.php?id=<?php echo $d['id_transaksi']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>