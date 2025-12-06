<?php

    include("koneksi.php");

    $id_tma = $_GET['id_tma'];
    echo $id_tma;
    if(isset($_GET['id_tma'])) {
        $query = "DELETE FROM tma WHERE id_tma = '$id_tma'";
        $exec = mysqli_query($koneksi, $query);

        if($exec) {
            header("Location: serverside.php");
        } else {
            echo "Gagal";
        }
    }

?>