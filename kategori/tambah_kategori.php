<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
</head>
<?php
    // Koneksi Database
    include'../koneksi.php';
    // menangkap data yang dikirim dari form
    if (!empty($_POST['save'])){

        $nama_kategori = $_POST ['nama_kategori'];
        $diskon = $_POST ['diskon'];
        // Menginput data ke database
        $a = mysqli_query($koneksi,"insert into kategori values('', '$nama_kategori','$diskon')");
        if ($a){
        // mengalihkan halaman kembali
        header("location:tambah_kategori.php");
        }else{
        echo mysqli_error();
        }
    }   
    ?>

    <body>
        <h2>List Kategori</h2>
        <br>
        <a href="tampil_kategori.php">Kembali</a>
        <br><br>
        <h3>Tambah Data Kategori</h3>
        <form method="POST">
            <table>
                <tr>
                    <td>Nama Kategori</td>
                    <td><input type="text" name="nama_kategori"></td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td><input type="number" name="diskon"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="save"></td>
                </tr>
            </table>
        </form>
    </body>
</html>