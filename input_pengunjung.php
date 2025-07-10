<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengunjung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(https://storyblok-cdn.ef.com/f/60990/1200x666/34093b645f/perpustakaan.jpg); 
            background-size: cover;
            background-repeat: no-repeat; 
        }
        h3 {
            text-align: center;
            color: #333;
        }
        form {
            width: 50%;
            margin: 110px auto;
            background-color: white;
            padding: 50px;
            border-radius: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 50%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: 3px solid #fff;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }
        input[type="submit"]:hover {
            color: black;
            background-color: #45a049;
            border: 3px solid #000;
        }
    </style>
</head>
<body>

    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
        <h3>Tambah Data Pengunjung</h3>
            <tr>
                <td>ID Pengunjung</td>
                <td>:</td>
                <td><input type="text" name="id_pengunjung" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>                 
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td><input type="text" name="no_hp" required></td>
            </tr>
            <tr>
                <td>Tanggal Kunjungan</td>
                <td>:</td>
                <td><input type="date" name="tanggal_kunjungan" required></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <input type="submit" name="tambah" value="Tambah">
                </td>
            </tr>
        </table>
    </form>

    <?php
    include "Koneksi.php";
    if (isset($_POST['tambah'])) {
        $id_pengunjung = $_POST['id_pengunjung'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $tanggal_kunjungan = $_POST['tanggal_kunjungan'];

        $query = mysqli_query($koneksi, "INSERT INTO tblpengunjung (id_pengunjung, nama, alamat, no_hp, tanggal_kunjungan) 
        VALUES ('$id_pengunjung', '$nama', '$alamat', '$no_hp', '$tanggal_kunjungan')");

        if ($query) {
            echo "<p style='text-align: center; color: green;'>Data berhasil disimpan</p>
            <meta http-equiv='refresh' content='1; url=data_pengunjung.php'>";
        } else {
            echo "<p style='text-align: center; color: red;'>Data gagal disimpan: " . mysqli_error($koneksi) . "</p>";
        }
    }
    ?>

</body>
</html>