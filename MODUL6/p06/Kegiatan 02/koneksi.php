<?php
$host ="localhost";
$username = "root";
$password = "";
$database = "ptikuns";
// $koneksi = mysqli_connect($host, $username, $password, $database);
// if (mysqli_connect_errno()){
// 	echo "koneksi database gagal :" . mysqli_connect_error();
// }

try {
	
	$conn = new PDO("mysql:host=$host; dbname=$database", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
	echo "koneksi gagal: " . $e->getMessage();
}

?>