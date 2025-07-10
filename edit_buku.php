<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
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
    if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $query = mysqli_query($koneksi, "SELECT * FROM tblbuku WHERE id_buku='$id_buku'");
    $dataBuku = mysqli_fetch_array($query);
    }
    ?>

    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
        <h3>Edit Data Buku</h3>
            <tr>
                <td>ID Buku</td>
                <td>:</td>
                <td><input type="text" name="id_buku" value="<?php echo $dataBuku['id_buku']?>" readonly></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul" value="<?php echo $dataBuku['judul']?>" required></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input type="text" name="pengarang" value="<?php echo $dataBuku['pengarang']?>" required></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td>:</td>
                <td><input type="text" name="tahun_terbit" value="<?php echo $dataBuku['tahun_terbit']?>" required></td>
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
        $id_buku = $_POST['id_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $tahun_terbit = $_POST['tahun_terbit'];

        $query = mysqli_query($koneksi, "UPDATE tblbuku SET
        judul='$judul', pengarang='$pengarang', tahun_terbit='$tahun_terbit' WHERE id_buku='$id_buku'");

        if ($query) {
            echo "<p style='text-align: center; color: green;'>Data berhasil diedit</p>
            <meta http-equiv='refresh' content='1; url=data_buku.php'>";
        } else {
            echo "<p style='text-align: center; color: red;'>Data gagal diedit: " . mysqli_error($koneksi) . "</p>";
        }
    }
    ?>

</body>
</html>