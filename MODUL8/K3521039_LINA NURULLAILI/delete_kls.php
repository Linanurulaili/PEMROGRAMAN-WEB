<?php
require_once("config.php");
$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas=$id");
if($result){
    header("Location:indexkls.php");
}
?>