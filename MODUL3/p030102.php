<?php
	for ($i=1; $i<=6; $i++) {
		if($i%2==0){
			echo "<font color='#ff0000'><h$i>Mahasiswa $i</h$i></font>";
		}
		else {
			echo "<h$i>Mahasiswa $i</h$i>";
		}
	}
?>