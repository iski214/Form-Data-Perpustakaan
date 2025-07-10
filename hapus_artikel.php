<?php
include "Koneksi.php";
$id_artikel = $_GET['id_artikel'];
$sql = mysqli_query ($koneksi, "DELETE FROM tblartikel WHERE id_artikel = $id_artikel");
if($sql){
    echo "Data berhasil dihapus
    <meta http-equiv='refresh' content = '1; url = data_artikel.php'>";
}
else{
    echo "Data gagal dihapus";
}
?>