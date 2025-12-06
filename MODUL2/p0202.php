<?php
	$nama = ["Sulis", "Rendi", "Jatmiko", "Feri"];
	$nim = ["K3510001", "K3510002", "K3510003", "K3520004"];
	$alamat = ["Solo", "Klaten", "Boyolali", "Wonogiri"];
	$peminatan = ["RPL", "TKJ", "Multimedia", "RPL"];

	for( $x = 0; $x <4; $x++){
		echo $nama[$x]. " | ";
		echo $nim[$x]. " | ";
		echo $alamat[$x]. " | ";
		echo $peminatan[$x];
		echo "<br>";
	}
?>