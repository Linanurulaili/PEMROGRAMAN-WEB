<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "utspemweb";
    $con = mysqli_connect($host, $username, $password, $database);

try {
    
    $con = new PDO('mysql:host=localhost;dbname=utspemweb', "root", "");
    $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} 
catch (PDOException $e) {
    echo "Koneksi Error : " . $e->getMessage() . "<br/>";
    die();
}

?>