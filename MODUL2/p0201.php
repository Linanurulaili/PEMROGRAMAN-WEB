<!DOCTYPE html> 
<html>  
<head>Contoh</head>   
<body>   
	<h1>Latihan 1</h1>    
	<?php     
		echo "<p>Hello world</p>";    
	?>      
	<h1>Latihan 2</h1>    
	<?php             
		$a = '14';             
		$b = '11';             
		$c = $a + $b;     
		echo ("Hasil perhitungan adalah $c");    
	?>    
	<h1>Latihan 3</h1>    
	<?php             
		$z = [
			'nama' => 'agus',
			'nim' => 'k1424567',
			'alamat' => 'Solo',
			'bidang' => 'RPL',
		];     
		echo $z['nama'];    
	?>  
	<h1>Latihan 4</h1>
	<?php
		$objek = new stdClass();
		$objek -> name = "Steven William";
		$objek -> age = 30;
		$objek -> city = "Kartosuro";

		$myJSON = json_encode($objek);
		echo $myJSON. "<br>";
		echo $objek->name. ' is ' .$objek->age. ' years old';
	?>   
</body> 
</html>