<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Artikel</title>
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
            margin: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: 3px solid #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
            border: 3px solid #000;
            color: black;
        }
    </style>
</head>
<body>

    <?php
    include "Koneksi.php";
    if (isset($_GET['id_artikel'])) {
    $id_artikel = $_GET['id_artikel'];
    $query = mysqli_query($koneksi, "SELECT * FROM tblartikel WHERE id_artikel='$id_artikel'");
    $dataArtikel = mysqli_fetch_array($query);
    }
    ?>

    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
        <h3>Edit Data Artikel</h3>
            <tr>
                <td>ID Artikel</td>
                <td>:</td>
                <td><input type="text" name="id_artikel" value="<?php echo $dataArtikel['id_artikel']?>" readonly></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul" value="<?php echo $dataArtikel['judul']?>" required></td>
            </tr>
            <tr>
                <td>Isi</td>
                <td>:</td>
                <td><input type="text" name="isi" value="<?php echo $dataArtikel['isi']?>" required></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td>:</td>
                <td><input type="text" name="penulis" value="<?php echo $dataArtikel['penulis']?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Publish</td>
                <td>:</td>
                <td><input type="date" name="tanggal_publish" value="<?php echo $dataArtikel['tanggal_publish']?>" required></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <input type="submit" name="edit" value="Edit">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['edit'])) {
        $id_artikel = $_POST['id_artikel'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $penulis = $_POST['penulis'];
        $tanggal_publish = $_POST['tanggal_publish'];

        $query = mysqli_query($koneksi, "UPDATE tblartikel SET
        judul='$judul', isi='$isi', penulis='$penulis', tanggal_publish='$tanggal_publish' WHERE id_artikel='$id_artikel'");

        if ($query) {
            echo "<p style='text-align: center; color: green;'>Data berhasil diedit</p>
            <meta http-equiv='refresh' content='1; url=data_artikel.php'>";
        } else {
            echo "<p style='text-align: center; color: red;'>Data gagal diedit: " . mysqli_error($koneksi) . "</p>";
        }
    }
    ?>

</body>
</html>