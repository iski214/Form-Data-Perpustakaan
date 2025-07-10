<?php
include "Koneksi.php";
$id_pengunjung = $_GET['id_pengunjung'];
$sql = mysqli_query ($koneksi, "DELETE FROM tblpengunjung WHERE id_pengunjung = $id_pengunjung");
if($sql){
    echo "Data berhasil dihapus
    <meta http-equiv='refresh' content = '1; url = data_pengunjung.php'>";
}
else{
    echo "Data gagal dihapus";
}
?>