<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member</title>
</head>
<?php
    // Koneksi Database
    include'../koneksi.php';
    // menangkap data yang dikirim dari form
    if (!empty($_POST['save'])){

        $nama_member = $_POST['nama_member'];
        $level = $_POST  ['level'];
        $tanggal_daftar = $_POST ['tanggal_daftar'];
        // Menginput data ke database
        $a = mysqli_query($koneksi,"insert into member values('', '$nama_member','$level', '$tanggal_daftar')");
        if ($a){
        // mengalihkan halaman kembali
        header("location:tambah_member.php");
        }else{
        echo mysqli_error();
}
}
    ?>

    <body>
        <h2>List User</h2>
        <br>
        <a href="tampil_member.php">Kembali</a>
        <br><br>
        <h3>Tambah Data Member</h3>
        <form method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama_member"></td>
                </tr>
                <tr>
                    <td>Level</td>   
                    <td><select name="level">
                        <option value="">----Pilih</option>
                        <option value="1">Silver</option>
                        <option value="2">Gold</option>
                        <option value="3">Platinum</option>
                    </select>
                </td>   
                </tr>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td><input type="date" name="tanggal_daftar"></td>
                </tr>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="save"></td>
                </tr>
            </table>
        </form>
    </body>
</html>