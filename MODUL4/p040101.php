<?php
	function buatBintang($n){
    	for ( $i = $n; $i > 0; $i--) {
        	for ($j = $n; $j >= $i; $j--) {
            	echo("*");
        	}
       	echo("<br>");
    	}
	}
	echo (buatBintang(4));
	echo (buatBintang(5));
?>