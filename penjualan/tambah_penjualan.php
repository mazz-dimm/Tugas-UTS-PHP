<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan</title>
</head>
<?php
    // Koneksi Database
    include'../koneksi.php';
    // menangkap data yang dikirim dari form
    if (!empty($_POST['save'])){
        
        $tanggal_penjualan = $_POST ['tanggal_penjualan'];
        $nama_member = $_POST['nama_member'];
        $level = $_POST  ['total_bayar'];
        // Menginput data ke database
        $a = mysqli_query($koneksi,"insert into penjualan values('','$tanggal_daftar' ,'$nama_member', '$total_bayar' )");
        if ($a){
        // mengalihkan halaman kembali
        header("location:tambah_penjualan.php");
        }else{
        echo mysqli_error();
}
}
    ?>

    <body>
        <h2>List Penjualan</h2>
        <br>
        <a href="tampil_penjualan.php">Kembali</a>
        <br><br>
        <h3>Tambah Data Penjualan</h3>
        <form method="POST">
            <table>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td><input type="date" name="tanggal_penjualan"></td>
                </tr>
                <tr>
                    <td>Nama Member</td>
                    <td><input type="text" name="nama_member"></td>
                </tr>
                <tr>
                    <td>Total Bayar</td>   
                    <td><input type="number" name="total_bayar"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="save"></td>
                </tr>
            </table>
        </form>
    </body>
</html>