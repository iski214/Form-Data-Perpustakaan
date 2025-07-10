<?php
include "Koneksi.php";
$id_buku = $_GET['id_buku'];
$sql = mysqli_query ($koneksi, "DELETE FROM tblbuku WHERE id_buku = $id_buku");
if($sql){
    echo "Data berhasil dihapus
    <meta http-equiv='refresh' content = '1; url = data_buku.php'>";
}
else{
    echo "Data gagal dihapus";
}
?>