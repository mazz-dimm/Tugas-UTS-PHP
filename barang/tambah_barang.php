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

        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST  ['nama_barang'];
        $harga = $_POST ['harga'];
        $qty = $_POST ['qty'];
        $id_kategori = $_POST ['id_kategori'];
        // Menginput data ke database
        $a = mysqli_query($koneksi,"insert into barang values('', '$kode_barang','$nama_barang','$harga','$qty','$id_kategori')");
        if ($a){
        // mengalihkan halaman kembali
        header("location:tambah_barang.php");
        }else{
        echo mysqli_error();
}
}
    ?>

    <body>
        <h2>List Barang</h2>
        <br>
        <a href="tampil_barang.php">Kembali</a>
        <br><br>
        <h3>Tambah Data Barang</h3>
        <form method="POST">
            <table>
                <tr>
                    <td>Kode Barang</td>
                    <td><input type="text" name="kode_barang"></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_barang"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" name="harga"></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td><input type="number" name="qty"></td>
                </tr>
                <tr>
                    <td>Id Kategori</td>
                    <td><input type="number" name="id_kategori"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="save"></td>
                </tr>
            </table>
        </form>
    </body>
</html>