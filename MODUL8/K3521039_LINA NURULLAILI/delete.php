<?php
require_once("config.php");
$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mahasiswa=$id");
if($result){
    header("Location:index.php");
}
?>