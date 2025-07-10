<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(https://storyblok-cdn.ef.com/f/60990/1200x666/34093b645f/perpustakaan.jpg); 
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
            max-width: 95%;
            margin: 30px auto;
            background: white;
            padding: 5px;
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
    <h2>Data Buku</h2>
        <div class="add-link">
            <h4><a href="input_buku.php">+ Tambah</a></h4>
        </div>
    <table>
        <tr>
            <th>No</th>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "Koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM tblbuku");
        $no = 1;
        while ($dataBuku = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $dataBuku['id_buku'] ?></td>
                <td><?php echo $dataBuku['judul'] ?></td>
                <td><?php echo $dataBuku['pengarang'] ?></td>
                <td><?php echo $dataBuku['tahun_terbit'] ?></td>
                <td>
                    <a class="edit-button" href="edit_buku.php?id_buku=<?php echo $dataBuku['id_buku'] ?>">Edit</a> |
                    <a class="delete-button" href="hapus_buku.php?id_buku=<?php echo $dataBuku['id_buku'] ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>
</body>
</html>