<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<?php
    // Koneksi Database
    include'../koneksi.php';
    // menangkap data yang dikirim dari form
    if (!empty($_POST['save'])){
        $tanggal_transaksi = $_POST['tanggal_transaksi'];
        $kode_barang = $_POST['kode_barang'];
        $id_penjualan = $_POST  ['id_penjualan'];
        $qty = $_POST ['qty'];
        $id_member = $_POST ['id_member'];
        $total_transaksi = $_POST ['total_transaksi'];
        // Menginput data ke database
        $a = mysqli_query($koneksi,"insert into transaksi values('','$tanggal_transaksi','$kode_barang','$id_penjualan','$qty','$id_member','$total_transaksi')");
        if ($a){
        // mengalihkan halaman kembali
        header("location:tambah_transaksi.php");
        }else{
        echo mysqli_error();
        }
    }
?>
<body>
    <h2>List Transaksi</h2><br>
    <a href="tampil_transaksi.php">Kembali</a><br><br>
    <h3>Tambah Data Transaksi</h3>
        <form method="POST">
            <table>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td><input type="date" name="tanggal_transaksi"></td>
                </tr>
                <tr>
                    <td>Kode Barang</td>
                    <td><input type="text" name="kode_barang"></td>
                </tr>
                <tr>
                    <td>Id Penjualan</td>
                    <td><input type="number" name="id_penjualan"></td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td><input type="number" name="qty"></td>
                </tr>
                <tr>
                    <td>Id Member</td>
                    <td><input type="number" name="id_member"></td>
                </tr>
                <tr>
                    <td>Total Transaksi</td>
                    <td><input type="number" name="total_transaksi"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="save"></td>
                </tr>
            </table>
    </form>
</body>
</html>