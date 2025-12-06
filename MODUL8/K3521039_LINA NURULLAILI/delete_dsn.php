<?php
require_once("config.php");
$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM dosen WHERE id_dosen=$id");
if($result){
    header("Location:indexdsn.php");
}
?>