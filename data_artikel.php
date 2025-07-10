<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(https://i.pinimg.com/736x/a1/8e/2a/a18e2a23f41f8ea4e1d14438485e0974.jpg); 
            background-size: cover;
            background-repeat: no-repeat; 
        }
       
        .navbar {
            background-color: #333;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: flex; 
            align-items: center; 
            padding: 10px; 
        }
        .navbar a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #575757;
        }
       
        .title {
            color: white;
            font-size: 24px; 
            margin-right: auto; 
            padding: 10px 20px;
        }
       
        table {
            width: 95%;
            margin: 20px auto;
            color: #333;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        h4 {
            text-align: left;
        }
        .add-link {
            text-align: center;
            margin: 20px;
            margin-left: 120px;
        }
        .add-link a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-link a:hover {
            background-color: #45a049;
        }
       
        .edit-button {
            color: #ffcc00;
            padding: 5px 10px;
            text-decoration: none;
            font-weight: bold;
        }
        .edit-button:hover {
            color:rgb(226, 226, 5); 
        }
        .delete-button {
            color:rgb(255, 0, 0);
            padding: 5px 10px;
            text-decoration: none;
            font-weight: bold;
        }
        .delete-button:hover {
            color:rgb(252, 51, 51); 
        }
        .container {
            max-width:95%;
            margin: auto;
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="title">Data Perpustakaan</div>
        <a href="data_artikel.php">Artikel</a>
        <a href="data_pengunjung.php">Pengunjung</a>
        <a href="data_buku.php">Buku</a>
    </div>
<div class="container">
    <h2>Data Artikel</h2>
        <div class="add-link">
            <h4><a href="input_artikel.php">+ Tambah</a></h4>
        </div>

    <table>
        <tr>
            <th>No</th>
            <th>ID Artikel</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Penulis</th>
            <th>Tanggal Publish</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "Koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM tblartikel");
        $no = 1;
        while ($dataArtikel = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $dataArtikel['id_artikel'] ?></td>
                <td><?php echo $dataArtikel['judul'] ?></td>
                <td><?php echo $dataArtikel['isi'] ?></td>
                <td><?php echo $dataArtikel['penulis'] ?></td>
                <td><?php echo $dataArtikel['tanggal_publish'] ?></td>
                <td>
                    <a class="edit-button" href="edit_artikel.php?id_artikel=<?php echo $dataArtikel['id_artikel']; ?>">Edit</a> |
                    <a class="delete-button" href="hapus_artikel.php?id_artikel=<?php echo $dataArtikel['id_artikel']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
</body>
</html>