<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
</head>
<?php
    // Koneksi Database
    include'../koneksi.php';
    // menangkap data yang dikirim dari form
    if (!empty($_POST['save'])){

        $nama = $_POST['nama'];
        $password = $_POST  ['password'];
        $level = $_POST ['level'];
        $status = $_POST ['status'];
        // Menginput data ke database
        $a = mysqli_query($koneksi,"insert into user values('', '$nama','$password', '$level', '$status')");
        if ($a){
        // mengalihkan halaman kembali
        header("location:tambah_user.php");
        }else{
        echo mysqli_error();
}
}
    ?>

    <body>
        <h2>List User</h2>
        <br>
        <a href="tampil_user.php">Kembali</a>
        <br><br>
        <h3>Tambah Data User</h3>
        <form method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="number" name="password"></td>
                </tr>
                <tr>
                    <td>Level</td>   
                    <td><select name="level">
                        <option value="">----Pilih</option>
                        <option value="1">Admin</option>
                        <option value="2">Staff</option>
                        <option value="3">SPV</option>
                        <option value="4">MGR</option>
                    </select>
                </td>   
                </tr>
                <tr>
                    <td>Status</td>
                    <td><select name="status">
                        <option value="">----Pilih</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="save"></td>
                </tr>
            </table>
        </form>
    </body>
</html>